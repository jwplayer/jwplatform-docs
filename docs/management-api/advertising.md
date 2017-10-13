# Advertising

The JW Player Advertising endpoints allow you to manage advertising schedules programmatically.

### Obtaining your Site API Key & Secret

Each request to the Advertising API is for a specific JW Player site (or property) within your account.  To query data for one of your JW Player sites, you will need to obtain your site API key.

You can find each property’s API Key in the JW Player Dashboard by navigating to Account > API Credentials and clicking "Show Credentials" for the relevant site.

To find your secret, you'll find JW Reporting API Credentials at the bottom of the API credentials page.  You may need to first create a Private API key here if you have not already.

!!!warning
The property API secret will not work for this endpoint - you must use the secret specific to the Reporting API
!!!

# API Structure

## Create a new advertising schedule
### POST
`/sites/{site_id}/advertising/schedules/`
Creates a new advertising schedule

**Parameters**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
site_id | stirng | The unique 8 character identifier for the site. | YES

**Request body**

A resource object describing an ad schedule.

Param Name | Units  | Required
------------ | ------------- | -------------
metadata | ad_schedule_post_patch_metadata | YES
metadata.name | string | YES | 
metadata.client | string | NO | Valid values 'vast', 'googima' 
metadata.is_vmap | boolean | NO | 
metadata.vpaidmode | string | NO | 
metadata.breaks | Array of object | YES |
metadata.breaks.tags | Array of string | YES
metadata.breaks.offset | string | YES
metadata.breaks.skipoffset | integer | NO
metadata.breaks.type | string | NO




### Request samples:

```json
{
  "metadata": {
    "name": "Example Ad Schedule",
    "breaks": [
      {
        "tags": [
          "http://doubleclick.com/tag1.xml"
        ],
        "offset": 180.123,
        "skipoffset": 5,
        "type": "linear"
      }
    ],
    "client": "vast",
    "is_vmap": false,
    "vpaidmode": "secure"
  }
}
```

### Response schema

**Response body**

Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
id | string | NO |
type | string | NO |
schema | string | NO |
created | string | NO | 
last_modified | string | NO |
metadata | ad_schedule_post_patch_metadata | YES |
metadata.name | string | YES | 
metadata.client | string | NO | Valid values 'vast', 'googima'
metadata.is_vmap | boolean | NO |
metadata.vpaidmode | string | NO |
metadata.breaks | Array of object | YES |
metadata.breaks.tags | Array of string | YES |
metadata.breaks.offset | string | YES |
metadata.breaks.skipoffset | integer | NO |
metadata.breaks.type | string | NO

### Response samples:

#### 201 Created:
```json
{
  "id": "aBcdEf12",
  "type": "adschedule",
  "schema": "https://schema.jwplayer.com/types/adschedule.json",
  "created": "2017-05-22T15:02:18-4:00",
  "last_modified": "2017-05-22T15:02:18-4:00",
  "metadata": {
    "name": "Example Ad Schedule",
    "breaks": [
      {
        "tags": [
          "http://doubleclick.com/tag1.xml"
        ],
        "offset": 180.123,
        "skipoffset": 5,
        "type": "linear"
      }
    ],
    "client": "vast",
    "is_vmap": false,
    "vpaidmode": "secure",
    "version": "1.0"
  }
}
```

