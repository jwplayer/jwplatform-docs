# JW Platform Release Notes

<!--
Template for future releases, copypasta me below

## 2017-XX-XX

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
## 2017-05-01

### New Features
* JW Live is now included for all high volume hosting and streaming enterprise accounts
### Updated Features
* Player pre-roll ad tags have been automatically migrated to advertising schedules which provide additional analytics capabilities.
### Bug Fixes
* Safari users can now upload tracks via the dashboard
* Fixed an issue related to uploading videos with 4-byte Unicode in the filename.


## 2017-04-27

### New Features
* It is now possible to upload text tracks for externally hosted media.
### Updated Features
* Bulk segmentation queries. Uers can now select one or multiple players from the Players List page to explore analytics for their selected player(s). This enables comparing performance across multiple players for customers with the Advanced Analytics entitlement


## 2017-04-13

### New Features
* Static RTMP endpoints for JW Live. JW live streams are now restartable (aka "static RTMP entry point URL"), which means that you can restart your live stream without having to reconfigure your encoder or re-embed a new player embed code each time you broadcast. 


## 2017-03-29

### Updated Features
* The default ```max_videos``` on creation for Similar playlists is now 25. This fully populates three pages of video recommendations on the player.
### Bug Fixes
* The Management API now returns a 400 response for videos/conversions/create requests when the original is not available.


## 2017-03-28

### New Features
* Improved analytics segmentation with new metrics and dimensions. Full details are available [here](https://support.jwplayer.com/customer/portal/articles/2546957-analytics-segmentation).
    * New metrics including: Ad Requests (beta), Ad Clicks (beta), Ad Skips (beta), Ad Completes (beta), Fill Rate (impressions / requests) (beta), Unique viewers, Quartile 1 plays (25% complete), Quartile 2 plays (50% complete), Quartile 3 plays (75% complete), Complete rate (completes / plays), Time watched per viewer (time watched / unique viewers), Ad Impressions per viewer (ad impressions / unique viewers), Video plays per viewer (plays / unique viewers)
    * New Dimensions including: Ad Schedule ID, Page URL (query strings are trimmed), Region, City
    * Note: The new (beta) advertising metrics require using platform hosted ad schedules with single line embed platform players


## 2017-03-22

### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.10.1. This update includes:
    * DASH Updates
        * Added support for DVR, multiple audio tracks and custom quality labels
        * Added bitrate to quality labels to differentiate between levels with the same height but different bitrate
        * Added ability to display language with captions and audio tracks
    * Live Streaming
        * Improved handling of Live stream completion by showing the end state
        * General improvements to HLS and Dash streaming
    * Viewability
        * Added viewability data to player API events
        * Added a getViewable() method which returns 1 when 50% or more of the player is visible and 0 otherwise
        * Added a config option - "autostart": "viewable" - for starting playback on desktop devices when the player is viewable
    * UI
        * Added a config option - “nextUpDisplay”: false - to disable the “Next Up” tooltip
        * Added support for timeslider thumbstrips on mobile
        * Improved default styling of captions
    * General Updates
        * Improved handling of VMAP breakstart/breakend events
        * Added support for muted autoplay on Chrome in iOS
        * Several Bug Fixes
    * Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version710).


## 2017-03-20

### New Features
* Bulk segmentation queries in the dashboard. Users can now select a subset of videos from the Video List page and launch a segmentation query to view detailed analytics for the videos of interest (for customers with the Advanced Analytics entitlement). This is surfaced through the “Explore Analytics” bulk action button that appears at the top when more than one video is selected. 
### Updated Features
* Improved token signing user experience. For properties with content signing turned on we’ve added a countdown and additional messaging to prevent confusion and allow technical users to test and experiment with links in the dashboard with the right expectations.
### Bug Fixes
* Added parameter to platform hosted HLS manifests to avoid unknown captions notice on Safari.


## 2017-03-02

