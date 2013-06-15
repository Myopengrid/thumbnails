## Thumbnails 

Thumbnails Module for MWI

[![Build Status](https://secure.travis-ci.org/Myopengrid/thumbnails.png)](http://travis-ci.org/Myopengrid/thumbnails)

## Installation

## Usage
	
http://myproject.com/thumbnails/thumb/[size]/[path]

	
* [size] = thumbnail size widthXheight in px : 800X600, 800 is equivalent to 800X800

* [mode] = (not implemented on url yet) inbound or outbound, user inbound for preserve aspect ratio or outbound for crope

* [path]  = address image from a public folder or full url

## Example

http://myproject.com/thumbnails/thumb/150/images/photo.png

http://myproject.com/thumbnails/thumb/150/http://thesite.com/gallery/photo.png

### Html

	\Thumbnails\Html::thumbnail("/img/path/image.png", array('mode' => 'outbound', 'size' => '100x100'));
