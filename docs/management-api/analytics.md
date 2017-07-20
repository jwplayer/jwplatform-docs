# Analytics

The JW Player Analytics endpoint allows you to access your Video and Advertising data programmatically.  This way, JW Player users are able to pull JW Player data into their own application, data warehouse, or analytics tools.  If you're looking for reports and visualizations to analyze your data, you can use the JW Player Dashboard.

## Getting Started

[**Skip to API Examples**](#examples)

### Obtaining your Site API Key & Secret

Each request to the Analytics API is for a specific JW Player site (or property) within your account.  To query data for one of your JW Player sites, you will need to obtain your site API key.

You can find each property’s API Key in the JW Player Dashboard by navigating to Account > API Credentials and clicking "Show Credentials" for the relevant site.

To find your secret, you'll find JW Reporting API Credentials at the bottom of the api credentials page.  You may need to first create a Private API key here if you have not already.

!!!warning
The property api secret will not work for this endpoint - you must use the secret specific to the Reporting API
!!!

## API Rules

The following rules apply to all JW Player users.  Users with access to our Enterprise platform have additional functionality described [**here**](#enterprise-functionality).

* **Data Start Date** - 2017-01-01
* **Data Timeliness** - Updated  every ~30 minutes during peak traffic
* **Rate Limiting** - 60 requests/minute per API Token or IP
* **Max number of dimensions** - 1
* **Max number of metrics** - 5
* **Max page size** - 100 rows per page maximum
* **Max # of filters** - 1 filter value (for 1 dimension)

## Metrics, Dimensions, and Filters

### Metrics

A metric is a quantitative measurement.  Visit our [support doc](https://support.jwplayer.com/customer/portal/articles/2142460-using-jw-player-analytics) to learn more about how each metric is defined.  The following metrics are currently supported for all JW Player customers:

Metric Name | metric_id | Units
------------ | ------------ | -------------
Embeds | embeds | integer
Plays | plays | integer
Completes | completes | integer
Time Watched | time_watched | integer
Ad Impressions | ad_impressions | integer
25% Completes | 25_percent_completes | integer
50% Completes | 50_percent_completes | integer
75% Completes | 75_percent_completees | integer

### Dimensions

A dimension is an attribute of your metric(s).  For example, each Play event has several attributes that help describe it.  We determine what Country it took place in, what Video it was for, what device was used, etc.  Selecting a dimension will tell us how the metrics grouped in your response.  The following dimensions are currently supported for all JW Player customers:

Dimension | dimension_id | Format
------------ | ------------- | -------------
Date | date | 'yyyy-mm-dd'
Media | media_id | media_id
Device | device_id | custom - string
Country | country_code | ISO 3166-1
Playlist | playlist_id | playlist_id
Platform | platform_id | custom - string
player | player_id | player_id
Ad Schedule | ad_schedule_id | ad_schedule_id 
Page Domain | page_domain | N/A

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

Dimension | dimension_id | Format
------------ | ------------- | -------------
Region | region | custom - string
City | city | custom - string
Page URL | page_url | N/A
Media Tags | tags | N/A
Video Duration | video_duration | custom - string

Metric Name | metric_id | Unit
------------ | ------------ | -------------
Ad Clicks | ad_clicks | integer
Ad Skips | ad_skips | integer
Ad Completes | ad_completes | integer
Unique Viewers | unique_viewers | integer
Ad Impressions per Viewer | ads_per_viewer | total / viewer
Plays per Viewer | plays_per_viewer | total / viewer
Time watched per viewer | time_watched_per_viewer | seconds / viewer
Complete Rate | complete_rate | percent


Enterprise customers also have the option to enrich their response with additional metadata (instead of just obtaining JW Platform IDs).  This is available for the dimensions listed below, and can be enabled by adding `"include_metadata": "1"` to the request

dimension_id | Metadata | Metadata description | Response block
------------ | -------------
media_id | title, tags | media title and tags | includes
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

Route: `https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/`

Body:
```json
	{
		sort (array, optional, only available for metrics),
		filter (array, optional, only available for dimensions),
		dimensions (array[string]),
		end_date (string),
		metrics (array),
		page[offset] (integer),
		page[limit] (integer),
		start_date (string)
	}
```
### Overall response format:
```json
	{
		meta (MetaFields),
		includes (array, optional)
	}
```

### MetaFields format
```json
	MetaFields {
		row_offset (integer, optional),
		rows (array, optional),
		column_headers (ColumnHeaders, optional)
	}
	ColumnHeaders {
		metrics (array[ColumnHeadersMetrics], optional),
		dimensions (array[ColumnHeadersDimensions], optional)
	}
	ColumnHeadersMetrics {
		units (string, optional),
		field (string, optional)
	}
	ColumnHeadersDimensions {
		field (string, optional),
		type (string, optional)
	}
```

## Examples

###Example 1 (Curl) request:

**Summary:** Total Plays for each media id for a given date range

```curl
curl -X POST https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/ \
 -H 'Authorization: {site token secret}' \
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

**Summary:** Total Embeds for each country code for a given date range (for the top two countries)

```json
POST: https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/?page%5Boffset%5D=0&page%5Blimit%5D=2 \
-H 'Authorization: {site token secret}' \
-d {
	"start_date": "2017-06-01",
	"end_date": "2017-06-02",
	"dimensions": ["country_code"],
	"metrics": [{
		"operation": "sum",
		"field": "plays"
	}],
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

!!!
page[offset] and page[limit] query params can be used for paginating through results. [ and ] characters must be encoded as %5B and %5D respectively.
!!!


###Example 3 (Post) Request: 

**Summary:** Total Plays and Embeds by device, for a given date range (title and tag metadata included)

```json
POST: https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/?page%5Boffset%5D=0&page%5Blimit%5D=2 \
-H 'Authorization: {site token secret}' \
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
			"tags": ["background", "homepage", "jwplayer", "timelapse"],
			"title": "Brooklyn Bridge Time Lapse"
		}
	}, {
		"type": "media_id",
		"EUijQ1Ay": {
			"tags": ["background", "homepage"],
			"title": "Jellyfish"
		}
	}, {
		"type": "media_id",
		"oSRD4xzP": {
			"tags": ["background", "homepage", "smoke"],
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

