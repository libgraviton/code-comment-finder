# Comment Finder

Project to extract comments from a bunch of code and report on it. For now
This only has support for PHP files and reports are written as a bunch of
HTML files.

## Usage

This should install into ```./vendor/bin/comment_finder``` using composer.

It scans the current pwd for files and puts some reports in ```./report```.

```sh
./vendor/bin/comment_finder scan
```

## About

This was originally written to extract comments from code for review. The
code being reviewed this way is destined for near- and/or open-sourcing so
we need a way to quickly get an overview over all the 
non-code/none-whitespace parts of our codebase.

