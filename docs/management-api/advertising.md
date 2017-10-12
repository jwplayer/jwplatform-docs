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

Creates a new advertising schedule

**Parameters**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
site_id | stirng | The unique 8 character identifier for the site. | YES

**Request body**

A resource object describing an ad schedule.

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
metadata | ad_schedule_post_patch_metadata |  | YES

**Metadata body**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
metadata.name | string | Schedule name | YES
metadata.breaks | Array of object | List of ad breaks | YES
metadata.client | string | Client. Valid values 'vast', 'googima' | NO
metadata.is_vmap | boolean | Is a VMAP | NO
metadata.vpaidmode | string | | NO

**Ad break body**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
metadata.breaks.tags | Array of string | List of tags | YES
metadata.breaks.offset | string | Ad break offset | YES
metadata.breaks.skipoffset | integer | Skip offset | NO
metadata.breaks.type | string | Type | NO




### Request samples: `/sites/{site_id}/advertising/schedules/`

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

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
id | string | Schedule id | NO
type | string | Schedule type | NO
schema | string |  | NO
created | string | Created date | NO
last_modified | string | Updated date | NO
metadata | ad_schedule_post_patch_metadata | | YES

**Metadata body**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
metadata.name | string | Schedule name | YES
metadata.breaks | Array of object | List of ad breaks | YES
metadata.client | string | Client. Valid values 'vast', 'googima' | NO
metadata.is_vmap | boolean | Is a VMAP | NO
metadata.vpaidmode | string | | NO

**Ad break body**

Param Name | Units | Description | Required
------------ | ------------ | ------------- | -------------
metadata.breaks.tags | Array of string | List of tags | YES
metadata.breaks.offset | string | Ad break offset | YES
metadata.breaks.skipoffset | integer | Skip offset | NO
metadata.breaks.type | string | Type | NO

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
```json
{
	"error": {
		"code": 400,
		"description": "Bad request"
	}
}
```
