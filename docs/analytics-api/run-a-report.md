# Run a report

<sup>Last Updated: May 27, 2019</sup>

The Analytics API allows you to query your data through the following single route.

```
https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/
```

!!!tip
You can also use a query tool to run a report or run a report query with [Custom Reports](https://support.jwplayer.com/articles/how-to-use-custom-reports) from your JW Player dashboard
!!!

<br/>

In your platform or language of choice, use the following steps to query your data:

1. In the request route, replace the `{property key}` with your key.
2. Replace the `{reporting secret}` with your secret.
3. Create a <a href="../api-reference#query-body" target="_blank">query body</a>.
4. Append the query body to your request.

To help you construct a report, view these [examples of report queries](../example-report-queries). These examples demonstrate both basic and advanced queries that can be run against the Analytics API.

<br/>

## Sample query

The following is a cURL sample.
```curl
curl -X POST https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/ \
 -H 'Authorization: {reporting secret}' \
 -H 'Content-Type: application/json' \
 -d '{"start_date": "2017-06-01", "end_date": "2017-06-02", "dimensions": ["media_id"], "metrics": [{"operation": "sum", "field": "plays"}], "sort": [{"field": "plays", "order": "DESCENDING"}]}'
```
<br/>

## URL parameter

| Parameter | Type | Description |
| -- | -- | -- |
| {property key} | String | **(Required)** Unique [property identifier](../) |