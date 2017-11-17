# JW Platform Developer Guide

## Developing Locally

#### Install [MkDocs](http://www.mkdocs.org/)

```
$ pip install mkdocs
```

#### Install Node modules:

```
$ npm install
```

#### Install Grunt globally:

```
$ npm install grunt -g cli
```

#### Run Grunt and serve via localhost:

```
$ grunt serve
```

Run `grunt` to for a full build without serving. This may be useful at times because `grunt serve` builds via Grunt's watch task, which may not always be perfect.

## CDN Purge

Use the following URL to purge the CDN for release notes: /data/release-notes/jw-platform.json


## Linux Setup

- NPM 5.5.1
- Mkdocs 0.15.1
- grunt-cli v1.2.0                                           
- grunt v0.4.5      

## Release Notes Build Process

![Release Notes Build Process](release-notes-build.png)
