# Welcome to the JW Platform Developer Guide

The JW Platform Developer guide provides guidance, recommendations and examples for how you can integrate programmatically with JW Platform.

## Getting Started - A Tale of Two APIs
<img align="right" src=images/JWPlatformDiagram.png>

When choosing how to integrate with JW Platform is it important to select the right API for the right objectives.


### Use the distribution API to build your sites and apps

The JW Platform [Delivery API](/delivery-api/index.md) is designed for high scale, high availability, performant read only operations. This API uses a **CDN and short caching** to optimize response time globally. The content service packages your library into easily consumable templates including RSS and JSON feeds, single line player embeds and adaptive bitrate streaming manifests. You can require that requests for your content are signed with expiring tokenized links, but the same request can be made many times.

### Use the management API to integrate with your CMS

The JW Platform [Management API](/management-api/index.md) is a read write API used to programmatically modify your library or connect to your CMS. This API **requires secure signing for each call** and prevents replay of previous requests. The management API is optimized to be immediately consistent rather than capable of high volumes of requests. For this reason, the management API **enforces a rate limit**. When deciding which API to use, consider the volume of calls you will be making and whether or not the application strictly requires immediate consistency.


<h2 align="center" style="color:#FF0046">
Happy Streaming,<BR>
JW Player
</h2>