### New Features
* [Delivery API](https://developer.jwplayer.com/jw-platform/docs/developer-guide/delivery-api/) v2 is now available on for ```/v2/media/``` and ```/v2/playlists/```. These endpoints provide JSON or RSS responses for individual media items and playlists including all media items.
    * These endpoints have additional request-time parameters including poster image width and pagination. More parameters will be available soon. An interactive API reference is available [here](https://developer.jwplayer.com/jw-platform/docs/delivery-api-reference/).
    * /v2/ endpoints use [standards based](https://tools.ietf.org/html/rfc7519) JWT [url signing](https://developer.jwplayer.com/jw-platform/docs/developer-guide/delivery-api/url-token-signing/) if content protection is enabled.
    * JSON playlist responses include a pagination ```"links":``` parameter to iterate through videos beyond the first set returned.


## 2017-02-02

### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.9. This update includes:
    * Improved usability of controls at small player sizes and on touch devices
    * Added a configuration - "timeSliderAbove"
    * Updated Casting to connect to the default receiver application hosted by Google
    * Added AirPlay support
    * Added configuration option "vpaidcontrols: true"
    * Added support for Azure's PlayReady AES functionality
    * Several bug fixes
    * Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version79).


## 2017-02-01

### Bug Fixes
* Fixed horizontal alignment for preview players using a fixed width player setting.


## 2017-01-05

### Updated Features
* Ad impressions are now available as a metric in analytics. Users with advanced analytics can segment and filter ad impressions against dimensions of Media, Player, Feed, Device, Domain, Country, and/or Platform.


## 2016-12-14

### Updated Features
* Added a new video attribute, ```updated``` (a unix timestamp for when the video was last updated), in the JW Platform API. [/videos/list](https://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/list.html) calls can ```order_by``` (```updated:desc``` or ```updated:asc```) or filtered by the ```updated_after``` parameter.
    * The attribute is updated whenever:
        * Media metadata gets changed (title, description, author, etc.)
        * Tags get added or removed from the media
        * Custom parameters are added, removed or values are changed.
        * When a tag is globally deleted (via the dashboard or [/accounts/tags/delete/](https://developer.jwplayer.com/jw-platform/reference/v1/methods/accounts/tags/    delete.html)) all media associated with that tag get a new updated value
        * Certain back-end processes (ex: transcoding operations) put a new value in the updated attribute although these updates may not have any user noticeable changes     reflected in the API output other than the new updated value.
    * Known Limitations (on our radar for a future update):
        * At this time, if you change the name of an existing tag using the dashboard or [/accounts/tags/update](https://developer.jwplayer.com/jw-platform/reference/v1/methods/accounts/tags/update.html); associated media does not get a new updated value.
        * Adding or updating tracks associated with the media does not yet trigger an update of the associated media.


## 2016-12-13

### Updated Features
* Per item data driven recommendations are now available for content with [URL token signing](https://developer.jwplayer.com/jw-platform/reference/v1/content_signing.html) enforcement enabled.


## 2016-12-12

### New Features
* Video trimming. It is now possible to trim videos to exclude portions from the beginning and/or end of a video. This can be done on the video details page of the dashboard or via the API.
* Autoplay ads muted. Cloud hosted JW7 players can now include the configuration option to enable autoplay of muted ads on mobile. This can be done on the players details page under playback options.
* Additional simulcast of live streams. Users can now enter in server key and stream URLs on the live stream creation page, to simulcast their live streams to Youtube, Facebook and Twitch. Configuring simulcast targets must be done at live stream creation time.


## 2016-12-09

### Updated Features
* Updated [AMP](https://www.ampproject.org/) behavior to handle explicit play/pause events.
* Updated the content API [robots.txt](https://cdn.jwplayer.com/robots.txt) to disallow only links to /previews/* this enables strong SEO of hosted content. Users desiring to avoid indexing can use the [/previews/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/previews.html) players on their site whereas most users will want to use [/players/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/players.html) single line embeds.
### Bug Fixes
* Fixed rare but incorrect not allowed responses to geo-restricted content being accessed from users in allowed counties.



## 2016-11-30

### New Features
* Designate videos as 360 content. You can now designate a video as 360 including the stereoscopic mode from the video detail page or by adding the custom parameter ```custom.stereomode``` with a value of ```monoscopic```, ```stereoscopicTopBottom``` or```stereoscopicLeftRight```. This will tell the player to use 360 rendering with the appropriate 3D mode. 360 formatted videos can be uploaded, transcoded and served just like standard videos.
### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.8. This update includes:
    * Adds failover support to load the player via HTML5 when Flash is chosen as the primary setting but is blocked or not available.
    * Added support for inline autoplay while muted on iOS and Android
    * Built in FreeWheel Ad Manager for HTML5
    * Updated player design responsiveness for improved usability at smaller player sizes
    * Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version78).
* Sharing embed codes in JW Platform single line embeds use protocol relative URLS for sharing over http or https with the same code.


## 2016-11-15

### Updated Features
* Updated Facebook OpenGraph sharing mechanism to avoid the use of Flash.


## 2016-11-01

### New Features
* Streaming limit emails to account admins. Premium, platinum, and ads/enterprise accounts without custom streaming limits now receive email notifications when they have reached 50%, 75% and 100% of their monthly GB streaming. The email is sent to all admin users associated with the account.
### Updated Features
* Live streaming has exited limited beta and is now in general availability for entitled accounts.
* Live streaming is available on both http and https.


## 2016-10-18

### New Features
* Search feeds can now be created in the dashboard under the recommended playlists section.
### Updated Features
* A new video details page design:
    * Includes the video preview on the detail page
    * Allows for editing of external URL duration
    * Linking to the video's analytics details


## 2016-10-04

### New Features
* Users with non-custom Ad Impressions limits will now receive email notifications as they approach their limits at 50%, 75% and 100% of the allotted impressions served. The email is sent to account admin level users who can unsubscribe if desired.
### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.7. This update includes:
    * New controlbar, playlist and feeds UI
    * HTML5 HLS in Firefox
    * Improved performance in Google IMA
    * Better DASH support and performance with Shaka 2.0
    * Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version77).

## 2016-09-28

### Updated Features
* Increased API rate limits. The JW Platform API now allows users up to 60 API calls per minute. Calls that exceed this rate will result in a 429 Rate Limit Exceeded error and will not be executed. Note that calls to cdn.jwplayer.com do not count towards the API rate limit.


## 2016-09-21

### New Features
* Search feeds allow you to build widgets or tools on your site where users can use textual search to find videos in your library. You can now [create](https://developer.jwplayer.com/jw-platform/reference/v1/methods/channels/create.html) a search type feed and [serve it](https://developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) like other data driven feeds from our content service.


## 2016-09-13

### Updated Features
* The related items overlay now populates with recommendations from our data driven feeds feature. The recommendations update with each item playing in the player and can be served on properties with content URL signing enforced.
* Additionally, you can choose which related feed to use for each player. This allows publishers to recommend only videos that match tag based rules.


## 2016-09-08

### New Features
* The JW Live private beta has now launched! You can now broadcast a live stream directly from JW Platform via our new JW Live feature. See the [documentation](https://support.jwplayer.com/customer/portal/articles/2549038-live-streaming) on JW Live to see a detailed description of how to setup a live stream. NOTE: You must be invited to the private beta to get access. Contact sales@jwplayer.com to request access.


## 2016-08-29

### New Features
* Analytics segmentation is now available to enterprise users with advanced analytics. This allows for filtering and segmenting analytics based on dimensions like media, player, feed, device, domain, country, and distribution platform. More information is available on our [blog](https://www.jwplayer.com/blog/segmentation/).


## 2016-08-15

### Updated Features
* The production channel of cloud hosted players now uses JW Player 7.6. This update improves the user experience when displaying related and recommended content. It also includes Google IMA advertising improvements. Full release notes are available [here](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/#version76).


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
