=== Bootstrap Shortcodes for WordPress ===
Contributors: filipstefansson, nodley, FoolsRun
Tags: bootstrap, shortcode, shortcodes, responsive, grid
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 3.2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Implements Bootstrap 3 styles and components in WordPress through shortcodes.

== Description ==

###Just The Shortcodes, Please
Plenty of great WordPress plugins focus on providing or including the Bootstrap library into your site. **Bootstrap Shortcodes for WordPress** assumes you're working with a theme that already includes Bootstrap 3 and focuses on giving you a great set of shortcodes to use it with.

This plugin creates a simple, out of the way button just above the WordPress TinyMCE editor (next to the "Add Media" button) which pops up the plugin's documentation and shortcode examples for reference and handy "Insert Example" links to send the example shortcodes straight to the editor. There are no additional TinyMCE buttons to clutter up your screen, just great, easy to use shortcodes!

For questions, support, or to contribute to this plugin, check out [our GitHub project](https://github.com/filipstefansson/bootstrap-3-shortcodes)

####Updated for Bootstrap 3.2
Now supporting the changes to Responsive Utilities introduced in Bootstrap 3.2!

If you like this plugin, check out our companion plugin for Font Awesome, [Font Awesome Shortcodes](http://www.wordpress.org/plugins/font-awesome-shortcodes/)

###Supported Shortcodes
####CSS
* Grid (container, row, columns, fully responsive)
* Lead body copy
* Emphasis classes
* Code
* Tables
* Buttons
* Images
* Responsive utilities
####Components
* Button Groups
* Button Dropdowns
* Navs
* Breadcrumbs
* Labels
* Badges
* Jumbotron
* Page Header
* Thumbnails
* Alerts
* Progress Bars
* Media Objects
* List Groups
* Panels
* Wells
####JavaScript
* Tabs
* Tooltip
* Popover
* Collapse (Accordion)
* Carousel
* Modal

== Installation ==
1. Download and unzip this plugin
1. Upload the "bootstrap-3-shortcodes" folder to your site's `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create or edit a page or post and click the "B" button that appears above the editor to see the plugin's documentation!

== Frequently Asked Questions ==

= Does this plugin include Bootstrap 3? =

No, we assume you are already working with a WordPress theme that includes the Bootstrap libraries.

== Changelog ==

= 3.2.4 =
* Add Bootstrap shortcode help popup button to Distraction Free Writing Mode toolbar
* Better responsive styles for help popup button on smaller screens
* Better correction for malformed or unexpected input in [table-wrap], [tooltip], [popover], [page-header], [img], and [media-object]s
* Fix display problems for WP-Engine users

= 3.2.3 =
* Fix conflicts with other plugins, like Gravity Forms, which use Bootstrap on the WordPress back-end.

= 3.2 =
* New Features
* This release features a brand new, much easier to use popup for the documentation. We're now using Bootstrap's "modal" component rather than the soon-to-be-retired WordPress Thickbox. We've also split the documentation up into tabs so that the technical information about the plugin isn't cluttering up the shortcode reference material. This should make the plugin a little less scary for end-users.
* Added optional "target" parameter to [list-group-item]
* Added support for new "block", "inline", and "inline-block" parameters in [responsive] introduced in Bootstrap 3.2
* Remove legacy [icon-white] shortcode (it wasn't documented anyway)

* Bug Fixes
* Fixed issue with [carousel] indicators (thanks, mebdev!)
* Fix any parameters expecting "true", or "false" accepting any input as "true". Now only accepts the word "true"; other input will be ignored and read as "false".
* Fix bug that prevented CSS classes from being applied to [dropdown-item]s
* Fixed bug that completely broke [divider] in dropdowns
* Fix animated progress bar classes

= 3.1.2 =
* Tested to work in WordPress 3.9
* Fix and document collapsibles "Active" state
* Fix uninitialized variables causing errors in debug mode
* Fix "Active" tab, carousel checking, should work better now
* Fix media button icon in Internet Explorer

= 3.1.1 =
* Support new parameters introduced in Bootstrap 3.1.x
* Use custom icon-font for editor button
* Fix bug which broke Distraction Free Editing in WordPress
* Fix bug which caused [responsive] shortcodes not to work

= 3.0.3.6 =
* Significant rewrite to properly escape inputs
* [tabs] now supports "pills" and "fade" styles
* [tabs] and [carousel] now support setting a tab or image other than the first one as "active". If no tab or carousel item is set to "active" the first one is set by default.
* [panel] titles are now optional (see documentation for new shortcode parameters)
* [list-group-item] now supports optional "type" parameter (Bootstrap 3.1 only)
* [button] now supports "disabled" and "active" parameters
* [progress-bar] now supports showing labels
* Add [dropdown-header] shortcode
* [container] now includes optional "fluid" parameter (Bootstrap 3.1 only)
* [modal] now supports sizes (Bootstrap 3.1 only)
* Composer support
* Resolve errors regarding uninitialized variables experienced by some users
* Resolve image path icons for non-standard WordPress directory names
* Resolved DOMDocument errors experienced by some users (if you still see these errors or warnings please let us know)

= 3.0.3.5 =
* Add support for [container] shortcode for themes without a container defined
* Add support for [carousel] and [carousel-item] shortcodes
* Add support for "xclass" and "data" parameters to all shortcodes
* Plenty of bugfixes and code cleanup to fix common issues

= 3.0.3.2 =
* Fix help tab popup on edit pages

= 3.0.3.1 =
* Change help-tab to inline rather than iframe in to meet WordPress.org submission requirements
* Add support for images (http://getbootstrap.com/css/#images)
* Add support for progress bars (http://getbootstrap.com/components/#progress)
* Add support for page header (http://getbootstrap.com/components/#page-header
* Improve list groups, add support for linked items and custom content (http://getbootstrap.com/components/#list-group)
* Add support for button dropdowns (http://getbootstrap.com/components/#btn-dropdowns)
* Add support for breadcrumbs (http://getbootstrap.com/components/#breadcrumbs)
* Add support for button-toolbar in button groups (http://getbootstrap.com/components/#btn-groups-toolbar)
* Add support for navs (http://getbootstrap.com/components/#nav)
* Remove "strong" parameter from alerts --this should be handled in the wrapped content
* Allow arbitrary classes in columns

= 3.0.3 =
* Initial WordPress.org release