#### 400 Bad request

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 400,
    "description": "Bad request"
  }
}
```

## Fetch a list of advertising schedules
### GET
`/sites/{site_id}/advertising/schedules/`

Fetches a list of advertising schedules

**Parameters**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
site_id | stirng | The unique 8 character identifier for the site. | YES

**Path parameters**

A resource object describing an ad schedule.

Param Name | Units  | Notes
------------ | ------------- | -------------
page_length | integer <=1000 | This parameter specifies the page size to return. Default behavior is 10 items.
page | integer | This parameter specifies the offset for the page to return.

**Response body**

Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
id | string | NO |
type | string | NO |
schema | string | NO |
created | string | NO | 
last_modified | string | NO |
metadata | ad_schedule_post_patch_metadata | YES |
metadata.name | string | YES | 
metadata.client | string | NO | Valid values 'vast', 'googima'
metadata.is_vmap | boolean | NO |
metadata.vpaidmode | string | NO |
metadata.breaks | Array of object | YES |
metadata.breaks.tags | Array of string | YES |
metadata.breaks.offset | string | YES |
metadata.breaks.skipoffset | integer | NO |
metadata.breaks.type | string | NO |

## Response samples:
### 200 OK

```json
{
  "schedules": [
    {
      "id": "aBcdEf12",
      "type": "adschedule",
      "schema": "https://schema.jwplayer.com/types/adschedule.json",
      "created": "2017-05-22T15:02:18-4:00",
      "last_modified": "2017-05-22T15:02:18-4:00",
      "metadata": {
        "name": "Example Ad Schedule",
        "breaks": [
          {
            "tags": [
              "http://doubleclick.com/tag1.xml"
            ],
            "offset": 180.123,
            "skipoffset": 5,
            "type": "linear"
          }
        ],
        "client": "vast",
        "is_vmap": false,
        "vpaidmode": "secure",
        "version": "1.0"
      }
    }
  ],
  "page": 1,
  "page_length": 10,
  "total": 4
}
```

### Response schema

Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
schedules | Array of ad_schedule_resource | |
schedules.id | string | NO |
schedules.type | string | NO |
schedules.schema | string | NO |
schedules.created | string | NO | 
schedules.last_modified | string | NO |
schedules.metadata | ad_schedule_post_patch_metadata | YES |
schedules.metadata.name | string | YES | 
schedules.metadata.client | string | NO | Valid values 'vast', 'googima'
schedules.metadata.is_vmap | boolean | NO |
schedules.metadata.vpaidmode | string | NO |
schedules.metadata.version | string | NO |
schedules.metadata.breaks | Array of object | YES |
schedules.metadata.breaks.tags | Array of string | YES |
schedules.metadata.breaks.offset | string | YES |
schedules.metadata.breaks.skipoffset | integer | NO |
schedules.metadata.breaks.type | string | NO |
page_length | string | NO |
page | string | NO |
total | string | NO |

## Retrieve an advertising schedule
### GET
`/sites/{site_id}/advertising/schedules/{ad_schedule_id}`
Retrieves an advertising schedule

**Parameters**
Name | Units | Rquired | Notes
------------ | ------------ | ------------- | -------------
site_id	| string | YES | The unique 8 character identifier for the site.
ad_schedule_id | string | YES | The unique 8 character identifier for the ad schedule.

## Response samples:
### 200 OK

```json
{
  "id": "aBcdEf12",
  "type": "adschedule",
  "schema": "https://schema.jwplayer.com/types/adschedule.json",
  "created": "2017-05-22T15:02:18-4:00",
  "last_modified": "2017-05-22T15:02:18-4:00",
  "metadata": {
    "name": "Example Ad Schedule",
    "breaks": [
      {
        "tags": [
          "http://doubleclick.com/tag1.xml"
        ],
        "offset": 180.123,
        "skipoffset": 5,
        "type": "linear"
      }
    ],
    "client": "vast",
    "is_vmap": false,
    "vpaidmode": "secure",
    "version": "1.0"
  }
}
```

### Response schema

Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
schedules | Array of ad_schedule_resource | |
schedules.id | string | NO |
schedules.type | string | NO |
schedules.schema | string | NO |
schedules.created | string | NO | 
schedules.last_modified | string | NO |
schedules.metadata | ad_schedule_post_patch_metadata | YES |
schedules.metadata.name | string | YES | 
schedules.metadata.client | string | NO | Valid values 'vast', 'googima'
schedules.metadata.is_vmap | boolean | NO |
schedules.metadata.vpaidmode | string | NO |
schedules.metadata.version | string | NO |
schedules.metadata.breaks | Array of object | YES |
schedules.metadata.breaks.tags | Array of string | YES |
schedules.metadata.breaks.offset | string | YES |
schedules.metadata.breaks.skipoffset | integer | NO |
schedules.metadata.breaks.type | string | NO |

#### 403 Forbidden

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 403,
    "description": "Forbidden, this API token is not authorized to make this call"
  }
}
```

