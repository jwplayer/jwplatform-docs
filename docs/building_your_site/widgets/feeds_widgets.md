#Recommended Feeds Widgets

JW Player’s network of connected players provides a deep pool of data for video recommendations. The recommendations engine uses anonymized audience engagement data to create clusters of content affinity and uncover viewing patterns that would be overlooked by 3rd party recommendations solutions.

Putting recommended content in page widgets (ie: outside of players where viewers can see them while watching video) encourages more clicks instead of bounces. To that end, we have designed several feeds widgets for you to use as inspiration for your own design or copy them directly and simply swap out the content.

This document describes how to customize the feeds widgets with your content and provides guidance for CSS skinning. For more background information on building and managing data-driven feeds, see our [Support Article](support.jwplayer.com/customer/en/portal/articles/2383600-building-managing-data-driven-feeds).

![Feeds Widget](/images/feeds-widget.png)

##Getting Started

You can [view the feeds widget demos](developer.jwplayer.com/jw-player/demos/customization/) on our developer site and [fork the source code](github.com/jwplayer/jwdeveloper-demos/) from Github. Each widget comes with a readme providing instructions to run it locally.

##JavaScript Widget

###The Basics

The JavaScript widget uses jQuery, UnderscoreJS, and Handlebars. In order to modify the widget for your site, you will need to configure `index.html`, `js/feeds_harness.js`, and `/templates/item.hbs`. You can also use our [CSS Reference](/feeds_widget_css_reference.md) to modify `css/style.css`.

[View the JavaScript Feeds Widget Demo.](developer.jwplayer.com/jw-player/demos/customization/feeds-js/)

###Title your Feed

The `index.html` file sets up the `player` and `feed` divs on the page. 

The feed container manually specifies the feed title, which you can change here.

    <h2 class="jw-feed-title">My Feed</h2>

You can also style the feed using class="jw-feed", as defined in the feed div. See the [CSS Reference](/feeds_widget_css_reference.md) for more information on styling your feed.

    <div id="feed" class="jw-feed">

###Populate your Feed

The `js/feeds_harness.js` file dynamically populates the content for `<div id="feed">`.

Look for `var FEED_URL` and replace the feed_id in the URL with a feed_id from your dashboard. This specifies the content being pulled in to the widget.

    var FEED_URL = '//content.jwplatform.com/feed.rss?feed_id=Xw0oaD4q&related_media_id=';

You can find your Feed ID using the "Feeds" tab under "Lists" in the Dashboard. When you select a feed title from the list, you can view the Feed ID and URL.

![Dashboard Screenshot](/images/feeds-dashboard.png)

The widget provides code for either a JSON or RSS feed. It is set to RSS by default, but JW Player provides both JSON and RSS feeds.

See the [Platform API Reference](developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) for more information on using the `feed.rss` endpoint programmatically.

###Setup your Player

Configure the anchor video (the content that plays first on page load) by setting up the player with a `mediaid` and corresponding `file` and `image` from your content library. The setup function uses playerdiv and tilediv as variables for player and feed.

    function setup(playerdiv,tilediv) {
       var mediaid  = "uNXCVIsW";
        jwplayer(playerdiv).setup({
            file:"//content.jwplatform.com/videos/uNXCVIsW-8LSW5F2t.mp4",
            image:"//content.jwplatform.com/thumbs/uNXCVIsW-480.jpg",
            mediaid: mediaid

###Render your Feed

The `templates/item.hbs` file is the template object for each piece of content in your feed. It includes `id`, `image`, `title`, `desc`, and `dur`. You can use this file to determine which metadata displays in the feed.

By default, the widget does not display video description in the feed, but you can uncomment `<p class="jw-media-description">{{desc}}</p>` to show it. Try commenting/uncommenting different lines to hide/show their corresponding metadata in your feed.

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

The feed classes follow the JW Player skinning model. See our [CSS Reference](/feeds_widget_css_reference.md) for more information on skinning your widget. 

###Run Customized Feed Widget

Simply follow the [README](github.com/jwplayer/jwdeveloper-demos/tree/master/demos/customization/feeds-js/README.md) to run your widget locally.

##Angular JS Widget

###The Basics

In order to modify the Angular JS widget for your site, you will need to configure two to three files: `landing.js`, `landing.html`, and (optionally) `feed.html`. You can also use our [CSS Reference](/feeds_widget_css_reference.md) to modify `css/app.css`.

[View the Angular JS Feeds Widget Demo.](developer.jwplayer.com/jw-player/demos/customization/feeds-angular-js/#/feedExample)

###Setup your Player

`landing/landing.js` initializes the configuration of the angular app. We only need to do this once. The runonce function is called when the template first loads by calling `<div ng-init="runonce()"></div>`. Configure the anchor video (the content that plays first on page load) by setting up the player with a `file`, `image`, and corresponding `mediaid` from your content library.

  $scope.runonce = function () {
      $rootScope.firstPlaylist = [{
        file: "//content.jwplatform.com/videos/RltV8MtT-p3ZNjGCa.mp4",
        image: "//content.jwplatform.com/thumbs/RltV8MtT-320.jpg",
        mediaid: "RltV8MtT"
      }];

###Populate your Feed

In the same `landing/landing.js` file, replace the feedId with a feedID from your dashboard to specify the content being pulled in to the widget.

	$rootScope.feedId = "Xw0oaD4q"

###Title your Feed

The `landing/landing.html` file establishes the player container on the left and the feed container on the right hand side of the page. It also manually specifies the feed title, which you can change here.

	<h2 class="jw-feed-title">My Feed</h2>

You can also style the feed using class="jw-feed", as defined in the feed div. See the [CSS Reference](/feeds_widget_css_reference.md) for more information on styling your feed.

###Render your Feed

The `feed/feed.html` file is the template object for each piece of content in your feed. It includes `image`, `title`, `description`, and `duration`. You can use this file to determine which metadata displays in the feed.

By default, the widget does not display video description in the feed, but you can uncomment `<p class="jw-media-description">{{item.description}}</p>` to show it. Try commenting/uncommenting different lines to hide/show their corresponding metadata in your feed.

```HTML
<div class="row jw-option" ng-repeat="item in feed" ng-click="loadVideo(item)">
  <div class="jw-thumbnail-container">
    <img src="{{item.image}}" class="jw-thumbnail"/>
  </div>

  <div class="jw-metadata-container">
    <h3 class="jw-media-title">{{item.title}}</h3>
    <!--<p class="jw-media-description">{{item.description}}</p>-->
    <time class="jw-media-duration">{{item.duration}}</time>
  </div>
```

The feed classes follow the JW Player skinning model. See our [CSS Reference](/feeds_widget_css_reference.md) for more information on skinning your widget. 

###Run Customized Feed Widget

The `app.js` file builds the page from all of the partials. Simply follow the [README](github.com/jwplayer/jwdeveloper-demos/tree/master/demos/customization/feeds-angular-js/README.md) to run your widget locally.