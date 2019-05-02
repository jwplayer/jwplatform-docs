# Metrics and dimensions

<sup>Last Updated: May 1, 2019</sup>

<a name="metrics"></a>

## Metrics


A *metric* is a quantitative measurement. The following metrics are currently offered.

Some metrics require a JW Player Enterprise license. Please [contact our team](https://www.jwplayer.com/pricing/?utm_source=developer&utm_medium=CTA) to upgrade your account.

### Ads

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Ad Clicks</td>
    <td style="width:19%"><code>ad_clicks</code></td> 
    <td style="width:5%"></td>
    <td>Number of times a video ad was clicked in the player</td>
  </tr>
  <tr>
    <td style="width:21%"><strong>* Ad Completes</strong></td>
    <td style="width:19%"><code>ad_completes</code></td> 
    <td style="width:5%"></td>
    <td>Number of times a video ad was completed in the player</td>
  </tr>
  <tr>
    <td><strong>* Ad Skips</strong></td>
    <td><code>ad_skips</code></td> 
    <td></td>
    <td>Number of times a video ad was skipped in the player</td>
  </tr>
</table>

<sup>* This metric requires a JW Player Enterprise license.</sup>

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
    <td style="width:19%"><code>25_percent_completes</code></td> 
    <td style="width:5%"></td>
    <td>Number of times a view hit the 25% mark of a video<br/><br/><em>Only available for videos over 30 seconds.</em></td>
  </tr>
  <tr>
    <td>50% Completes</td>
    <td><code>50_percent_completes</code></td> 
    <td></td>
    <td>Number of times a view hit the 50% mark of a video<br/><br/><em>Only available for videos over 30 seconds.</em></td>
  </tr>
  <tr>
    <td>75% Completes</td>
    <td><code>75_percent_completes</code></td> 
    <td></td>
    <td>Number of times a view hit the 75% mark of a video<br/><br/><em>Only available for videos over 30 seconds.</em></td>
  </tr>
  <tr>
    <td>Adjusted Complete Rate</td>
    <td><code>adjusted_complete_rate</code></td> 
    <td></td>
    <td>Number of adjusted completes divided by the number of plays<br/><br/><em>Only available via Reporting API</em></td>
  </tr>
  <tr>
    <td>Adjusted Completes</td>
    <td><code>adjusted_completes</code></td> 
    <td></td>
    <td>Number of completes over 75% of the video watched used to compute the Content Score<br/><br/><em>Only available via Reporting API</em></td>
  </tr>
  <tr>
    <td><strong>* Complete Rate</strong></td>
    <td></td>
    <td></td>
    <td>Number of plays divided by the number of completes, as a percentage</td>
  </tr>
  <tr>
    <td><strong>* Content Score</strong></td>
    <td><code>content_score</code></td>
    <td></td>
    <td>Average of the play rate and complete rate</td>
  </tr>
</table>

<sup>* This metric requires a JW Player Enterprise license.</sup>

### Performance

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">3-Second Plays</td>
    <td style="width:19%"><code>3_second_plays</code></td> 
    <td style="width:5%"></td>
    <td></td>
  </tr>
  <tr>
    <td>10-Second Plays</td>
    <td><code>10_second_plays</code></td> 
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>30-Second Plays</td>
    <td><code>30_second_plays</code></td> 
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Ad Impressions</td>
    <td><code>ad_impressions</code></td> 
    <td></td>
    <td>Ad start events across all embedded players</td>
  </tr>
  <tr>
    <td>Completes</td>
    <td><code>completes</code></td> 
    <td></td>
    <td>Videos watched to completion</td>
  </tr>
  <tr>
    <td>Embeds</td>
    <td><code>embeds</code></td> 
    <td></td>
    <td>Players that have loaded on a page</td>
  </tr>
  <tr>
    <td>Play Rate</td>
    <td><code>play_rate</code></td> 
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Plays</td>
    <td><code>plays</code></td> 
    <td></td>
    <td>Video starts across all embedded players</td>
  </tr>
  <tr>
    <td>Time Watched</td>
    <td></td> 
    <td></td>
    <td>Total time watched across all your players (measured in seconds)<br/><br/><em>This metric excludes time watched for external live streams.</em></td>
  </tr>
</table>

<sup>* This metric requires a JW Player Enterprise license.</sup>

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
    <td style="width:19%"><code>ads_per_viewer</code></td> 
    <td style="width:5%"></td>
    <td>Average number of ad impressions for a unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Plays per Viewer</strong></td>
    <td><code>plays_per_viewer</code></td> 
    <td></td>
    <td>Average number of plays for each unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Time Watched per Viewer</strong></td>
    <td><code>time_watched_per_viewer</code></td> 
    <td></td>
    <td>Average amount of time watched for a unique viewer</td>
  </tr>
  <tr>
    <td><strong>* Unique Viewers</strong></td>
    <td><code>unique_viewers</code></td> 
    <td></td>
    <td>Unique users who have played at least one video</td>
  </tr>
</table>

<sup>* This metric requires a JW Player Enterprise license.</sup>

<a name="dimensions"></a>

## Dimensions

A *dimension* is an attribute of your metrics.  For example, each Play Event has several attributes that help describe it. JW Player determines what Country it took place in, what Video it was for, what device was used, etc.

Some dimensions require a JW Player Enterprise license. Please [contact our team](https://www.jwplayer.com/pricing/?utm_source=developer&utm_medium=CTA) to upgrade your account.

### Content

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Ad Schedule</td>
    <td style="width:19%"><code>ad_schedule_id</code></td> 
    <td style="width:5%"></td>
    <td>Unique ID associated with a specific ad schedule</td>
  </tr>
  <tr>
    <td><strong>* Is First Play</strong></td>
    <td><code>is_first_play</code></td> 
    <td></td>
    <td>Media was the first media item within a playlist</td>
  </tr>
  <tr>
    <td>Media</td>
    <td><code>media_id</code></td> 
    <td></td>
    <td>ID or title of the content</td>
  </tr>
  <tr>
    <td><strong>* Media Tag</strong></td>
    <td><code>tag</code></td> 
    <td></td>
    <td>Tags associated with a given piece of media</td>
  </tr>
  <tr>
    <td><strong>* Play Reason</strong></td>
    <td><code>play_reason</code></td> 
    <td></td>
    <td>How media playback began, for example: autoplay or click-to-play</td>
  </tr>
  <tr>
    <td>Player</td>
    <td><code>player_id</code></td> 
    <td></td>
    <td>ID of the player on the page</td>
  </tr>
  <tr>
    <td>Playlist</td>
    <td><code>playlist_id</code></td> 
    <td></td>
    <td>Playlist of the media loaded on the page</td>
  </tr>
  <tr>
    <td><strong>* Playlist Type</strong></td>
    <td><code>playlist_type</code></td> 
    <td></td>
    <td>Type of playlist<br/><br/>&bull; Article Matching<br/>&bull; Curated<br/>&bull; Manual<br/>&bull; None<br/>&bull; Recommendations<br/>&bull; Search<br/>&bull; Trending</td>
  </tr>
  <tr>
    <td>Promotion</td>
    <td><code>promotion</code></td> 
    <td></td>
    <td>Indicates the playlist ID which was pinned into a recommendations playlist which promoted the media being played.
</td>
  </tr>
  <tr>
    <td><strong>* Video Duration</strong></td>
    <td><code>video_duration</code></td> 
    <td></td>
    <td>Video duration of the content<br/><br/>&bull; Short (under 4 mins)<br/>&bull; Medium (4-20 mins)<br/>&bull; Long (over 20 mins)</td>
  </tr>
</table>
<sup>* This dimension requires a JW Player Enterprise license.</sup>

### Date/Time

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Eastern Date</td>
    <td style="width:19%"><code>eastern_date</code></td> 
    <td style="width:5%"></td>
    <td>Date in EST when the media started playing within a player</td>
  </tr>
  <tr>
    <td>Upload Date</td>
    <td><code>upload_date</code></td> 
    <td></td>
    <td>Date in EST the media was last uploaded to the platform</td>
  </tr>
</table>
<sup>* This dimension requires a JW Player Enterprise license.</sup>

### Device

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Browser</td>
    <td style="width:19%"><code>browser</code></td> 
    <td style="width:5%"></td>
    <td>Indicates what type of browser was used to watch a video</td>
  </tr>
  <tr>
    <td>Device</td>
    <td><code>device_id</code></td> 
    <td></td>
    <td>Indicates what type of device was used to watch a video</td>
  </tr>
  <tr>
    <td>Platform</td>
    <td><code>platform_id</code></td> 
    <td></td>
    <td>Particular SDK platform the player was embedded in.</td>
  </tr>
</table>

### Geography

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%"><strong>* City</strong></td>
    <td style="width:19%"><code>city</code></td> 
    <td style="width:5%"></td>
    <td>City this user was accessing the video from</td>
  </tr>
  <tr>
    <td>Country</td>
    <td><code>country_code</code></td> 
    <td></td>
    <td>Code indicating the country this user was accessing the video from</td>
  </tr>
</table>
<sup>* This dimension requires a JW Player Enterprise license.</sup>

### Placement

<table>
  <tr>
    <th>Name</th>
    <th>Metric_ID</th> 
    <th>Type</th>
    <th>Description</th>
  </tr>
  <tr>
    <td style="width:21%">Domain</td>
    <td style="width:19%"><code>page_domain</code></td> 
    <td style="width:5%"></td>
    <td>Domain this player was embedded in. If there is a subdomain it will be included unless its www
    </td>
  </tr>
  <tr>
    <td><strong>* URL</strong></td>
    <td><code>page_url</code></td> 
    <td></td>
    <td>Particular page URL this player was embedded in</td>
  </tr>
</table>
<sup>* This dimension requires a JW Player Enterprise license.</sup>