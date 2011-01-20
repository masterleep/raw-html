=== ML Raw HTML ===
Contributors: masterleep
Tags: code, javascript, html, posts
Requires at least: 3.0
Tested up to: 3.0.4
Stable tag: 1.0.2

Simple, efficient, and flexible raw html support via shortcodes.

== Description ==

This plugin allows you to insert raw HTML and Javascript into your post without any tampering by the fiendish
WordPress paragraph and line break inserter.  It is based on shortcodes and avoids expensive and fragile
parsing of the post content based on regular expressions, unlike other plugins with similar functionality.

# Using the plugin

Content that should be passed through unchanged by WordPress should be contained in a [ml_raw_html] shortcode
block.  For example:

    Regular post content here...
    
    [ml_raw_html]
      <script type="text/javascript">
      function foo(bar) {
         frobozz = 'a';
         bat = bar;
      }
      </script>
    [/ml_raw_html]

    More post content...


## Multiple raw blocks

If you have multiple ml_raw_html blocks on a page, there is a slight complication.  Each block needs to have
a different id attribute to allow the implementation to accurately select the correct block of text.
For example:

    Regular post content here...

    [ml_raw_html id="1"]
      <script type="text/javascript">
      function foo(bar) {
         frobozz = 'a';
         bat = bar;
      }
      </script>
    [/ml_raw_html]

    More post content...

    [ml_raw_html id="2"]
      <script type="text/javascript">
      function foo2(bar) {
         return 5;
      }
      </script>
    [/ml_raw_html]

The id values are arbitrary, so long as they are unique on the page.

The shortcode name "ml_raw_html" and the id attribute, if present, must be all lowercase, and there cannot be any
extra whitespace inside the brackets.


== Installation ==

To install the plugin:

1. Download the ml-raw-html.zip file.
1. Unzip the file.
1. Move the ml-raw-html folder to wp-content/plugins.
1. Activate the plugin in the WordPress dashboard.

== Changelog ==

= 1.0.2 =
* Readme and version tweaks.

= 1.0.1 =
* Readme had wrong plugin name.

= 1.0 =
* First usable version.

