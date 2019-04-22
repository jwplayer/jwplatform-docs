# Run a report

<sup>Last Updated: April 18, 2019</sup>

The Analytics API allows you to query your data through a single route.

```
https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/
```

When you query this route, your request must include the following items:

- Property key
- Reporting secret
- JSON-formatted query body

!!!tip
You can also use a [query tool](../run-a-report-with-tools) to run a report or run a report query with [Custom Reports](https://support.jwplayer.com/articles/how-to-use-custom-reports) from your JW Player dashboard.
!!!

<br/>

## Construct a query body

The query body enables you to filter the data that is returned by the Reporting API. Use the following body format and property table to contruct your query body.

```json
{
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

| Property | Type | Description |
| -- | -- | -- |
| `dimensions` | Array | <p>List of <a href="../metrics-and-dimensions/#metrics" target="_blank">dimensions</a> to include in the query response</p> |
| `end_date` | String | <p>Last date of a query date range in `YYYY-MM-DD` format</p> |
| `filter` | Object | <p>Defines how to restrict the data returned in the report query response</p>| 
| `include_metadata` | Number | |
| `metrics` | Object | <p><a href="../metrics-and-dimensions/#metrics" target="_blank">metrics</a></p>|
| `page` | Number | |
| `page_length` | Number | <p>Number of records displayed on each page of results</p> |
| `sort` | Object | <p>Defines the field by which to sort the data and the order of the sort</p> |
| `start_date` | String | <p>First date of a query date range in `YYYY-MM-DD` format</p> |

<br/>

### filter

<br/>

### metrics

| Property | Type | Description |
| -- | -- | -- |
| `field` | String | The `metric_id` of the metric to return in the report query response<br/><br/>Review <a href="../metrics-and-dimensions#metrics" target="_blank">Metrics and dimensions</a> to see all the possible values for `metric_id`|
| `operator` | String | Type of calculation to perform on the `metric_id` field<br/><br/>Possible values include:<br/><br/><code>max</code><br/><code>min</code><br/><code>sum</code> |

<br/>

### sort

| Property | Type | Description |
| -- | -- | -- |
| `field` | String | <p>Name of the field by which to sort the response<p>|
| `order` | String | <p>Order in which data response is sorted<br/><br/>Possible values include:<br/><br/><code>ASCENDING</code><br/><code>DESCENDING</code></p>|

<br/>

## Run a report query

1. Replace the `{property key}` with your key.
2. Add the `{reporting secret}` with your secret.
3. Append the query body.

```curl
curl -X POST https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/ \
 -H 'Authorization: {reporting secret}' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```
<br/>

<hr>

## Sample report queries

### Example 1: Total Plays for media IDs in a defined time frame


**Objective**: For a property (key: 1A23bCD4), list the total number of plays for each video within the date range of June 1, 2017 - June 2, 2017. The list should be sorted by the number of plays, in descending order.

**Query**: You can make the following cURL request. 
```
curl -X POST https://api.jwplayer.com/v2/sites/1A23bCD4/analytics/queries/ \
 -H 'Authorization: YJD8uGbFTCwQgjT4GorWInV1V0VGRqQzz6tORVp6UjJoTFVXWjRielk1YlVkMWNUWnIn' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```
<br/>

### Example 2: Total Plays for media IDs in a defined time frame


**Objective**: For a property (key: 1A23bCD4), list the total number of plays for each video within the date range of June 1, 2017 - June 2, 2017. The list should be sorted by the number of plays, in descending order.

**Query**: You can make the following cURL request. 
```
curl -X POST https://api.jwplayer.com/v2/sites/1A23bCD4/analytics/queries/ \
 -H 'Authorization: YJD8uGbFTCwQgjT4GorWInV1V0VGRqQzz6tORVp6UjJoTFVXWjRielk1YlVkMWNUWnIn' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```