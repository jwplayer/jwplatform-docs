# Analytics API reference

<sup>Last Updated: June 12, 2019</sup>

This Analytics API reference details the structure of the query request body and query response body. Be sure you have your API credentials and understand how to create a report query.

!!!tip
View some [examples of report queries](../example-report-queries). These examples demonstrate both basic and advanced queries that can be run against the Analytics API.
!!!

<br/>

## Route

```html
https://api.jwplayer.com/v2/sites/{property key}/analytics/queries?format=csv&source=default
```
### URL parameter

<table>
  <tr>
    <th>Parameter</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>{property key}</code></td>
    <td style="width:10%">String</td>
    <td><strong>(Required)</strong> Unique property identifier</td>
  </tr>
  <tr>
    <td><code>format</code></td>
    <td>String</td>
    <td>File type of the response query output<br/><br/>Possible values include:<br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>json</code> (Default)<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>csv</code></td>
  </tr>
  <tr>
    <td><code>source</code></td>
    <td>String</td>
    <td>Data set against which to run the request query<br/><br/>Possible values include:<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>default</code>: This option includes all JW Player data, excluding OTT data.<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>floatleft</code>: This option only includes OTT data.<br/><br/><br/>The following dimensions and metrics are available for OTT data: <p>DIMENSIONS - <code>country_code</code>, <code>eastern_date</code>, <code>media_id</code>, <code>platform_id</code>, <code>playlist_id</code>, <code>playlist_type</code>, <code>tag</code>, <code>upload_date</code>, and <code>video_duration</code>.</p><br/><p>METRICS - <code>ad_impressions</code>, <code>ads_per_viewer</code>, <code>completes</code>, <code>complete_rate</code>, <code>plays</code>, <code>plays_per_viewer</code>, <code>time_watched</code>, <code>time_watched_per_viewer</code>, and <code>unique_viewers</code>. </td>
  </tr>
</table>

<br/>

<a name="query-body"></a>

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
    <td style="width:10%">Array</td>
    <td>Dimensions to include in the report query response, listed by (<a href="../metrics-and-dimensions#dimensions" target="_blank">dimension_id</a>).</td>
  </tr>
  <tr>
    <td><code>end_date</code></td>
    <td>String</td>
    <td>Last date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
  <tr>
    <td><code>filter</code></td>
    <td>Object</td>
    <td>Defines how to restrict the data returned in the response<br/><br/>See: <a href="#filter">filter</a> object</td>
  </tr>
  <tr>
    <td><strong>*<code> include_metadata</code></strong></td>
    <td>Boolean</td>
    <td>Indicates that eligible dimensions are enriched with additional metadata<br/><br/>Depending on the dimension, enriched metadata appears either in the <a href="#includes">includes</a> or <a href="#metadata-name">metadata.name</a> object of the query response.</td>
  </tr>
  <tr>
    <td><code>metrics</code></td>
    <td>Array</td>
    <td>Metrics to include in the report query response, listed by <code>metric_id</code>.<br/><br/>See: <a href="#metrics">metrics</a> object</td>
  </tr>
  <tr>
    <td><code>page</code></td>
    <td>Number</td>
    <td>Index of the page of results<br/><br/>The value of the first page of results is <code>0</code>. The number of total pages is inversely related to the <code>page_length</code>.</td>
  </tr>
  <tr>
    <td><code>page_length</code></td>
    <td>Number</td>
    <td>(JSON) Total number of records returned on each page of results<br/><br/>If not set, the default value is <code>10</code>. This value must be <strong>≤ 100</strong>.
</td>
  </tr>
  <tr>
    <td><code>relative_timeframe</code></td>
    <td>String</td>
    <td>Preconfigured time range for a report query<br/><br/>Possible values include:<br/><br/><p>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>7 Days</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>30 Days</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>90 Days</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>Last Quarter</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>Month To Date</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>Today</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>Yesterday</code></p>
</td>
  </tr>
  <tr>
    <td><code>sort</code></td>
    <td>Object</td>
    <td>Defines the field by which to sort the data and the order of the sort<br/><br/>See: <a href="#sort">sort</a> object</td>
  </tr>
  <tr>
    <td><code>start_date</code></td>
    <td>String</td>
    <td>First date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
</table>

<sup>* This property requires a JW Player Enterprise or Developer license.</sup>

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
    <td style="width:10%">String</td>
    <td>Dimension (<a href="../metrics-and-dimensions#dimensions" target="_blank">dimension_id</a>) by which to restrict the returned data set<br/><br/>When filtering <strong>JWP Data</strong>, all <code>dimension_id</code> variables can be used.<br/><br/>When filtering <strong>OTT Data</strong>, only the following <code>dimension_id</code> variable can be used:<br/><p>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>country_code</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>eastern_date</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>media_id</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>platform_id</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>playlist_id</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>playlist_type</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>tag</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>upload_date</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;&bull; <code>video_duration</code></p></td>
  </tr>
  <tr>
    <td><code>operator</code></td>
    <td>String</td>
    <td>Filter-matching behavior<br/><br/>Possible values:<br/><p>&nbsp;&nbsp;&nbsp;&nbsp;<code>=</code>: Use this operator when the value is an ID.<br/>&nbsp;&nbsp;&nbsp;&nbsp;<code>!=</code>: Use this operator when the value is an ID.<br/>&nbsp;&nbsp;&nbsp;&nbsp;* <code>LIKE</code>: (Business, Enterprise only) Use this operator when the value is metadata information.<br/>&nbsp;&nbsp;&nbsp;&nbsp;* <code>!LIKE</code>: (Business, Enterprise only) Use this operator when the value is metadata information.</td>
  </tr>
  <tr>
    <td><code>value</code></td>
    <td>String</td>
    <td>Value of a specific <code>dimension_id</code> by which to restrict the returned data set</td>
  </tr>
