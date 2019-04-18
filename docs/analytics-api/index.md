# Overview

<sup>Last Updated: April 18, 2019</sup>

The Analytics API is a RESTful API that allows you to query various data sets and import video and advertising data to a data warehouse or analytics solution.

<br/>

## Requirements

The Analytics API requires the items in the following table.

| Item | Description |
| -- | -- |
| Key | Unique property identifier<br/><br/>1. From your [JW Player dashbord](https://dashboard.jwplayer.com), click the gear next to your name **> API Credentials**.<br/>2. In the **JW Platform API Credentials** section, click **SHOW CREDENTIALS** next to a property name.<br/>3. Copy the **Key**.|
| Secret | Unique user reporting credential<br/><br/>1. From the your [JW Player dashboard](https://dashboard.jwplayer.com), click the gear next to your name **> API Credentials**.<br/>2. In the **JW Reporting API Credentials** section, click **SHOW CREDENTIALS** next to an API key name.<br/><br/>**NOTE**: If no API key names exist, type a new API key name, select a permission level, and click **ADD NEW API KEY**. Your account must have the Admin permission to create a new API key.<br/><br/> 3. Copy the **Secret**.|
| Enterprise license | (Optional) Account plan that enables access to additional dimensions, enriched metadata, and metrics<br/><br/>[Upgrade](https://www.jwplayer.com/pricing/) to an Enterprise license if you would like to access this additional data. |

<br/>

## Data constraints

<table>
<tr>
    <td>Earliest available data</td>
    <td>2017-01-01</td>
</tr>
<tr>
    <td>Reporting time zone</td>
    <td>US - Eastern (UTC -4)</td>
</tr>
<tr>
    <td>Data refresh rate</td>
    <td>Updated approximately every 30 minutes during peak traffic</td>
</tr>
<tr>
    <td>Rate limit</td>
    <td>60 request/minute per API token or IP</td>
</tr>
<tr>
    <td>Maximum page length</td>
    <td>100 rows per page</td>
</tr>
<tr>
    <td>Queries</td>
    <td><strong>Enterprise license</strong><br/>&bull; Group by up to 2 dimensions<br/>&bull; Apply up to 5 metrics<br/>&bull; Apply up to 10 filters<br/><br/><strong>Non-Enterprise license</strong><br/>&bull; Group by only one dimension<br/>&bull; Apply up to five metrics<br/>&bull; Apply only one filter</td>
</tr>
</table>

## Getting started
You have retrieved your property key and reporting secret, and you have reviewed the data constraints. You can now begin to [query the data](../query-the-data).