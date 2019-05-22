# Analytics API reference

<sup>Last Updated: May 27, 2019</sup>

This Analytics API reference details the structure of the query request body and query response body. Be sure you have your API credentials and understand how to create a report query.

!!!tip
View some examples of report queries. These examples demonstrate both basic and advanced queries that can be run against the Analytics API.
!!!

## Route

```html
https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/
```
### URL parameter

<table>
  <tr>
    <th>Parameter</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">{property key}</td>
    <td style="width:19%">String</td>
    <td><strong>(Required)</strong> Unique property identifier</td>
  </tr>
</table>

## Query body structure

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

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>dimensions</code></td>
    <td style="width:19%">Array</td>
    <td>Dimensions to include in the report query response, listed by dimension_id.</td>
  </tr>
  <tr>
    <td><code>end_date</code></td>
    <td>String</td>
    <td>Last date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
  <tr>
    <td><code>filter</code></td>
    <td>Object</td>
    <td>Defines how to restrict the data returned in the response<br/><br/>See: filter object</td>
  </tr>
  <tr>
    <td><strong>*<code>include_metadata</code></strong></td>
    <td>Boolean</td>
    <td>-</td>
  </tr>
  <tr>
    <td><code>metrics</code></td>
    <td>Array</td>
    <td>Metrics to include in the report query response, listed by `metric_id`.<br/><br/>See: metrics object</td>
  </tr>
  <tr>
    <td><code>page</code></td>
    <td>Number</td>
    <td></td>
  </tr>
  <tr>
    <td><code>page_length</code></td>
    <td>Number</td>
    <td></td>
  </tr>
  <tr>
    <td><code>sort</code></td>
    <td>Object</td>
    <td>Defines the field by which to sort the data and the order of the sort<br/><br/>See: sort object</td>
  </tr>
  <tr>
    <td><code>start_date</code></td>
    <td>String</td>
    <td>First date of a query date range in `YYYY-MM-DD` format</td>
  </tr>
</table>

<sup>* This metric requires a JW Player Enterprise license.</sup>

<br/>

<a name="filter"></a>

### filter

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>field</code></td>
    <td style="width:19%">String</td>
    <td>Dimension (dimension_id) by which to restrict the returned data set<br/><br/>When filtering <strong>JWP Data</strong>, all <code>dimension_id</code> variables can be used.<br/><br/>When filtering <strong>OTT Data</strong>, only the following <code>dimension_id</code> variable can be used:<br/>&nbsp;&nbsp;<code>country_code</code><br/>&nbsp;&nbsp;<code>eastern_date</code><br/>&nbsp;&nbsp;<code>media_id</code><br/>&nbsp;&nbsp;<code>platform_id</code><br/>&nbsp;&nbsp;<code>playlist_id</code><br/>&nbsp;&nbsp;<code>playlist_type</code><br/>&nbsp;&nbsp;<code>tag</code><br/>&nbsp;&nbsp;<code>upload_date</code><br/>&nbsp;&nbsp;<code>video_duration</code></td>
  </tr>
  <tr>
    <td><code>operator</code></td>
    <td>String</td>
    <td>Filter matching behavior<br/><br/>Possible values:<br/>&nbsp;&nbsp;<code>=</code>: Use this operator when the value is an ID.<br/>&nbsp;&nbsp;<code>!=</code>: Use this operator when the value is an ID.<br/>&nbsp;&nbsp;<code>LIKE</code>: (Business, Enterprise only) Use this operator when the value is metadata information.<br/>&nbsp;&nbsp;<code>!LIKE</code>: (Business, Enterprise only) Use this operator when the value is metadata information.</td>
  </tr>
  <tr>
    <td><code>value</code></td>
    <td>String</td>
    <td>Value of a specific <code>dimension_id</code> by which to restrict the returned data set</td>
  </tr>
</table>

<br/>

<a name="metrics"></a>