</table>

<sup>* This property value requires a JW Player Enterprise or Developer license.</sup>

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
    <td style="width:10%">String</td>
    <td>Metrics to include in the report query response, listed by <a href="../metrics-and-dimensions#metrics" target="_blank">metric_id</a>.</td>
  </tr>
  <tr>
    <td><code>operation</code></td>
    <td>String</td>
    <td>Calculation applied to selected metric<br/><br/>Possible values:<br/><p>&nbsp;&nbsp;&nbsp;&nbsp;<code>max</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;<code>min</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;<code>sum</code></p></td>
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
    <td style="width:10%">String</td>
    <td>Metric or dimension by which the response query is organized<br/><br/>The metric or dimension must be on of the metrics and dimensions included in the report query body.
</td>
  </tr>
  <tr>
    <td><code>order</code></td>
    <td>String</td>
    <td>Manner in which response query is organized<br/><br/>Possible values:<br/><p>&nbsp;&nbsp;&nbsp;&nbsp;<code>ASCENDING</code><br/>&nbsp;&nbsp;&nbsp;&nbsp;<code>DESCENDING</code></p></td>
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
      ],
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

<table>
  <tr>
    <th>Property</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><code>data</code></td>
    <td style="width:10%">Object</td>
    <td>See: <a href="#data">data object</a></td>
  </tr>
  <tr>
    <td><code>includes</code></td>
    <td>Object</td>
    <td>See: <a href="#includes">includes object</a></td>
  </tr>
  <tr>
    <td><code>metadata</code></td>
    <td>Object</td>
    <td>See: <a href="#metadata">metadata object</a></td>
  </tr>
  <tr>
    <td><code>page</code></td>
    <td>Number</td>
    <td>Index of the page of results</td>
  </tr>
  <tr>
    <td><code>page_length</code></td>
    <td>Number</td>
    <td>(JSON only) Total number of records returned on each page of results</td>
  </tr>
  <tr>
    <td><code>type</code></td>
    <td>String</td>
    <td>Category of report query<br/><br/>This will always return <code>query_results</code>.</td>
  </tr>
</table>

<br/>

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
    <td style="width:10%">Array</td>
    <td>Values for each <a hef="#metadata-column-headers">metadata.column_headers</a> property listed as an array of nested arrays</td>
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
    <td style="width:21%">(ad_schedule_id - unique ID of the returned type)</td>
    <td style="width:10%">Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["ad_schedule_id"]</code> are part of the API query, an object of identifier-to-name pairings<br/><br/>The object includes:<br/><p><code>name</code>: User-generated name of the ad schedule</p></td>
  </tr>
  <tr>
    <td>(media_id - unique ID of the returned type)</td>
    <td style="width:10%">Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["media_id"]</code> are part of the API query, an object of identifier-to-name pairings<br/><br/>The object includes:<br/><ul><li><code>duration_bucket</code>: Categorization of video duration</li><li><code>tags</code>: Metadata tags associated with the media item</li><li><code>title</code>: Name of the media item</li><li><code>uploade_date</code>: Date when the media item was uploaded in <code>YYYY-MM-DD</code> format</li></ul></td>
  </tr>
  <tr>
    <td style="width:21%"><code>type</code></td>
    <td style="width:10%">String</td>
    <td>Possible values:<br/><br/>&nbsp;&nbsp;&bull; ad_schedule_id<br/>&nbsp;&nbsp;&bull; media_id<br/>&nbsp;&nbsp;&bull; player_id<br/>&nbsp;&nbsp;&bull; playlist_id</td>
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
    <td style="width:10%">Object</td>
    <td>Possible values:<br/><br/>&nbsp;&nbsp;&bull; dimensions<br/>&nbsp;&nbsp;&bull; metrics<br/><br/>See: <a href="#metadata-column-headers">metadata.column_headers</a></td>
  </tr>
  <tr>
    <td><code>end_date</code></td>
    <td>String</td>
    <td>Last date of a query date range in <code>YYYY-MM-DD</code> format</td>
  </tr>
  <tr>
    <td><code>name</code></td>
    <td>Object</td>
    <td>See: <a href="#metadata-name">metadata.name</a> object</td>
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
    <td style="width:10%">Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["city"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><br/><code>"city": {"Brussels|BRU|BE": "Brussels - Brussels Capital (Belgium)"}</code></td>
  </tr>
  <tr>
    <td><code>country_code</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["country_code"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><br/><code>"country_code": {"HU": "Hungary", "NL": "Netherlands"}</code></td>
  </tr>
  <tr>
    <td><code>device_id</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["device_id"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><br/><code>"device_id": {"Desktop": "Desktop", "Phone": "Phone"}</code></td>
  </tr>
  <tr>
    <td><code>platform_id</code></td>
    <td>Object</td>
    <td>When <code>include_metadata: 1</code> and <code>dimensions: ["platform_id"]</code> are part of the API query, an object of identifier-to-name pairings is returned<br/><br/>For example:<br/><br/><code>"platform_id": {"web": "Web"}</code></td>
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
    <td style="width:10%">Array</td>
    <td>Set of objects for each dimension included in the report query<br/><br/><strong>NOTE</strong>: The <code>field</code> property is the dimension_id value. The unit property identifies the format of the data that is returned.</td>
  </tr>
  <tr>
    <td><code>metrics</code></td>
    <td>Array</td>
    <td>Set of objects for each metric included in the report query<br/><br/><strong>NOTE</strong>: The <code>field</code> property is the metric_id value. The unit property identifies the format of the data that is returned.</td>
  </tr>
</table>