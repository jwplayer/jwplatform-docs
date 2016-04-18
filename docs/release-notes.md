# JW Platform Release Notes

<!--
Template for future releases, copypasta me below

## 2016-XX-XX

### New Features
- foo
- Bar
- Cat
### Updated Features
- foo
- Bar
- Cat
### Bug Fixes
- foo
- Bar
- Cat
### Known Issues
- foo
- Bar
- Cat

-->

## 2016-04-18

### New Features
- Trending and related feeds *BETA Preview*. With a special account entitlement, JW Platform now supports two new varieties of feeds. Trending feeds are dynamically generated based on recently trending videos. Related feeds allow are dynamically populated with media having similar content. The new functionality is configurable through the [/channels](https://developer.jwplayer.com/jw-platform/reference/v1/methods/channels/index.html) API endpoint and is served through a new [/feed.rss](https://developer.jwplayer.com/jw-platform/reference/v1/urls/feed.html) content service endpoint.
- Video Sunset. Videos can be configured to expire at a predetermined date and time. After their `expires_date`, videos will no longer show up in playlists and subsequent requests for videos will not be allowed. The `expires_date` can be specified in the [dashboard](https://support.jwplayer.com/customer/portal/articles/1469776-adding-managing-videos) or through the API during [creation](https://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/create.html) or as an [update](https://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/update.html) to a video.
### Updated Features
- Dashboard redesign. The JW Player Dashboard has been updated to simplify and give quick access to popular features through an updated left navigation panel and redesigned account section.


## 2016-03-31

### New Features
- Support for VP9 transcoding and adaptive streaming of VP9 conversions using DASH. This feature requires a separate account entitlement and is only open to users in a limited pilot at this time.
### Updated Features
- JW7 single-line embed performance enhancement. Embeds of JW Player version 7 now include media links. This means faster player setup and time to first frame. It also means that free edition player will be able to take advantage of the various quality transcodes created by JW Platform.
### Bug Fixes
- Custom skins with JW7. This release allows the inclusion of the skin name with custom css skins for JW7 players. Using custom skins for JW7 requires matching the skin name with the jw-skin-<skin_name> string in the css.
- Fixed an issue with URL tokenization where iframe single-line embeds that were correctly signed were failing signature validation.


## 2016-03-21

### Updated Features
- Updated JW7 iframe embeds to listen for play and pause events on the iframe and pass them to the contained player.



## 2016-03-03 Upload to s3

### New Features
- **Upload videos directly to the cloud!** JW Platform now supports video uploads (up to 5GB) directly to s3. s3 uploads take advantage of global cloud infrastructure including edge services to achieve the fastest and most reliable uploads globally. Details at: http://http://developer.jwplayer.com/jw-platform/reference/v1/s3_uploads.html
