Uploading Videos
================

Using the Platform API, you can allow your users to upload videos to your account directly from your website. This is a useful if you have your own CMS and wish to enable your users to upload videos, or if you wish to allow for user generated content for e.g. a competition.

To ensure fair access for all, usage of api.jwplatform.com is limited to **10 calls per minute**. We reserve the right to block API access to accounts that exceed this rate. If you need a higher API rate, please contact [sales@jwplayer.com](mailto:sales@jwplayer.com). Note that calls to content.jwplatform.com do not count towards the API rate limit.

This document applies to **JW Platform** hosting and streaming. Every account comes with some hosting and streaming included :-)

Introduction
------------

A video upload to JW Platform consists of a few steps. These are described in detail in the [API documentation](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/create.html). Here's a high-level overview:

-   First, the client does a [/videos/create](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/create.html) API call. This call sets up our server to receive the video. The server returns an object with upload data.
-   Second, the client uses the returned object to construct an upload URL. The video file will be uploaded to this URL.
-   Third, the client POSTs/PUTs the video to the upload URL. 
-   Fourth, after the upload has completed the video will go into a processing state while JW Platform creates streaming optimized transcodes of the source file. Once some streaming transcodes are finished, the video's state will automatically transition to ready and the video can be served.

Setting Up
----------

It is quite straightforward to implement this on your own web server. For this example you will need a server with a fairly up to date version of PHP and CURL installed. Then download the [PHP API Examples](http://support-static.jwplayer.com/API/php-api-examples-20151013.zip) zip file.

The upload folder has a self-contained demo. All you need to edit is the botr/init\_api.php file and enter your account key and secret. Your account key and secret can be found in the settings tab of your account (on the right-hand site of the page).

This example uses quite a few fairly advanced JavaScript tricks; it detects whether browsers support resumable uploads before performing a /videos/create call, and if resumable uploads are supported it sends over the video in smaller chunks. We recommend that you adopt this example verbatim unless you're comfortable reading and adapting the source code of this example.

Please note that this example allows anyone to upload a video, so we recommend that you only allow registered/authorized users in your CMS access the upload page in order to prevent abuse.

The [/videos/create call](http://developer.jwplayer.com/jw-platform/reference/v1/methods/videos/create.html), [cloud accelerated uploads](https://developer.jwplayer.com/jw-platform/reference/v1/s3_uploads.html) (recommended), [basic file uploads](http://developer.jwplayer.com/jw-platform/reference/v1/uploads.html) and [resumable uploads](http://developer.jwplayer.com/jw-platform/reference/v1/resumable_uploads.html) documentation pages contain in-depth technical documentation on how to perform file uploads to JW Platform.