### metrics

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>field</code></td>
    <td style="width:19%">String</td>
    <td>Metrics to include in the report query response, listed by metric_id.</td>
  </tr>
  <tr>
    <td><code>operation</code></td>
    <td>String</td>
    <td>Possible values:<br/>&nbsp;&nbsp;<code>max</code><br/>&nbsp;&nbsp;<code>min</code><br/>&nbsp;&nbsp;<code>sum</code></td>
  </tr>
</table>

<br/>

<a name="sort"></a>

### sort

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>field</code></td>
    <td style="width:19%">String</td>
    <td>Dependent upon the metrics and dimensions included in the report query body</td>
  </tr>
  <tr>
    <td><code>order</code></td>
    <td>String</td>
    <td>Possible values:<br/>&nbsp;&nbsp;<code>ASCENDING</code><br/>&nbsp;&nbsp;<code>DESCENDING</code></td>
  </tr>
</table>

<br/>

## Query response structure

```json
{
  "data": {
    "rows": [
      [
        "column1value",
        "column2value",
      ]
    ]
  },
  "metadata": {
    "column_headers": {
      "dimensions": [
        {
          "field": "dimension_id",
          "type": "datatype"
        }
      ]
      "metrics": [
        {
          "field": "plays",
          "units": "dataype"
        }
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
<a name="data"></a>

### data

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>rows</code></td>
    <td style="width:19%">Array</td>
    <td>Values for each metadata.column_headers property listed as an array of nested arrays</td>
  </tr>
</table>

<br/>

<a name="includes"></a>

### includes

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>type</code></td>
    <td style="width:19%">String</td>
    <td>Possible values:<br/>&nbsp;&nbsp;<code>ad_schedule_id</code><br/>&nbsp;&nbsp;<code>media_id</code><br/>&nbsp;&nbsp;<code>player_id</code><br/>&nbsp;&nbsp;<code>playlist_id</code></td>
  </tr>
  <tr>
    <td>(unique ID of the returned type)</td>
    <td>Object</td>
    <td>-</td>
  </tr>
</table>

<br/>

<a name="metadata"></a>

### metadata

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>column_headers</code></td>
    <td style="width:19%">Object</td>
    <td>Possible values:<br/>&nbsp;&nbsp;<code>dimensions</code><br/>&nbsp;&nbsp;<code>metrics</code></td>
  </tr>
  <tr>
    <td><code>end_date</code></td>
    <td>String</td>
    <td>Last date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
  <tr>
    <td><code>name</code></td>
    <td>Object</td>
    <td>See: metadata.name object</td>
  </tr>
  <tr>
    <td><code>start_date</code></td>
    <td>String</td>
    <td>First date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
</table>

<br/>

<a name="metadata-name"></a>

#### metadata.name

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>city</code></td>
    <td style="width:19%">Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["city"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><code>"city": {"Brussels|BRU|BE": "Brussels - Brussels Capital (Belgium)","Bucharest|B|RO": "Bucharest - Bucuresti (Romania)"}</code></td>
  </tr>
  <tr>
    <td><code>country_code</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["country_code"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><code>"country_code": {"HU": "Hungary", "NL": "Netherlands"}</code></td>
  </tr>
  <tr>
    <td><code>device_id</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["device_id"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><code>"device_id": {"Desktop": "Desktop", "Phone": "Phone"}</code></td>
  </tr>
  <tr>
    <td><code>platform_id</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["platform_id"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><code>"platform_id": {"web": "Web"}</code></td>
  </tr>
</table>

<a name="metadata-column-headers"></a>

#### metadata.column_headers

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>dimensions</code></td>
    <td style="width:19%">Array</td>
    <td>Set of objects for each dimension included in the report query<br/><br/><strong>NOTE</strong>: The <code>field</code> property is the dimension_id value. The unit property identifies the format of the data that is returned.</td>
  </tr>
  <tr>
    <td><code>metrics</code></td>
    <td>Array</td>
    <td>Set of objects for each metric included in the report query<br/><br/><strong>NOTE</strong>: The <code>field</code> property is the metric_id value. The unit property identifies the format of the data that is returned.</td>
  </tr>
</table>