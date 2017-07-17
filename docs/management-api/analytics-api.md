# Analytics

The JW Player Analytics API allows you to access your Video and Advertising data programmatically.  This way, JW Player users are able to pull JW Player data into their own application, data warehouse, or analytics tools.  If you're looking for reports and visualizations to analyze your data, you can use the JW Player Dashboard.

## Getting Started

### Obtaining your Site API Key & Secret

Each request to the Analytics API is for a specific JW Player site (or property) within your account.  To query data for one of your JW Player sites, you will need to obtain your site API key.

You can find each property’s API Key in the JW Player Dashboard by navigating to Account > API Credentials and clicking "Show Credentials" for the relevant site.

[image]

## API Rules

* Data Start Date - 2017-01-01
* Data Timeliness - Updated  every ~30 minutes during peak traffic
* Rate Limiting - 60 requests/minute per API Token or IP
* Max number of dimensions - 1
* Max number of metrics - 5
* Max page size - 100 rows per page maximum
* Max # of filters - 10 filter values (for 1 dimension)

## Metrics, Dimensions, and Filters

### Metrics

A metric is a quantitative measurement.  Click here to learn more about how each metric is defined.  The following metrics are currently supported for all JW Player customers:

Metric | Units
------------ | -------------
embeds | integer
plays | integer
completes | integer
time_watched | integer
ad_impressions | integer
25_percent_completes | integer
50_percent_completes | integer
75_percent_completees | integer

### Dimensions

A dimension is an attribute of your metric(s).  For example, each Play event has several attributes that help describe it.  We determine what Country it took place in, what Video it was for, what device was used, etc.  Selecting a dimension will tell us how the metrics grouped in your response.  The following dimensions are currently supported for all JW Player customers:

Dimension | Identifier
------------ | -------------
media | media_id
device | custom
country_code | ISO 3166-1
playlist | playlist_id
platform | platform_id
player | player_id
ad_schedule | ad_schedule_id
domain | page_domain

### Filters (optional)

A filter is a query element that you can apply to focus on a specific segment of your data.  You can choose to pass a dimension, and operator (equals, does not equal), and a value.

Filter Example 1:
Let's say you want to retrieve Time Watched per Video, for a specific country (United States).  You would specify Time Watched as your metric, Video as your dimension, and you would apply a filter country=US

Filter Example 2:


## Enterprise Functionality

!!!important
The following advanced metrics and dimensions are available only to enterprise JW Player customers with Advanced Analytics.  
For each request, the date range must be within the last 90 days.
!!!

In addition to the functionality described in the rest of this doc, Enterprise customers are also able to:

* Group by 2 dimensions
* Apply up to 10 filters
* Utilize the following dimensions and metrics

Dimension | Identifier
------------ | -------------
region | region
city | city
page_url | page_url
tags | tags
video_duration | video_duration

Metric | Unit
------------ | -------------
ad_clicks | integer
ad_skips | integer
ad_completes | integer
unique_viewers | integer
ads_per_viewer | total / viewer
plays_per_viewer | total / viewer
time_watched_per_viewer | seconds / viewer
complete_rate | percent


Enterprise customers also have the option to enrich their response with additional metadata (instead of just IDs).  This is available for the dimensions listed below, and can be enabled by adding `"include_metadata": "1"` to the request

Dimension | Metadata | Metadata description | Response block
------------ | -------------
media | title, tags | media title and tags | includes
device | name | device ids to names | meta
country_code | name | country codes(ISO 3166-1) to names | meta
playlist | title, type | playlist title and type | includes
platform | name | platform ids to names | meta
player | name | player ids to names | includes
ad_schedule | name | ad schedule id to names | includes
region | name | regions ids to names | meta
city | name | 	city ids to names | meta

If you'd like to speak with a JW Player representative about upgrading your account, please click here.

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

### Response Format

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

### Overall response format:
				{
					meta (MetaFields),
					includes (array, optional)
				}


## Examples
Route:

				curl -X POST https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/ \
				 -H 'Authorization: {site token secret}' \
				 -H 'Content-Type: application/json' \
				 -d '{"start_date" : "2017-01-01", "end_date" : "2017-02-01", "dimensions" : ["media_id"], "metrics" : [{"operation" : "sum", "field" : "plays"}],  "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'


