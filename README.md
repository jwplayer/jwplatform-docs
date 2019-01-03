# JW Platform Developer Guide

## Developing Locally

#### Install [MkDocs](http://www.mkdocs.org/)

```
$ pip install mkdocs==0.16.3 --upgrade
$ pip install git+ssh://git@github.com/jwplayer/mkdocs-jwplayer --upgrade --force-reinstall
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
