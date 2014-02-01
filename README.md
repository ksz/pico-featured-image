Pico Featured Image Plugin
===============================

This plugin enables the use of the Featured Image on the content of the Pico.

## Installation

`pico_featured_image.php` in `pico/plugins`;

## Basic usage

Please prepare to `/content/images/post_thumbnails` the image with the same name as the page that uses the thumbnail.  
You must also be the same as the page directory structure.

```
Page Path: `/content/posts/apple.md`  
Thumbnail File Path: `/content/images/post_thumbnails/posts/apple.png`
```

Format of the thumbnail image supports png/jpg/gif.

## Example

your_theme/index.html
```html
{% for page in pages %}
  {% if page.title %}
  <div class="post">
    <h3><a href="{{ page.url }}">{{ page.title }}</a></h3>
    <a href='{{ page.url }}' class="thumbnail"><img src='{{ page.thumbnail }}'></a>
    <p class="meta">{{ page.date_formatted }}</p>
    <p class="excerpt">{{ page.excerpt }}</p>
  </div>
  {% endif %}
{% endfor %}
```

## Advanced usage

By `Thumbnail:` is specified in the meta tags of the page, it will override this by ignoring the default path.

```
/*
Title: Example
Description: This is example page.
Date: 2013/1/19
Thumbnail: /content/images/apple.png
*/
```

## Configuration

You can change the defaults, by editing your `config.php` file.

```php
$config['thumb_url'] = 'content/images/post_thumbnails'; // default
```

## License

MIT.
