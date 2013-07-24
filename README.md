# Comment Finder

Project to extract comments from a bunch of code and report on it. For now
this only has support for PHP files and reports are written as multiple
HTML files.

## Usage

This should install into ```./vendor/bin/comment_finder``` using composer.

It scans the current working directory for files and puts some reports in
the ```./report``` directory.

```sh
./vendor/bin/comment_finder scan
```

## About

This was originally written to extract comments from code for review. The
code being reviewed this way is destined for near- and/or open-sourcing so
we need a way to quickly get an overview over all the 
non-code/none-whitespace parts of our codebase.

