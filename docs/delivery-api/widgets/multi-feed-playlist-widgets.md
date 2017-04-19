# Multi-Feed Playlist Widgets

In this demo, we'll look at the various ways you can use feeds within and around the player. You can [see the finished demo in the Developer Showcase](#).

![Multi-Feed Playlist Widget](/images/multi-feed-playlist-widget.png)

## Project Goals
Our final result should be able to grab multiple feeds, use an HTML template to generate a view for each *feed*, and use the [JW Player Javascript library](https://developer.jwplayer.com/jw-player/docs/javascript-api-reference/) to set up a *player instance* with the first *playlist*. Then, when a user selects a *video link*, the *player instance* should load that video's *corresponding playlist* and switch to that video.

## Mapping Out the Routes
Your *feeds* are readily available via the [JW Platform Delivery API](https://developer.jwplayer.com/jw-platform/docs/delivery-api-reference/#!/playlists/get_v2_playlists_playlist_id). The full v2 Playlists route looks like this:

```
https://cdn.jwplayer.com/v2/playlists/<feedid>
```

!!!
The `v2/playlists/` and `v2/media/` routes both return feed objects (the `v2/media/` route returns a feed with one playlist item). This is to conform to the [Media RSS Specification](http://www.rssboard.org/media-rss). Alternate response types and options are available in the JW Platform Delivery API reference.
!!!

## Fetching All Feeds
We start off with a list of `feedid`s that we want to include on the page.

```javascript
var feeds = [
    "YjQP6aMS",
    "Q352cyuc",
    "oR7ahO0J"
];
```

We want to make sure all of the *feeds* are loaded and ready to use before going further. This step can be fleshed out to provide error handling for situations like invalid feed IDs or [authentication errors](https://developer.jwplayer.com/jw-platform/docs/developer-guide/delivery-api/url-token-signing/). Response codes are available in the JW Platform Delivery API reference.

A good way to get all of the *feeds* before rendering the templates is with Javascript Promises. The following code snippet uses `Promise.all()` with `fetch()` to load all of the *feeds*, then renders the template and sets up the *player instance*.

```javascript
var apiRoute = "https://cdn.jwplayer.com/v2/playlists/";
Promise.all(
  feeds.map(feedid => fetch(apiRoute + feedid).then(resp => resp.json()))
).then(results => {
  // replace the feeds array with all of the now-fetched feed objects
  feeds = results;
  renderTemplate();
  setupPlayer(feeds[0]);
});
```

If you need to cover browsers that don't support ES6 features, here's how you'd do it with jQuery Deferred objects. The Developer Showcase demo uses this method:

```javascript
$.when.apply($, feeds.map(function(feedid) {
  var def = $.Deferred();
  $.ajax(apiRoute + feedid).done(function(data) { def.resolve(data); });
  return def.promise();
})).then(function() {
  // replace the feeds array with all of the now-fetched feed objects
  feeds = $.makeArray(arguments);
  renderTemplate();
  setupPlayer(feeds[0]);
});
```

## Generating Views with Feeds
For the purposes of this demo, we'll be using [Handlebars.js](http://handlebarsjs.com/) to make our template.

```handlebars

<div id="player"></div>
<div id="js-playlists" class="playlists"></div>

<template id="js-playlist-template">
    <div class="playlist-switcher">
    {{#each this}}
        <a class="js-playlist-link playlist-link{{#if @first}} is-active{{/if}}" href="#" data-feedid="{{feedid}}">{{title}}</a>
    {{/each}}
    </div>
    {{#each this}}
    <div class="js-playlist playlist-container{{#if @first}} is-active{{/if}}" data-feedid="{{feedid}}">
        <ul class="playlist">
        {{#each playlist}}
            <li>
                <a class="js-video-link playlist-item" href="{{link}}" data-mediaid="{{mediaid}}">
                    <img src="{{image}}" alt="{{title}}">
                    <span>{{title}}</span>
                </a>
            </li>
        {{/each}}
        </ul>
    </div>
    {{/each}}
</template>
```

```javascript
var playlistsContainer = $('#js-playlists'),
    playlistsTemplate = $('#js-playlist-template').html();

var renderTemplate = function() {
  playlistsContainer.append(Handlebars.compile(playlistsTemplate)(feeds));

  // Create delegated click events for playlist and video links
  playlistsContainer.on('click', '.js-video-link', setPlayerVideo);
  playlistsContainer.on('click', '.js-playlist-link', setActivePlaylist);
};
```

## Setting Up the Player
The easiest way to programmatically set up the *player instance* with a *playlist* is to set the `playlist` property in your `setup()` call. This property will accept an API route as a string, or an array of playlist items. Both methods are demonstrated in the [JW Player Javascript API documentation](https://developer.jwplayer.com/jw-player/docs/developer-guide/customization/configuration-reference/#playlist).

Since we already have all of our *feeds* ready to go, we can set up the *player instance* with a *playlist* from our `feeds` array:

```javascript
var playerInstance;
var setupPlayer = function(thisFeed) {
  // Initialize the player
  playerInstance = jwplayer('player').setup({
    aspectratio: '4:3',
    displaytitle: true,
    logo: false,
    playlist: thisFeed.playlist,
    visualplaylist: true,
    width: '60%'
  });

  // Change the highlighted item in the playlist when the video changes
  playerInstance.on('playlistItem', setActiveVideo);
};
```

## Maintaining Playlist Context

We need to make sure when the *player instance* advances through its *corresponding playlist*, the highlighted *video link* changes to match. Since a *video link* can show up in more than one *feed*, this requires checking against the `mediaid` as well as the `feedid` so that the correct *video link* gets highlighted.

```javascript
var setActiveVideo = function(e) {
  var feedid = e.item.feedid,
      mediaid = e.item.mediaid;

  $('.js-video-link').removeClass('is-playing').filter(function() {
    return $(this).data('mediaid') === mediaid &&
      $(this).closest('.js-playlist').data('feedid') === feedid;
  }).addClass('is-playing');
};
```

Likewise, we need to load the right *playlist* when a *video link* is selected, so that the *player instance* can correctly advance through the *corresponding playlist*. in the `renderTemplate()` function we attached an event listener that does just that, and just like before, we need to check against the `mediaid` as well as the `feedid`:

```javascript
var setPlayerVideo = function(e) {
  var captured = $(this),
      feedid = captured.closest('.js-playlist').data('feedid'),
      mediaid = captured.data('mediaid');

  // Gotta get the right playlist for this particular video link
  var currentPlaylist = feeds.filter(function(thisFeed) {
    return thisFeed.playlist.some(function(thisVideo) {
      return thisVideo.mediaid === mediaid && thisVideo.feedid === feedid;
    });
  }).shift().playlist;

  // Get the index of the video that matches this link's mediaid
  var videoIndex = currentPlaylist.findIndex(function(el) {
    return mediaid === el.mediaid;
  });

  e.preventDefault();

  // Only load this playlist if the player's current playlist is different
  if (currentPlaylist !== playerInstance.getPlaylist()) {
    playerInstance.load(currentPlaylist);
  }

  // Tell the player to play the video at this playlist index
  playerInstance.playlistItem(videoIndex);
};
```

Finally, we'll use a listener we added in the `renderTemplate()` function that lets us toggle between playlists in the view. In the demo, we're only showing one playlist at a time, and this function just toggles which playlist is displayed:

```javascript
var setActivePlaylist = function(e) {
  // Switch the visible playlist when its label is clicked
  var captured = $(this);
  e.preventDefault();

  if (!captured.hasClass('is-active')) {
    // Change the active playlist link
    $('.js-playlist-link').removeClass('is-active');
    captured.addClass('is-active');

    // Change the active visible playlist
    $('.js-playlist').removeClass('is-active').filter(function() {
      return $(this).data('feedid') === captured.data('feedid');
    }).addClass('is-active');
  }
};
```
