# Embedding Players

When building JW Platform into your own website or CMS, one of the most important functionalities is the generation of player embed codes for programmatic publishing.

## Introduction

Let's look at the typical player embed code:

    <script type="text/javascript" src="//cdn.jwplayer.com/players/nPripu9l-ALJ3XQCI.js"></script>

The URL of the player itself is what's most interesting here; the wrapping JavaScript tag is always the same. It consists of five parts:

* The Delivery API root. This is usually *cdn.jwplayer.com*, but it is another domain if you use [DNS Masking](https://support.jwplayer.com/customer/portal/articles/1433702-dns-masking).
* The path to players, */players/*. Note the URL scheme serves other stuff you can access too, like videos, thumbs and feeds.
* The **media ID** of the video you want to embed, *nPripu9l*. This is an 8 character string that can be found in the videos overview and details pages in the dashboard. It can also be retrieved through the [Management API](/management-api/index.md).
* The **Player ID** of the player you want to embed the video with, *ALJ3XQCI*. This is an 8 character string that can be found in the players overview and details pages in the dashboard. It too can be retrieved through the [Management API](/management-api/index.md).
* The extension of the player, *.js*. The player is also available as an HTML iframe with the extension of: *.html*.

Only the **Media ID** and **Player ID** part of the embed code change depending on the video and player you embed. The other parts always remain the same. 

As always, if you have questions or additional code you want to share, please [see our community questions](https://support.jwplayer.com/customer/portal/questions/new).
