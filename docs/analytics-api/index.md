# Overview

<sup>Last Updated: May 27, 2019</sup>  

The Analytics API allows you to query various data sets relating to the performance of your media items, players, and advertising ad breaks. Responses can be returned in .csv or .json file formats that can be ingested by a data warehouse or analytics solution.

<br/>

## Data availability

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
    <td>Updated <strong>approximately every 30 minutes</strong> during peak traffic</td>
</tr>
<tr>
    <td>Rate limit</td>
    <td><strong>60 requests/minute</strong> per API token or IP</td>
</tr>
<tr>
    <td>Maximum page length</td>
    <td>100 rows per page</td>
</tr>
<tr>
    <td>Queries</td>
    <td><strong>Enterprise license</strong><br/>&bull; Group by up to <strong>two</strong> dimensions<br/>&bull; Apply up to <strong>five</strong> metrics<br/>&bull; Apply up to <strong>ten</strong> filters<br/><br/><strong>Non-Enterprise license</strong><br/>&bull; Group by only <strong>one</strong> dimension<br/>&bull; Apply up to <strong>five</strong> metrics<br/>&bull; Apply only <strong>one</strong> filter</td>
</tr>
</table>

<br/>

## Get the required items

The Analytics API requires the items in the following table.

<table>
  <tr>
    <th>Item</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Key</td>
    <td>Unique property identifier<br/><br/>
      <ol>
        <li>From your <a href="https://dashboard.jwplayer.com">JW Player dashbord</a>, click the gear next to your name <strong>> API Credentials</strong>.</li>
        <li>In the <strong>JW Platform API Credentials</strong> section, click <strong>SHOW CREDENTIALS</strong> next to a property name.</li>
        <li>Copy the <strong>Key</strong>.</li>
      </ol></td>
  </tr>
  <tr>
    <td>Secret</td>
    <td>Unique user reporting credential<br/><br/>
      <ol>
        <li>From your <a href="https://dashboard.jwplayer.com">JW Player dashbord</a>, click the gear next to your name <strong>> API Credentials</strong>.</li>
        <li>In the <strong>JW Reporting API Credentials</strong> section, click <strong>SHOW CREDENTIALS</strong> in the row of the relevant API key name.<br/><br/><strong>NOTE</strong>: If no API key names exist, type a new API key name, select a permission level, and click <strong>ADD NEW API KEY</strong>. Your account must have the Admin permission to create a new API key.</li>
        <li>Copy the <strong>Secret</strong>.</li>
      </ol></td>
  </tr>
  <tr>
    <td>Business or Enterprise license</td>
    <td>(Optional) Account plan that enables access to additional dimensions, enriched metadata, and metrics<br/><br/><a href="https://www.jwplayer.com/pricing/?utm_source=developer&utm_medium=CTA&utm_campaign=Developer%20Nav%20Upgrade" target="_blank">Upgrade</a> to a Business or Enterprise license if you would like to access this additional data.</td>
  </tr>
</table>

<br/>

## Getting started
You have retrieved your property key and reporting secret, and you have reviewed the data constraints. You can now [run a report](../analytics-api/run-a-report).