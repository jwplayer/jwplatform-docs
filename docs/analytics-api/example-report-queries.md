# Example report queries

<sup>Last Updated: May 27, 2010</sup>

The following examples illustrate how to construct basic and advanced queries with the Analytics API.

## Example 1: Total plays for media IDs within a defined time frame

**Objective**: For a property (`key: 1A23bCD4`), list the total number of plays for each video within the date range of June 1, 2017 - June 2, 2017. The list should be sorted by the number of plays, in descending order.

**Constraint**: Non-enterprise license

**Query**:

```curl
curl -X POST https://api.jwplayer.com/v2/sites/1A23bCD4/analytics/queries/ \
 -H 'Authorization: 123Four56==7123Four56==7123Four56==7' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```

**Response**:

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

<br/>

## Example 2: Total embeds for the top two countries within a defined time frame

**Objective**: For a property (key: 1A23bCD4), list the total number of embeds for each country code (for the top two countries) within the date range of June 1, 2017 - June 2, 2017. Filter: only for Desktop.

**Constraint**: Non-enterprise license

**Query**:

```
curl -X POST https://api.jwplayer.com/v2/sites/1A23bCD4/analytics/queries/ \
 -H 'Authorization: YJD8uGbFTCwQgjT4GorWInV1V0VGRqQzz6tORVp6UjJoTFVXWjRielk1YlVkMWNUWnIn' \
 -H 'Content-Type: application/json' \
 -d '{"start_date" : "2017-06-01", "end_date" : "2017-06-02", "dimensions" : ["media_id"], "metrics" : [{"operation": "sum", "field": "plays"}], "sort" : [{"field" : "plays", "order": "DESCENDING"}]}'
```

**Response**:

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