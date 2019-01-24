# JW Platform Developer Guide

## Developing Locally

#### Install [MkDocs](http://www.mkdocs.org/)

```
$ pip install mkdocs
$ pip install markdown-fenced-code-tabs
```

#### Install Node modules:

```
$ yarn install
```

#### Install Grunt globally:

```
$ npm install grunt -g cli
```

#### Run Grunt and serve via localhost:

```
$ mkdocs build
$ grunt serve
```

Run `grunt` to for a full build without serving. This may be useful at times because `grunt serve` builds via Grunt's watch task, which may not always be perfect.
