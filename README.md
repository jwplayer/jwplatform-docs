# JW Platform Docs

## Developing Locally

#### Install [MkDocs](http://www.mkdocs.org/)

```
$ pip install mkdocs
```

#### Install Node modules:

```
$ npm install
```

#### Make sure `theme` and `site_dir` are set to the following values in *mkdocs.yml*:

```
theme: jwplayer
site_dir: developer-guide
```

#### Run Grunt and serve via localhost:

```
$ grunt serve
```

Run `grunt` to for a full build without serving. This may be useful at times because `grunt serve` builds via Grunt's watch task, which may not always be perfect.
