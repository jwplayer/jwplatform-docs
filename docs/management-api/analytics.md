# Analytics

<sup>Last Updated: February 13, 2019</sup>

The JW Player Analytics endpoint allows you to access your Video and Advertising data programmatically.  This way, JW Player users are able to pull JW Player data into their own application, data warehouse, or analytics tools.  If you're looking for reports and visualizations to analyze your data, you can use the JW Player Dashboard.

## Getting Started

Check out the [Github Repository](https://github.com/jwplayer/jwdeveloper-platformdemos/tree/master/analytics-api-samples) for Analytics API examples in PHP and Python.

To make Analytics Queries within an Active Google Sheet, make a copy of this [Sheet](https://docs.google.com/spreadsheets/d/1eCeaeolhxn66mX2bmGChgoeDUi-lttru8WPNENvCwoE/edit?usp=sharing).  To see the API in action within the Sheet, click 'Tools | Script Editor'.

[**Skip to API Examples**](#examples)

### Obtaining your Property Key & Reporting API Secret

Each request to the Analytics API is for a specific JW Player property (or site) within your account.  To query data for one of your JW Player properties, you will need to obtain your property key.

You can find each property’s key in your JW Player dashboard by navigating to **Account > API Credentials** and clicking **Show Credentials** for the relevant property.

To find your reporting secret, you'll find **JW Reporting API Credentials** at the bottom of the API credentials page.  You may need to first create a Private API key here if you have not already.

!!!warning
The property API secret will not work for this endpoint - you must use the secret specific to the Reporting API.
!!!

## API Rules

The following rules apply to all JW Player users.  Users with access to our Enterprise platform have additional functionality described [**here**](#enterprise-functionality).

* **Data Start Date** - 2017-01-01
* **Data Timeliness** - Updated  every ~30 minutes during peak traffic
* **Rate Limiting** - 60 requests/minute per API Token or IP
* **Max number of dimensions** - 1
* **Max number of metrics** - 5
* **Max page length** - 100 rows per page maximum
* **Max # of filters** - 1 filter (for 1 dimension)
* **All dates are Eastern**

## Metrics, Dimensions, and Filters

### Metrics

A metric is a quantitative measurement.  Visit our [support doc](https://support.jwplayer.com/customer/portal/articles/2142460-using-jw-player-analytics) to learn more about how each metric is defined.  The following metrics are currently supported for all JW Player customers:

<table>
	<tr>
		<th style="width:33%">Metric Name</th>
		<th style="width:33%">metric_id</th>
		<th style="width:33%">Units</th>
	</tr>
	<tr>
		<td>Embeds</td>
		<td>embeds</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Plays</td>
		<td>plays</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Completes</td>
		<td>completes</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Time Watched</td>
		<td>time_watched</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Ad Impressions</td>
		<td>ad_impressions</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>25% Completes</td>
		<td>25_percent_completes</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>50% Completes</td>
		<td>50_percent_completes</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>75% Completes</td>
		<td>75_percent_completes</td>
		<td>integer</td>
	</tr>
</table>


### Dimensions

A dimension is an attribute of your metric(s).  For example, each Play event has several attributes that help describe it.  We determine what Country it took place in, what Video it was for, what device was used, etc.  Selecting a dimension will tell us how the metrics grouped in your response.  The following dimensions are currently supported for all JW Player customers:

<table>
	<tr>
		<th style="width:33%">Dimension</th>
		<th style="width:33%">dimension_id</th>
		<th style="width:33%">Format</th>
	</tr>
	<tr>
		<td>Eastern Date</td>
		<td>eastern_date</td>
		<td>'yyyy-mm-dd'</td>
	</tr>
	<tr>
		<td>Media</td>
		<td>media_id</td>
		<td>media_id</td>
	</tr>
	<tr>
		<td>Device</td>
		<td>device_id</td>
		<td>custom - string</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>country_code</td>
		<td>ISO 3166-1</td>
	</tr>
	<tr>
		<td>Playlist</td>
		<td>playlist_id</td>
		<td>playlist_id</td>
	</tr>
	<tr>
		<td>Platform</td>
		<td>platform_id</td>
		<td>custom - string</td>
	</tr>
	<tr>
		<td>Player</td>
		<td>player_id</td>
		<td>player_id</td>
	</tr>
	<tr>
		<td>Ad Schedule</td>
		<td>ad_schedule_id</td>
		<td>ad_schedule_id</td>
	</tr>
	<tr>
		<td>Page Domain</td>
		<td>page_domain</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>Browser</td>
		<td>browser</td>
		<td>custom - string</td>
	</tr>
</table>


### Filters (optional)

A filter is a query element that you can apply to focus on a specific segment of your data.  You can choose to pass a dimension, and operator (equals, does not equal), and a value.

## Enterprise Functionality

!!!important
The following advanced metrics and dimensions are available only to enterprise JW Player customers with Advanced Analytics.  
For each request, the date range must be within the last 90 days.
If you'd like to speak with a JW Player representative about upgrading your account, please [Contact Us](https://www.jwplayer.com/contact-us/?utm_source=developer&utm_medium=CTA&utm_campaign=platform-docs)
!!!

In addition to the functionality described in the rest of this doc, Enterprise customers are also able to:

* **Group by 2 dimensions**
* **Apply up to 10 filters**
* **Use the following dimensions and metrics**

### Dimensions

<table>
	<tr>
		<th style="width:33%">Dimension</th>
		<th style="width:33%">dimension_id</th>
		<th style="width:33%">Format</th>
	</tr>
	<tr>
		<td>Region</td>
		<td>region</td>
		<td>custom - string</td>
	</tr>
	<tr>
		<td>City</td>
		<td>city</td>
		<td>custom - string</td>
	</tr>
	<tr>
		<td>Page URL</td>
		<td>page_url</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>Media Tags</td>
		<td>tag</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>Video Duration</td>
		<td>video_duration</td>
		<td>custom - string</td>
	</tr>
	<tr>
		<td>Play Reason</td>
		<td>play_reason</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Is First Play</td>
		<td>is_first_play</td>
		<td>boolean - string</td>
	</tr>
</table>

### Metrics

<table>
	<tr>
		<th style="width:33%">Metric</th>
		<th style="width:33%">metric_id</th>
		<th style="width:33%">Unit</th>
	</tr>
	<tr>
		<td>Ad Clicks</td>
		<td>ad_clicks</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Ad Skips</td>
		<td>ad_skips</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Ad Completes</td>
		<td>ad_completes</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Unique Viewers</td>
		<td>unique_viewers</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Ad Impressions per Viewer</td>
		<td>ads_per_viewer</td>
		<td>total / viewer</td>
	</tr>
	<tr>
		<td>Plays per Viewer</td>
		<td>plays_per_viewer</td>
		<td>total / viewer</td>
	</tr>
	<tr>
		<td>Time watched per viewer</td>
		<td>time_watched_per_viewer</td>
		<td>seconds / viewer</td>
	</tr>
	<tr>
		<td>Complete Rate</td>
		<td>complete_rate</td>
		<td>percent</td>
	</tr>
</table>


Enterprise customers also have the option to enrich their response with additional metadata (instead of just obtaining JW Platform IDs).  This is available for the dimensions listed below, and can be enabled by adding `"include_metadata": "1"` to the request.

dimension_id | Metadata | Metadata description | Response block
------------ | ------------- | ------------- | -------------
media_id | title, tag | media title and tags | includes
device_id | name | device ids to names | meta
country_code | name | country codes(ISO 3166-1) to names | meta
playlist_id | title, type | playlist title and type | includes
platform_id | name | platform ids to names | meta
player_id | name | player ids to names | includes
ad_schedule_id | name | ad schedule id to names | includes
region | name | regions ids to names | meta
city | name | 	city ids to names | meta


## API Structure

### Request Format

Route: `https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/`

Body:
```json
	{
	"start_date": "yyyy-mm-dd",
	"end_date": "yyyy-mm-dd",
	"dimensions": ["dimension_id"],
	"metrics": [{
		"operation": "=/!=",
		"field": "metric_id"
	}],
	"filter": [{
		"field": "dimension_id",
		"operator": "operation",
		"value": ["dimension_value"]
	}],
	"page": "page index",
	"page_length": "page length",
	"sort": [{
		"field": "metric_id",
		"order": "ASCENDING/DESCENDING"
	}]
	}
```
### Response format:
```json
	{
		"data": {
			"rows": [
				[
					"column1value",
					"column2value",
					...
				],
				...
			]
		},
		"metadata": {
			"column_headers": {
				"dimensions": [
					{
						"field": "dimension_id",
						"type": "datatype"
					},
					...
				]
				"metrics": [
					{
						"field": "plays",
						"units": "dataype"
					},
					...
				]
			}
		},
		"page": "page number",
		"page_length": "page length",
		"type": "query_results",
		"includes": {
			"object_id": {
				"metadata varies"
			}
		}
	}
```

## Examples

The following examples show how to use the API using [cURL](https://en.wikipedia.org/wiki/CURL) and a terminal console.

Check out the [Github Repository](https://github.com/jwplayer/jwdeveloper-platformdemos/tree/master/analytics-api-samples) for Analytics API examples in PHP and Python.

###Example 1 (Curl) request:

**Summary:** Total Plays for each media id for a given date range.

```curl
curl -X POST https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/ \
 -H 'Authorization: {reporting secret}' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```

###Example 1 (Curl) response:

```json
{
	"page": 0,
	"page_length": 10,
	"data": {
		"rows": [
			["EUijQ1Ay", 38009],
			["oSRD4xzP", 27287],
			["iD7vAER7", 27189]
		]
	},
	"type": "query_results",
	"metadata": {
		"column_headers": {
			"dimensions": [{
				"type": "string",
				"field": "media_id"
			}],
			"metrics": [{
				"field": "plays",
				"units": "integer"
			}]
		}
	}
}
```

###Example 2 (Post) request:

**Summary:** Embeds for each country code for a given date range (for the top two countries).  Filter: only for Desktop.

```json
POST: https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/ \
-H 'Authorization: {reporting secret}' \
-d {
	"start_date": "2017-06-01",
	"end_date": "2017-06-02",
	"dimensions": ["country_code"],
	"metrics": [{
		"operation": "sum",
		"field": "plays"
	}],
	"filter": [{
		"field": "device_id",
		"operator": "=",
		"value": ["Desktop"]
	}],
	"page": 0,
	"page_length": 2,
	"sort": [{
		"field": "plays",
		"order": "DESCENDING"
	}]
}
```

###Example 2 (Post) response:

```json
{
	"type": "query_results",
	"page": 0,
	"metadata": {
		"column_headers": {
			"dimensions": [{
				"type": "string",
				"field": "country_code"
			}, {
				"type": "string",
				"field": "device_id"
			}],
			"metrics": [{
				"units": "integer",
				"field": "plays"
			}]
		}
	},
	"page_length": 2,
	"data": {
		"rows": [
			["US", "Desktop", 37473],
			["GB", "Desktop", 5368]
		]
	}
}
```


###Example 3 (Post) Request:

**Summary:** Total Plays and Embeds by device, for a given date range (title and tag metadata included)

```json
POST: https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/ \
-H 'Authorization: {reporting secret}' \
-d
{
	"start_date": "2017-02-01",
	"end_date": "2017-03-01",
	"dimensions": ["media_id"],
	"include_metadata": 1,
	"metrics": [{
		"operation": "sum",
		"field": "embeds"
	}, {
		"operation": "sum",
		"field": "plays"
	}],
	"sort": [{
		"field": "embeds",
		"order": "DESCENDING"
	}]
}
```

###Example 3 (Post) Response:

```json
{
	"type": "query_results",
	"page": 0,
	"includes": [{
		"type": "media_id",
		"iD7vAER7": {
			"tag": ["background", "homepage", "jwplayer", "timelapse"],
			"title": "Brooklyn Bridge Time Lapse"
		}
	}, {
		"type": "media_id",
		"EUijQ1Ay": {
			"tag": ["background", "homepage"],
			"title": "Jellyfish"
		}
	}, {
		"type": "media_id",
		"oSRD4xzP": {
			"tag": ["background", "homepage", "smoke"],
			"title": "Whiskey Smoke"
		}
	}],
	"data": {
		"rows": [
			["EUijQ1Ay", 60053, 526600],
			["oSRD4xzP", 53571, 401269],
			["iD7vAER7", 52965, 401748]
		]
	},
	"page_length": 10,
	"metadata": {
		"column_headers": {
			"dimensions": [{
				"type": "string",
				"field": "media_id"
			}],
			"metrics": [{
				"units": "integer",
				"field": "embeds"
			}, {
				"units": "integer",
				"field": "plays"
			}]
		}
	}
}
```


<br/><br/>
<div id="wufoo-mff60sc1xnn4cu">
Use this <a href="https://jwplayerdocs.wufoo.com/forms/mff60sc1xnn4cu">form</a> to provide your feedback.
</div>
<script type="text/javascript">var mff60sc1xnn4cu;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'jwplayerdocs',
'formHash':'mff60sc1xnn4cu',
'autoResize':true,
'height':'288',
'async':true,
'host':'wufoo.com',
'header':'show',
'ssl':true,
'defaultValues': 'field118=' + location.pathname};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { mff60sc1xnn4cu = new WufooForm();mff60sc1xnn4cu.initialize(options);mff60sc1xnn4cu.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>