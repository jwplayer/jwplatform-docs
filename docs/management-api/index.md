# Managing Your Library with the JW Platform Management API

The JW Platform Management API at api.jwplatform.com provides a set of classes for managing all aspects of your library. The JW Platform Management API features a straightforward authentication mechanism and multiple output formats (PHP, JSON, XML, Python). This reference describes in detail how our API works and which classes and assets are available. The sections below provide details on how asset management API calls are structured and mechanisms for uploading content to the platform.

!!!warning
To ensure fair access for all, usage of the JW Platform Management API (api.jwplatform.com) is limited to **60 calls per minute**. Calls that exceed this rate will result in a 429 Rate Limit Exceeded error and will not be executed. If you need a higher API rate, please [contact us](https://www.jwplayer.com/contact-us/?utm_source=developer&utm_medium=CTA&utm_campaign=platform-docs) to get your account upgraded. Note that calls to the Delivery API (cdn.jwplayer.com) do not count towards the API rate limit.
!!!

## JW Player Provided API Kits and Tools

* **Python:** [Python API Client and Examples](https://github.com/jwplayer/jwplatform-py)
* **PHP:** [PHP API Kit](http://support-static.jwplayer.com/API/php-api-kit-20151013.zip>), [PHP API Examples](https://support-static.jwplayer.com/API/php-api-examples-20151013.zip)
* **WordPress:** We provide a fully functional JW Platform [WordPress Plugin](http://wordpress.org/plugins/jw-player/), which is capable of uploading, searching and publishing videos within the WordPress admin.

## Community Maintained Tools

If you maintain a JW Platform integration tool, please email devrelations@jwplayer.com to let us know!

* **Command Line:** The [Clack Command Line Interface](https://github.com/rmnl/clack) is an easy way to make one off API calls on the JW Platform API.
* **Ruby:** The [jwplayer-api-client Ruby gem](https://rubygems.org/gems/jwplayer-api-client) integrates with the platform API and can perform URL Token signing on the content service. ([source code](https://github.com/raphi/jwplayer-api-client))