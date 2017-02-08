# Using the JW Platform Delivery API for Embedding on Your Site

The JW Platform Delivery API at cdn.jwplayer.com offers endpoints from which you can request content and players configured in JW Platform. Embedding JW Platform hosted content and players in your sites and applications is achieved with the Delivery API through a standard URL scheme giving access to pre-packaged single line embeds, feeds, sources and other assets. These endpoints are the correct mechanism for making high volume calls from your webpage or application and are optimized for quick responses. Requests to the content service can be protected with URL token signing.

We are in the process of building out a second version of the Delivery API. The fundamental changes in the v2 endpoints are:

* Interactive API documentation flowing from an [Open API Initiative](https://www.openapis.org/) compliant API definition.
* Significantly more request time parameterization, v2 endpoints accept numerous query parameters allowing for future feature growth without complicating simple calls.
* URL token signing based on modern cryptography and the JSON Web Tokens (JWT) [standard](https://tools.ietf.org/html/rfc7519).


## Delivery API v2 endpoints:

* [/v2/media/{media_id}](https://app.swaggerhub.com/api/jwplayer/Delivery-API/v2.0) provides a json object or rss feed describing a media item including metadata, sources, and associated assets like tracks.
* [/v2/playlists/{playlist_id}](https://app.swaggerhub.com/api/jwplayer/Delivery-API/v2.0) provides a json object or rss feed describing a playlist item including metadata and constituent media items with their metadata, sources, and associated assets like tracks.


## Delivery API v1 endpoints:

* /feeds/ **deprecated in favor of /v2/media/{media_id} and /v2/playlists/{playlist_id}**
* [/libraries/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/libraries.html) provides access to single line embeddable cloud-hosted players with no media.
* [/manifests/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/manifests.html) provides access to adaptive bitrate streaming manifests for videos hosted with JW Platform.
* [/players/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/players.html) provides access to single line embeddable cloud-hosted players with media included in the embed.
* [/videos/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/videos.html) provides access to individual video transcodes hosted with JW Platform.
* [/thumbs/](https://developer.jwplayer.com/jw-platform/reference/v1/urls/thumbs.html) provides access to video poster images.
