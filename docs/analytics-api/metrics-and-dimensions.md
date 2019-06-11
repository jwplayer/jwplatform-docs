# Metrics and dimensions

<sup>Last Updated: June 12, 2019</sup>

!!!important
Premium metrics and dimensions denoted in the following tables require a JW Player [Enterprise](https://www.jwplayer.com/pricing/?utm_source=developer&utm_medium=CTA) or [Developer](https://developer.jwplayer.com/sign-up/) license.
!!!

<br/>

| Field Type | Category |
| -- | -- |
|  [Metrics](#metrics)  | [Ads](#ads) \| [Engagement](#engagement) \| [Performance](#performance) \| [Viewers](#viewers)|
[Dimensions](#dimensions)  | [Content](#content) \| [Date/Time](#date-time) \| [Device](#device) \| [Geography](#geography) \| [Placement](#placement)|

<a name="metrics"></a>

## Metrics


A *metric* is a quantitative measurement. The following metrics are currently offered.

<a name="ads"></a>

### Ads

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* Ad Clicks</strong></td>
    <td style="width:23%"><code>ad_clicks</code></td> 
    <td style="width:5%">Integer</td>
    <td>Number of times a video ad was clicked in an embedded player</td>
  </tr>
  <tr>
    <td><strong>* Ad Completes</strong></td>
    <td><code>ad_completes</code></td> 
    <td>Integer</td>
    <td>Number of times a video ad was completed in an embedded player</td>
  </tr>
  <tr>
    <td><strong>* Ad Skips</strong></td>
    <td><code>ad_skips</code></td> 
    <td>Integer</td>
    <td>Number of times a video ad was skipped in an embedded player</td>
  </tr>
</table>

<sup>* This premium metric requires a JW Player Enterprise or Developer license.</sup>

<a name="engagement"></a>

### Engagement

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">25% Completes</td>
    <td style="width:23%"><code>25_percent_completes</code></td> 
    <td style="width:7%">Integer</td>
    <td>Number of times viewers watched to the 25% mark of a media item<br/><br/>This metric is only available for media items over 30 seconds.</td>
  </tr>
  <tr>
    <td>50% Completes</td>
    <td><code>50_percent_completes</code></td> 
    <td>Integer</td>
    <td>Number of times viewers watched to the 50% mark of a media item<br/><br/>This metrics is only available for media items over 30 seconds.</td>
  </tr>
  <tr>
    <td>75% Completes</td>
    <td><code>75_percent_completes</code></td> 
    <td>Integer</td>
    <td>Number of times viewers watched to the 75% mark of a media item<br/><br/>This metrics is only available for media items over 30 seconds.</td>
  </tr>
  <tr>
    <td>Adjusted Complete Rate</td>
    <td><code>adjusted_complete_rate</code></td> 
    <td>Percent</td>
    <td>Adjusted completes per plays<br/><br/>This metric is not available in dashboard Custom Reports.</td>
  </tr>
  <tr>
    <td>Adjusted Completes</td>
    <td><code>adjusted_completes</code></td> 
    <td>Integer</td>
    <td>Used to calculate the Content Score, number of times a viewer watched at least 75% the total duration of a media item<br/><br/>This metric is not available in dashboard Custom Reports.</td>
  </tr>
  <tr>
    <td>Complete Rate</td>
    <td><code>complete_rate</code></td>
    <td>Percent</td>
    <td>Plays per completes, expressed as a percentage</td>
  </tr>
  <tr>
    <td><strong>* Content Score</strong></td>
    <td><code>content_score</code></td>
    <td>Integer</td>
    <td>Average of the play rate and complete rate</td>
  </tr>
</table>

<sup>* This premium metric requires a JW Player Enterprise or Developer license.</sup>

<a name="performance"></a>

### Performance

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>&#10013; 3-Second Plays</strong></td>
    <td style="width:23%"><code>3_second_plays</code></td> 
    <td style="width:7%">Integer</td>
    <td>Number of times viewers watched to the 3-second mark of a media item</td>
  </tr>
  <tr>
    <td><strong>&#10013; 10-Second Plays</strong></td>
    <td><code>10_second_plays</code></td> 
    <td>Integer</td>
    <td>Number of times viewers watched to the 10-second mark of a media item</td>
  </tr>
  <tr>
    <td><strong>&#10013; 30-Second Plays</strong></td>
    <td><code>30_second_plays</code></td> 
    <td>Integer</td>
    <td>Number of times viewers watched to the 30-second mark of a media item</td>
  </tr>
  <tr>
    <td>Ad Impressions</td>
    <td><code>ad_impressions</code></td> 
    <td>Integer</td>
    <td>Number of ad starts across all embedded players</td>
  </tr>
  <tr>
    <td>Completes</td>
    <td><code>completes</code></td> 
    <td>Integer</td>
    <td>Number of times a viewer watched the total duration of a media item</td>
  </tr>
  <tr>
    <td>Embeds</td>
    <td><code>embeds</code></td> 
    <td>Integer</td>
    <td>Number of times a player has been set up on a page<br/><br/>The following behaviors can log an embed: loading or refreshing a page with an embedded player, resetting an embedded player without refreshing the page.
</td>
  </tr>
  <tr>
    <td><strong>* Play Rate</strong></td>
    <td><code>play_rate</code></td> 
    <td>Percent</td>
    <td>Plays per embeds<br/><br/>Only the first play (based on the <code>firstFrame</code> event) for a given embed is counted.</td>
  </tr>
  <tr>
    <td>Plays</td>
    <td><code>plays</code></td> 
    <td>Integer</td>
    <td>Number of video starts across all embedded players<br/><br/>The player does not have to be visible for this event to fire. This is based on the <code>firstFrame</code> player event.</td>
  </tr>
  <tr>
    <td>Time Watched</td>
    <td><code>time_watched</code></td> 
    <td>Integer</td>
    <td>Total duration of content watched across all embedded players, measured in seconds<br/><br/>This metric excludes the duration of external live streams watched.</td>
  </tr>
</table>

<sup>* This premium metric requires a JW Player Enterprise or Developer license.<br/>&#10013; This premium metric requires both a JW Player Enterprise and special authorization. Please contact your JW Player representative.</sup>

<a name="viewers"></a>

### Viewers

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* Ad Impressions per Viewer</strong></td>
    <td style="width:23%"><code>ads_per_viewer</code></td> 
    <td style="width:7%">Integer</td>
    <td>Average number of ad impressions for a unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Plays per Viewer</strong></td>
    <td><code>plays_per_viewer</code></td> 
    <td>Integer</td>
    <td>Average number of plays for each unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Time Watched per Viewer</strong></td>
    <td><code>time_watched_per_viewer</code></td> 
    <td>Integer</td>
    <td>Average duration of content watched for a unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Unique Viewers</strong></td>
    <td><code>unique_viewers</code></td> 
    <td>Integer</td>
    <td>Number of unique users who have played at least one media item</td>
  </tr>
</table>

<sup>* This premium metric requires a JW Player Enterprise or Developer license.</sup>

<br/>

<a name="dimensions"></a>

## Dimensions

A *dimension* is an attribute of your metrics.  For example, each Play Event has several attributes that help describe it. JW Player determines what Country it took place in, what Video it was for, what device was used, etc.

<a name="content"></a>

### Content

<table>
  <tr>
    <th>Name</th>
    <th>Dimension_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* Ad Schedule</strong></td>
    <td style="width:23%"><code>ad_schedule_id</code></td> 
    <td style="width:7%">String</td>
    <td>ID associated with a specific ad schedule</td>
  </tr>
  <tr>
    <td><strong>* Is First Play</strong></td>
    <td><code>is_first_play</code></td> 
    <td>Boolean</td>
    <td>Indicator that the media was the first media item within a playlist</td>
  </tr>
  <tr>
    <td>Media</td>
    <td><code>media_id</code></td> 
    <td>String</td>
    <td>ID of the media item</td>
  </tr>
  <tr>
    <td><strong>* Media Tag</strong></td>
    <td><code>tag</code></td> 
    <td>String</td>
    <td>Metadata associated with a media item</td>
  </tr>
  <tr>
    <td><strong>* Play Reason</strong></td>
    <td><code>play_reason</code></td> 
    <td>Integer</td>
    <td>Indicator of how media playback was initiated<br/><br/>Possible values include:<br/><br/>&bull; 0: Unknown reason<br/>&bull; 1: A user clicked on the video<br/>&bull; 2: Autostarted playback, not dependent upon player viewability settings<br/>&bull; 3: Auto-repeat based on the configuration of the player<br/>&bull; 4: JavaScript call to the JW Player API<br/>&bull; 5: Auto-advance on recommendation, search, and trending playlists<br/>&bull; 6: Auto-advance on dynamic and manual playlists</td>
  </tr>
  <tr>
    <td>Player</td>
    <td><code>player_id</code></td> 
    <td>String</td>
    <td>ID of the player on the page</td>
  </tr>
  <tr>
    <td>Playlist</td>
    <td><code>playlist_id</code></td> 
    <td>String</td>
    <td>ID of the playlist loaded into the player</td>
  </tr>
  <tr>
    <td><strong>* Playlist Type</strong></td>
    <td><code>playlist_type</code></td> 
    <td>String</td>
    <td>Type of playlist<br/><br/>&bull; Article Matching<br/>&bull; Curated<br/>&bull; Manual<br/>&bull; None<br/>&bull; Recommendations<br/>&bull; Search<br/>&bull; Trending</td>
  </tr>
  <tr>
    <td><strong>* Promotion</strong></td>
    <td><code>promotion</code></td> 
    <td>String</td>
    <td>ID of the playlist pinned into a recommendations playlist that promoted the media item played in a player</td>
  </tr>
  <tr>
    <td><strong>* Video Duration</strong></td>
    <td><code>video_duration</code></td> 
    <td></td>
    <td>Duration of the content<br/><br/>&bull; Short (under 4 mins)<br/>&bull; Medium (4-20 mins)<br/>&bull; Long (over 20 mins)</td>
  </tr>
</table>

<sup>* This premium dimension requires a JW Player Enterprise or Developer license.</sup>

<a name="date-time"></a>

### Date/Time

<table>
  <tr>
    <th>Name</th>
    <th>Dimension_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Eastern Date</td>
    <td style="width:23%"><code>eastern_date</code></td> 
    <td style="width:7%">String</td>
    <td>Date when the media item started to play within a player, using `YYYY-MM-DD` (USA - Eastern Time) format</td>
  </tr>
  <tr>
    <td><strong>* Upload Date</strong></td>
    <td><code>upload_date</code></td> 
    <td>String</td>
    <td>Date when the media item was last uploaded to the platform, using `YYYY-MM-DD` (USA - Eastern Time) format</td>
  </tr>
</table>

<sup>* This premium dimension requires a JW Player Enterprise or Developer license.</sup>

<a name="device"></a>

### Device

<table>
  <tr>
    <th>Name</th>
    <th>Dimension_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* Browser</strong></td>
    <td style="width:23%"><code>browser</code></td> 
    <td style="width:7%">String</td>
    <td>Type of browser used to watch a media item</td>
  </tr>
  <tr>
    <td>Device</td>
    <td><code>device_id</code></td> 
    <td>String</td>
    <td>Type of device used to watch a media item</td>
  </tr>
  <tr>
    <td><strong>* Platform</strong></td>
    <td><code>platform_id</code></td> 
    <td>String</td>
    <td>SDK platform in which the player was embedded</td>
  </tr>
</table>

<sup>* This premium dimension requires a JW Player Enterprise or Developer license.</sup>

<a name="geography"></a>

### Geography

<table>
  <tr>
    <th>Name</th>
    <th>Dimension_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* City</strong></td>
    <td style="width:23%"><code>city</code></td> 
    <td style="width:7%">String</td>
    <td>City from which a user accessed the media item<br/><br/>The value is based on the <a href="https://en.wikipedia.org/wiki/ISO_3166-2" target="_blank">ISO 3166-2</a> standard.</td>
  </tr>
  <tr>
    <td>Country</td>
    <td><code>country_code</code></td> 
    <td>String</td>
    <td>Two-letter country code from which a user accessed a media item<br/><br/>The value is the <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" target="_blank">ISO 3166-1 alpha-2</a> country code.</td>
  </tr>
</table>

<sup>* This premium dimension requires a JW Player Enterprise or Developer license.</sup>

<a name="placement"></a>

### Placement

<table>
  <tr>
    <th>Name</th>
    <th>Dimension_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Domain</td>
    <td style="width:23%"><code>page_domain</code></td> 
    <td style="width:7%">String</td>
    <td>Domain within which a player was embedded<br/><br/>Excluding www, all subdomains are also included.</td>
  </tr>
  <tr>
    <td><strong>* URL</strong></td>
    <td><code>page_url</code></td> 
    <td>String</td>
    <td>URL of the page within which a player was embedded</td>
  </tr>
</table>

<sup>* This premium dimension requires a JW Player Enterprise or Developer license.</sup>


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