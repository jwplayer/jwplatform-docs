# JW Platform Release Notes

<!--
Template for future releases, copypasta me below

## 2016-XX-XX

### New Features
* foo
* Bar
* Cat
### Updated Features
* foo
* Bar
* Cat
### Bug Fixes
* foo
* Bar
* Cat
### Known Issues
* foo
* Bar
* Cat

-->

## 2016-08-02

### New Features
* A new [python API kit](https://github.com/jwplayer/jwplatform-py) is available for JW Platform integration. This API kit supports both python 2 and 3 and is available via `pip install jwplatform`.


## 2016-07-28

### Updated Features
* Improved transcoding support for interlaced originals.


## 2016-07-26

### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.5. This adds DRM compatibility for two additional browsers (Firefox and Safari Desktop) as well as improvements to captions positioning, handling, and styling. Aria integration improves accessibility by adding support for screen readers. Finally, we've exposed additional tracking information via our API, and made VMAP ad scheduling more robust. Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version75).


## 2016-07-25

### Updated Features
* Updated opengraph url tag to use the same player key as the iframe player including it.
### Bug Fixes
* Fixed issue in accessing tracks that were uploaded without an extension.


## 2016-07-20

### Bug Fixes
* Data driven feeds properly support OPTIONS requests with CORS headers.


## 2016-07-18

### New Features
* The JW Platform Dashboard now offers new roles for read-only users and content editors more information is available on our [blog post](https://www.jwplayer.com/blog/new-dashboard-user-roles/).


## 2016-07-05

### New Features
* We are pleased to offer a new Platinum Edition of JW Player that includes a basic allotment of advertising impressions and increased hosting and streaming limits over the Premium Edition. Get started [here](https://www.jwplayer.com/get-started/).


## 2016-06-30

### Updated Features
* All content now has a 1920px wide poster image available. It is accessible in the [same way](https://developer.jwplayer.com/jw-platform/reference/v1/urls/thumbs.html) as other poster images. 


## 2016-06-14

### New Features
* Data-driven similar and trending feeds now support content signing using JSON Web Tokens. More details are available [here](https://developer.jwplayer.com/jw-platform/reference/v1/jwt_signing.html).


## 2016-06-06

### Updated Features
* Single line player embeds can now use a trending feed_id as a key to include trending content directly in a player as a playlist.


## 2016-05-31

### New Features
* Data-driven similar and trending feeds are now available in json format. More details are available [here](https://developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html).


## 2016-05-23

### New Features
* Enterprise Edition accounts can now configure and serve advertising schedules.
* Added API rate limiting information to API responses.
### Updated Features
* The no-index metatag has been removed from iframe players to improve search engine indexing.
### Bug Fixes
* Fix ensures that deleted ad tags not served even if an ad break is configured to use them.


## 2016-05-10

### Updated Features
* It is possible to create `sourcetype: url` videos with `sourceformat: mpd` allowing externally hosted DASH manifests to be served with JW Player single line embeds. 
* Adjusted cache control headers on the content service to allow an individual browser to use the same download for longer, this should reduce delivery costs on looping videos.
### Bug Fixes
* We removed the spaces (now there are only commas) between tags in JW7 single line embeds and json feeds. This allows for using the `__item-tags__` macro directly with DFP for Google IMA Ad Tags.


## 2016-05-04

### New Features
* Dashboard uploads now take advantage of S3 Accelerated Transfer.


## 2016-04-26

### New Features
* Trending type feeds are now supported in JW Platform single line embeds.
### Updated Features
* JW Player 7.4.0 was released to the staging channel. Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version74). Of particular interest to platform embeds, the new version includes:
	* Support for HLS in HTML5. Cloud hosted players can take advantage of this by setting `"primary":"html5"` or omitting the `primary` property of the player.
	* Updated support for VP9-DASH to check for VP9 support in the browser before chosing the DASH source. This allows browers like Edge to fall back to HLS until they support VP9 rendering.
	* Google IMA ad tags will automatically get duration and video title added to the request url for more enhanced ad targeting.
* [JSON feeds](https://developer.jwplayer.com/jw-platform/reference/v1/urls/feeds.html#format-of-json-feeds) now include VP9-DASH sources and restructured custom parameters to align with the behavior of single line embeds. 
### Bug Fixes
* Vertical video with a non-zero rotation parameter served by JW Platform now renders properly in all devices without stretching.
* Cloud hosted related plugins support zero second autoplay countdown to allow the player to immediately proceed into the first related video upon completion.


## 2016-04-18

### New Features
* Trending Playlists and Similar Video Feeds *BETA Preview*. With a special account entitlement, JW Platform now supports two new varieties of Data-Driven Recommendations access. Trending Playlists are dynamically generated based on recently trending videos. Similar Video Feeds allow are dynamically populated with media having similar content metadata. The new functionality is configurable through the [/channels](https://developer.jwplayer.com/jw-platform/reference/v1/methods/channels/index.html) API endpoint and is served through a new [/feed.rss](https://developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) content service endpoint.
* Video Sunset. Videos can be configured to expire at a predetermined date and time. After their `expires_date`, videos will no longer show up in playlists and subsequent requests for videos will not be allowed. The `expires_date` can be specified in the [dashboard](https://support.jwplayer.com/customer/portal/articles/1469776-adding-managing-videos) or through the API during [creation](https://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/create.html) or as an [update](https://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/update.html) to a video.
### Updated Features
* Dashboard redesign. The JW Player Dashboard has been updated to simplify and give quick access to popular features through an updated left navigation panel and redesigned account section.


## 2016-03-31

### New Features
* Support for VP9 transcoding and adaptive streaming of VP9 conversions using DASH. This feature requires a separate account entitlement and is only open to users in a limited pilot at this time.
### Updated Features
* JW7 single-line embed performance enhancement. Embeds of JW Player version 7 now include media links. This means faster player setup and time to first frame. It also means that free edition player will be able to take advantage of the various quality transcodes created by JW Platform.
### Bug Fixes
* Custom skins with JW7. This release allows the inclusion of the skin name with custom css skins for JW7 players. Using custom skins for JW7 requires matching the skin name with the jw-skin-<skin_name> string in the css.
* Fixed an issue with URL tokenization where iframe single-line embeds that were correctly signed were failing signature validation.


## 2016-03-21

### Updated Features
* Updated JW7 iframe embeds to listen for play and pause events on the iframe and pass them to the contained player.


## 2016-03-03 Upload to s3

### New Features
* **Upload videos directly to the cloud!** JW Platform now supports video uploads (up to 5GB) directly to s3. s3 uploads take advantage of global cloud infrastructure including edge services to achieve the fastest and most reliable uploads globally. Details available [here](https://developer.jwplayer.com/jw-platform/reference/v1/s3_uploads.html).
