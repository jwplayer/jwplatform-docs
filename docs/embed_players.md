When building JW Platform into your own website or CMS, one of the most important functionalities is the generation of player embed codes for programmatic publishing.

To ensure fair access for all, usage of api.jwplatform.com is limited to **10 calls per minute**. We reserve the right to block API access to accounts that exceed this rate. If you need a higher API rate, please contact [sales@jwplayer.com](mailto:sales@jwplayer.com). Note that calls to content.jwplatform.com do not count towards the API rate limit.

This document applies to **JW Platform** hosting and streaming. Every account comes with some hosting and streaming included :-)

Introduction
------------

Let's look at the typical player embed code:

    <script type="text/javascript" src="http://content.jwplatform.com/players/nPripu9l-ALJ3XQCI.js"></script>

The URL of the player itself is what's most interesting here; the wrapping JavaScript tag is always the same. It consists of five parts:

-   The contentserver root. This is usually *content.jwplatform.com*, but it is another domain if you use [DNS Masking](/customer/portal/articles/1433702-dns-masking-the-jw-platform).
-   The path to players, */players/*. Note the [URL scheme](http://developer.longtailvideo.com/botr/#url-scheme) serves other stuff you can access too, like videos, thumbs and feeds.
-   The **key** of the video you want to embed, *nPripu9l*. This is an 8 character string that can be found in the videos overview and details pages in the CMS. It can also be retrieved through the API, which is what we'll do in this tutorial.
-   The **key** of the player you want to embed the video with, *ALJ3XQCI*. This is an 8 character string that can be found in the players overview and details pages in the CMS. It too can be retrieved through the API (see below).
-   The extension of the player, *.js*. For preview pages (see below), this should be *.html*.

Only the **key** and **id** part of the embed code change depending on the videos/players you embed. The other parts always remain the same. In order to get this dynamic data, we use two API calls:

-   [/videos/list](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/list.html): retrieves a list of videos from your account (including their **key**).
-   [/players/list](http://developer.jwplayer.com/jw-platform/reference/v1/methods/players/list.html): retrieves all players from your account (including their **id**).

Demo
----

The script we're going to build in this tutorial mimicks the embed code form in the JW Platform dashboard. You can download this embed-code script as part of the [PHP API Examples ZIP](http://support-static.jwplayer.com/API/php-api-examples-20151013.zip).

First, as with any script, we include and initialize the API. Replace the *xxxx* and *yyyy* part with your account **key** and **secret**, which can be copy/pasted from the account page of the CMS.

    require_once('botr/api.php');
    $botr_api = new BotrAPI('xxxx','yyyyyyyy');

Second, we'll do the API calls to retrieve both the videos and players. Note that the [/videos/list](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/list.html) API call has options for filtering. The [/players/list](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/list.html) call is very bare bone.

    $response1 = $botr_api->call("/videos/list");
    $response2 = $botr_api->call("/players/list");

Last, we construct the embed code. If any $\_GET data is available (in other words: if the form has been submitted already), we use that player/video to build the code. If not, we use the first video and first player from the API call:

    $video = (isset($_POST['video'])) ? $_POST['video']: $response1['videos'][0]['key'];
    $player = (isset($_POST['player'])) ? $_POST['player']: $response2['players'][0]['id'];
    $script = 'http://content.jwplatform.com/players/'.$video.'-'.$player.'.js';

Once again note the full embed-code script can be downloaded as part of the [PHP API Examples ZIP](http://support-static.jwplayer.com/API/php-api-examples.zip).

Next Steps
----------

There is a variety of ways in which this script can be extended. The most useful is likely to construct the link to a [simple preview page](http://developer.jwplayer.com/jw-platform/reference/v1/urls/previews.html). That can be done with the same variables.

As always, if you have questions or additional code you want to share, please [see our community questions](/customer/portal/topics/635789-platform-api/questions).