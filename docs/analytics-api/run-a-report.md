# Run a report

<sup>Last Updated: June 17, 2019</sup>

The Analytics API allows you to query your data through the following single route.

```
https://api.jwplayer.com/v2/sites/{property key}/analytics/queries/
```

!!!important
All [data availability](..) constraints apply to making requests to the Analytics API.
!!!

<br/>

In your platform or language of choice, use the following steps to query your data:

1. In the request route, replace the `{property key}` with your key.
2. Add your secret to authenticate your request.
3. Create a <a href="../api-reference#query-body" target="_blank">query body</a>.
4. Append the query body to your `POST` request.

To help you construct a report, view these [examples of report queries](../example-report-queries). These examples demonstrate both basic and advanced queries that can be run against the Analytics API.

!!!tip
You can also use a [query tool](../run-a-report-with-tools) to run a report or run a report query with [Custom Reports](https://support.jwplayer.com/articles/how-to-use-custom-reports) from your JW Player dashboard
!!!

<br/><br/>
<div id="wufoo-mff60sc1xnn4cu">
Use this <a href="https://jwplayerdocs.wufoo.com/forms/mff60sc1xnn4cu">form</a> to provide your feedback.
</div>
<script type="text/javascript">var mff60sc1xnn4cu;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'jwplayerdocs',
'formHash':'mff60sc1xnn4cu',
'autoResize':true,
'height':'288',
'async':true,
'host':'wufoo.com',
'header':'show',
'ssl':true,
'defaultValues': 'field118=' + location.pathname};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { mff60sc1xnn4cu = new WufooForm();mff60sc1xnn4cu.initialize(options);mff60sc1xnn4cu.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>