Example: 

				POST: https://api.jwplayer.com/v2/sites/{stie api key}/analytics/queries/?page%5Boffset%5D=0&page%5Blimit%5D=2 \
				-H 'Authorization: {site token secret}' \
				-d
				{
				"start_date": "2017-02-01",
				"end_date": "2017-03-01",
				"dimensions": ["country_code"],
				"metrics": [{
				   "operation": "sum",
				   "field": "plays"
				     }
				     ], 
				"sort": [{ 
				   "field": "plays",
				   "order": "DESCENDING"
				   }]
				}


!!!
page[offset] and page[limit] query params can be used for paginating through results. [ and ] characters must be encoded as %5B and %5D respectively.
!!!

Response:

				{
				"meta": {
				  “row_offset”: 0,
				    “rows”: [
				      [ "US", 115184266],
				      [ "GB", 17718306],
				      [...]
				        ],
				  "column_headers": {
				    "dimensions": [ { "field": "country_code", "type": "string" } ],
				    "metrics": [ { "field": "plays", "units": "integer" } ]
				      },
				   "name": {
				      "country_code": {
				        "GB": "United Kingdom",
				        "US": "United States of America"
				         ...
				      }
				    }
				}




Example: 

				POST: https://api.jwplayer.com/v2/sites/{site api key}/analytics/queries/?page%5Boffset%5D=0&page%5Blimit%5D=2 \
				-H 'Authorization: {site token secret}' \
				-d
				{
				"start_date": "2017-02-01",
				"end_date": "2017-03-01",
				"dimensions": ["media_id"],
				"metrics": [{
				   "operation": "sum",
				   "field": "embeds"
				     },
				     {
				   "operation": "sum",
				   "field": "plays"
				     }
				     ], 
				"sort": [{ 
				   "field": "embeds",
				   "order": "DESCENDING"
				    }]
				}


Note: page[offset] and page[limit] query params can be used for paginating through results. [ and ] characters must be encoded as %5B and %5D respectively.


Response:

				{
				"meta": {
				  “row_offset”: 0,
				    “rows”: [
				      [ "xyz123", 115184266, 345675 ],
				      [ "zyx123", 17718306, 434356 ],
				      [...]
				        ],
				  "column_headers": {
				    "dimensions": [ { "field": "media_id", "type": "string" } ],
				    "metrics": [ { "field": "embeds", "units": "integer" }, {"field": "plays", "units": "integer""} ]
				      }
				    }, 
				   "includes": [ 
				    {
				      "attributes": {
				        "metadata": {
				          "title": "Title of my video 1",
				          "tags": ["pets", "cats"]
				        }
				      },
				      "type": "media_id",
				      "id": "xyz123"
				    },
				    {
				      "attributes": {
				        "metadata": {
				          "title": "Title of my video 2",
				          "tags": [
				            "divine"
				          ]
				        }
				      },
				      "type": "media_id",
				      "id": "zyx123"
				    }
				            ]
				}





Example: 

				POST: https://api.jwplayer.com/v2/properties/{site api key}/analytics//?page%5Boffset%5D=0&page%5Blimit%5D=2 \
				-H 'Authorization: {site token secret}' \
				-d
				{
				"start_date": "2017-02-01",
				"end_date": "2017-03-01",
				"dimensions": ["device_id"],
				"metrics": [{
				   "operation": "sum",
				   "field": "embeds"
				     }], 
				   "filter": [{
				     "field": "country_code",
				       "operator": "=",
				       "value": ["US","CA"]
				    }],
				    "sort": [{ 
				      "field": "embeds",
				      "order": "DESCENDING"
				    }]
				}


Note: 


Response:

				{
				"meta": {
				  “row_offset”: 0,
				    “rows”: [
				      [ "xyz123", 115184266 ],
				      [ "zyx123", 17718306 ],
				      [...]
				        ],
				  "column_headers": {
				    "dimensions": [ { "field": "device_id", "type": "string" } ],
				    "metrics": [ { "field": "embeds", "units": "integer" } ]
				      }
				    },
				  "name": {
				    "device_id" {
				      "xyz123" : "DeviceType123",
				      "zyx123" : "DeviceTypexyz"
				      ...
				      }
				    }
				}