#### 404 Not found

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 404,
    "description": "Not Found, this resource was not found"
  }
}
```

## Patch an advertising schedule
### PATCH
`/sites/{site_id}/advertising/schedules/{ad_schedule_id}`
Patches an advertising schedule

**Parameters**
Name | Units | Rquired | Notes
------------ | ------------ | ------------- | -------------
site_id	| string | YES | The unique 8 character identifier for the site.
ad_schedule_id | string | YES | The unique 8 character identifier for the ad schedule.

**Request body**
Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
metadata | ad_schedule_post_patch_metadata | YES
metadata.name | string | YES |
metadata.client | string | NO | Valid values 'vast', 'googima' 
metadata.is_vmap | boolean | NO | 
metadata.vpaidmode | string | NO | 
metadata.breaks | Array of object | YES |
metadata.breaks.tags | Array of string | YES
metadata.breaks.offset | string | YES
metadata.breaks.skipoffset | integer | NO
metadata.breaks.type | string | NO

## Request samples:

```json
{
  "metadata": {
    "name": "Example Ad Schedule",
    "breaks": [
      {
        "tags": [
          "http://doubleclick.com/tag1.xml"
        ],
        "offset": 180.123,
        "skipoffset": 5,
        "type": "linear"
      }
    ],
    "client": "vast",
    "is_vmap": false,
    "vpaidmode": "secure"
  }
}
```

### Response schema

### 200 OK

**Response body**

Param Name | Units  | Required | Notes
------------ | ------------ | ------------- | -------------
id | string | NO |
type | string | NO |
schema | string | NO |
created | string | NO | 
last_modified | string | NO |
metadata | ad_schedule_post_patch_metadata | YES |
metadata.name | string | YES | 
metadata.client | string | NO | Valid values 'vast', 'googima'
metadata.is_vmap | boolean | NO |
metadata.vpaidmode | string | NO |
metadata.breaks | Array of object | YES |
metadata.breaks.tags | Array of string | YES |
metadata.breaks.offset | string | YES |
metadata.breaks.skipoffset | integer | NO |
metadata.breaks.type | string | NO

**Response sample**

```json
{
  "id": "aBcdEf12",
  "type": "adschedule",
  "schema": "https://schema.jwplayer.com/types/adschedule.json",
  "created": "2017-05-22T15:02:18-4:00",
  "last_modified": "2017-05-22T15:02:18-4:00",
  "metadata": {
    "name": "Example Ad Schedule",
    "breaks": [
      {
        "tags": [
          "http://doubleclick.com/tag1.xml"
        ],
        "offset": 180.123,
        "skipoffset": 5,
        "type": "linear"
      }
    ],
    "client": "vast",
    "is_vmap": false,
    "vpaidmode": "secure",
    "version": "1.0"
  }
}
```

#### 400 Bad request

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 400,
    "description": "Bad request"
  }
}
```

#### 403 Forbidden

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 403,
    "description": "Forbidden, this API token is not authorized to make this call"
  }
}
```

#### 404 Not found

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 404,
    "description": "Not Found, this resource was not found"
  }
}
```

## Delete an advertising schedule
### DELETE
`/sites/{site_id}/advertising/schedules/{ad_schedule_id}`
Deletes an advertising schedule

**Path Parameters**
Name | Units | Rquired | Notes
------------ | ------------ | ------------- | -------------
site_id	| string | YES | The unique 8 character identifier for the site.
ad_schedule_id | string | YES | The unique 8 character identifier for the ad schedule.

### Responses

#### 200 OK

#### 403 Forbidden

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 403,
    "description": "Forbidden, this API token is not authorized to make this call"
  }
}
```

#### 404 Not found

#### HEADERS

Name | Units | Notes
------------ | ------------ | ---------
X-Rate-Limit-Limit | integer | The number of allowed requests in the current period
X-Rate-Limit-Remaining | integer | The number of remaining requests in the current period
X-Rate-Limit-Reset | integer | The number of seconds left in the current period

### Response schema

Name | Units
----- | ----
error | error
error.code | string
error.description | string

```json
{
  "error": {
    "code": 404,
    "description": "Not Found, this resource was not found"
  }
}
```



