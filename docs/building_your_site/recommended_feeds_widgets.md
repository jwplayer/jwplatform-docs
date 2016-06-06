#Recommended Feeds Widgets

JW Player’s network of connected players provides a deep pool of data for video recommendations. The recommendations engine uses anonymized audience engagement data to create clusters of content affinity and uncover viewing patterns that would be overlooked by 3rd party recommendations solutions.

Putting recommended content in page widgets (ie: outside of players where viewers can see them while watching video) encourages more clicks instead of bounces. To that end, we have designed several feeds widgets using various frameworks. You can use these widgets as inspiration for your own design or copy them directly and simply swap out the content.

This document describes how to customize the feeds widgets with your content and provides guidance for CSS skinning. For more background information on building and managing data-driven feeds, see our [Support Article](//support.jwplayer.com/customer/en/portal/articles/2383600-building-managing-data-driven-feeds).

!!!
JOSIE: INSERT feeds-widget img
!!!

##Getting Started

You can [view the feeds widget demos](developer.jwplayer.com/jw-player/demos/customization/) on our developer site and [fork the source code](https://github.com/jwplayer/jwdeveloper-demos/) from Github. Each widget comes with a readme providing instructions to run it locally.

##JavaScript Widget

###The Basics

The JavaScript widget uses Bootstrap, jQuery, and UnderscoreJS. All dependencies are built in. In order to modify the widget for your site, you will need to configure `index.html`, `/js/feeds_harness.js`, and `/templates/item.hbs`. You can also use our CSS skinning reference to modify `/css/style.css`.

[View the JavaScript Feeds Widget.](developer.jwplayer.com/jw-player/demos/customization/feeds-js/)

###Title your Feed

The `index.html` file sets up the `player` and `feed` divs on the page. 

The feed container manually specifies the feed title, which you can change here.

    <h2 class="jw-feed-title">My Feed</h2>

You can also style the feed using class="jw-feed", as defined in the feed div. See the CSS Skinning Reference for more information on styling your feed.

    <div id="feed" class="jw-feed">

###Populate your Feed

The `/js/feeds_harness.js` file dynamically populates the content for `<div id="feed">`.

Replace the link associated with `var FEED_URL` with a feed URL from your dashboard to specify the content being pulled in to the widget. See the [Platform API Reference](developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) for more information on the `/feed.rss` endpoint.

    var FEED_URL = '//content.jwplatform.com/feed.rss?feed_id=Xw0oaD4q&related_video=';

###Setup your Player

Configure the content that plays on page load by setting up the player with a `mediaid` and corresponding `file` and `image` from your content library. The setup function uses playerdiv and tilediv as variables for player and feed.

    function setup(playerdiv,tilediv) {
       var mediaid  = "uNXCVIsW";
        jwplayer(playerdiv).setup({
            file:"//content.jwplatform.com/videos/uNXCVIsW-8LSW5F2t.mp4",
            image:"//content.jwplatform.com/thumbs/uNXCVIsW-480.jpg",
            mediaid: mediaid

###Adjust Feed Display

The `/templates/item.hbs` file dynamically generates an unordered list of metadata for each piece of content, including `id`, `image`, `title`, `desc`, and `dur`. You can use this file to determine which data displays in the feed. By default, the widget does not display `desc`, but you can uncomment `<p class="jw-media-description">{{desc}}</p>` to display all fields or comment out other lines to hide the corresponding field.

	<li id={{id}} class="jw-option">
		<div class="jw-thumbnail-container">
			<img class="jw-thumbnail" src="{{image}}">
		</div>
		<div class="jw-metadata-container">
			<h3 class="jw-media-title">{{title}}</h3>
			<!--<p class="jw-media-description">{{desc}}</p> -->
			<time class="jw-media-duration">{{dur}}</time>
		</div>
	</li>

The feed classes follow the JW Player skinning model. See our CSS Reference for more information on skinning your widget. 

###Run Customized Feed Widget

Simply follow the README to run your widget locally.

!!!
Include link to developer guide article and demos page in readme.
!!!

##Angular.js Widget

###The Basics

The Angular.js widget uses the Angular.js framework. All dependencies are built in. In order to modify the widget for your site, you will need to configure three views: `feedExample.js`, `player.js`, and `feed.js`. You can also use our CSS skinning reference to modify `/css/style.css`.

[View the Angular.js Feeds Widget.](developer.jwplayer.com/jw-player/demos/customization/feeds-angular-js/#/feedExample)

###Setup your Player

`/player/player.js` routes to the player div. Configure the content that plays on page load by setting up the player with a `file`, `image`, and corresponding `mediaid` from your content library.

	  $rootScope.player.setup({playlist:[{
	    file: "//content.jwplatform.com/videos/RltV8MtT-p3ZNjGCa.mp4",
	    image: "//content.jwplatform.com/thumbs/RltV8MtT-320.jpg",
	    mediaid: "RltV8MtT"
	    }],
	    mute: true
	});

###Title your Feed

The `/feed/feed.html` file parses the feed. It also manually specifies the feed title, which you can change here.

	<h2 class="jw-feed-title">My Feed</h2>

You can also style the feed using class="jw-feed", as defined in the feed div. See the CSS Skinning Reference for more information on styling your feed.

!!!
INSERT CODE SNIPPET
!!!

###Populate your Feed

The `/feed/feed.js` file routes to the feed div. Replace the link associated with `var url` with a feed URL from your dashboard to specify the content being pulled in to the widget. See the [Platform API Reference](developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) for more information on the `/feed.rss` endpoint.

    var getFeed = function(id){
      var url = '//content.jwplatform.com/feed.rss?feed_id=Xw0oaD4q&related_video=' + id;
      $http.get(url, {responseType:'document'}).then(function successCallback(response){
        $scope.feed = jwplayer.utils.rssparser.parse(response.data.childNodes[0]);
      });
    };

The loadVideo function loads all the data from the feed into the view. You can use this file to determine which data displays in the feed. By default, the widget does not display `desc`.

!!!
ADD CODE SNIPPET THAT YOU CAN UNCOMMENT ONCE DESC/DUR ARE AVAILABLE.
!!!

###Run Customized Feed Widget

The `/js/main.js` file builds the page from all of the partials. Simply follow the README to run your widget locally.

!!!
NEED TO ADD README. Include link to developer guide article and demos page in readme.
!!!