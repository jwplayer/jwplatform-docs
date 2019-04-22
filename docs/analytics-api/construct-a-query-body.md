# Construct a query body

<sup>Last Updated: April 22, 2019</sup>

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
| `dimensions` | Array | <List of <a href="../metrics-and-dimensions/#metrics" target="_blank">dimensions</a> to include in the query response |
| `end_date` | String | Last date of a query date range in `YYYY-MM-DD` format |
| `filter` | Object | Defines how to restrict the data returned in the report query response| 
| `include_metadata` | Number | |
| `metrics` | Object | <a href="../metrics-and-dimensions/#metrics" target="_blank">metrics</a>|
| `page` | Number | |
| `page_length` | Number | Number of records displayed on each page of results |
| `sort` | Object | Defines the field by which to sort the data and the order of the sort |
| `start_date` | String | First date of a query date range in `YYYY-MM-DD` format |

<br/>

### filter

<br/>

### metrics

| Property | Type | Description |
| -- | -- | -- |
| `field` | String | The `metric_id` of the metric to return in the report query response<br/><br/>Review <a href="../metrics-and-dimensions#metrics" target="_blank">Metrics and dimensions</a> to see all the possible values for `metric_id`|
| `operator` | String | Type of calculation to perform on the `metric_id` field<br/><br/>Possible values include:<br/><br/>`max`<br/><br/>`min`<br/><br/>`sum` |

<br/>

### sort

| Property | Type | Description |
| -- | -- | -- |
| `field` | String | Name of the field by which to sort the response|
| `order` | String | Order in which data response is sorted<br/><br/>Possible values include:<br/><br/>`ASCENDING`<br/>`DESCENDING`|

<br/>