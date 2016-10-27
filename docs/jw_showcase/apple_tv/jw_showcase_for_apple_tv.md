#Getting Started with JW Showcase for Apple TV

JW Showcase is a sample application that leverages playlists from JW Platform to distribute your content across platforms. This guide will provide instructions for getting set up with our Apple TV app.

We recommend cloning the JW Showcase source code within Github. Modifying the cloned source gives you greater control over the app framework and allows you to keep your Showcase app in sync with our source repository as we add new features and bug fixes. For instructions on basic configuration of the precompiled static app, see our Support article.

!!!important
The JW Showcase for Apple TV app is only supported on 4th Generation (2015) Apple TV devices.
!!!

##Download the latest version

Clone the source code from: `https://github.com/jwplayer/jw-showcase-appletv`

##Configure Your App

Within the `jwplayer-appletv-web-app/resources/configs` folder, you'll need to rename the `VCyJXbpY` directory with your account API key.

![JW Showcase Config](/images/appletv-configs.png)

To locate your account API key, navigate to "Properties" under "Account" and click the settings icon next to the property you wish to access content from. Your API key can be copied from the "API Credentials" section.

![JW Dashboard API Key](/images/account-api-key.png)

Next, open the config.json file in any text editor and replace the default playlist IDs with your own playlist IDs from your content library hosted in JW Platform.

    {
	  "playlists": [
	    "K6Sl8yPJ",
	    "BXatQw7p",
	    "E12RS6r7"
	  ],
	  "featuredPlaylist": "1AxTdxJn",


Navigate to “Playlists” under the “Lists” section of the dashboard.

![JW Dashboard Playlists](/images/dashboard-playlists.png)

Click into any playlist you wish to feature in your app and grab the playlist ID from the top of the playlist detail page.

![JW Playlists ID](/images/playlist-id.png)

##Branding Your App

In the config.json file, you can set the background color of the app, using a hex value, to match your branding. 

``` 
"backgroundColor": "#7e0023",
```

The config.json also looks for a "splashScreen" and "bannerImage" that can be replaced with your own images.

```
"splashScreen": "images/jw-main.png",
"bannerImage": "images/jw-header.png",
```

Image | Description | Recommended Size
------------ | ------------- | -------------
**splashScreen** | Shown while app is loading | 1920x1080
**bannerImage** | Header image show on app home screen | 1920x400

##Xcode Configuration

!!!important
Apple's developer tool, Xcode is required to configure JW Showcase for Apple TV
!!!

Open the `jwplayer-appletv-tvos-app/jwplayer-for-tv.xcodeproj` project in Xcode.

Open the AppDelegate.swift file and change the baseURL variable to your web app server location.

![Xcode Configuration Swift File](/images/xcode-swift-file.png)

Next, open the Info.plist file and change the "jwplayer.account_key" value to your account API key and the "bundle name" to your desired app name.

![Xcode Configuration Info file](/images/xcode-info-file.png)

Lastly, open the "Assets.xcassets" bundle and replace the top shelf and default app icon assets with your own images. For image specs, see our [AppleTV Branding Guidelines](https://github.com/jwplayer/jw-showcase-appletv/blob/master/jwplayer-appletv-app-branding.pdf).

![Xcode Configuration Assets bundle](/images/xcode-assets-bundle.png)

##Building Your App

We recommend running the app in the Xcode Apple TV emulator to test that everything is configured properly. After you've ensured that your app is configued properly, build your app.

To submit your app to the Apple App Store see [Preparing Your tvOS App for Submission](https://developer.apple.com/tvos/submit/) guidelines.

