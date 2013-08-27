Bootstrap Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes for easier use of the Bootstrap elements in your content.

## Requirements
This plugin won't do anything if you don't have website built with the [Twitter Bootstrap framework](http://getbootstrap.com/). **The plugin does not include the Bootstrap framework**.

The plugin is tested to work with ```Bootstrap version 3.0.0``` and ```WordPress 3.6```.

## Installation
To install this plugin, just download it, and drop the folder in the ```wp-content/plugins/```. Then login to WordPress and activate the plugin.

## Supported shortcodes
The plugin doesn't support all Bootstrap elements yet, but most of them.

* Grid
* Buttons
* Alerts
* Code
* Labels
* Badges
* Icons
* Tables
* Accordion
* Tabs
* Wells

## Usage

You use the shortcodes just like you would with any other shortcode, with the exception of tables, accordion and the tabs.


#### Buttons
	[button type="success" size="lg" link="#"] … [/button]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the button | optional | default, primary, success, info, warning, danger, link | default
size | The size of the button | optional | xs, sm, lg | none
xclass | Any extra classes you want to add | optional | Any text | none

#### Alerts
	[alert type="success"] … [/alert]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the alert | required | success, info, warning, danger | success
dismissable | If the alert should be dismissable | optional | true, false | false
strong | Text to display in bold at the beginning | optional | Any text | false

#### Code
	[code] … [/code]

Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
inline | display inline code | optional | true, false | false
scrollable | set a max height of 350px and provide a scroll bar | optional | true, false | false

#### Labels
	[label type="success"] … [/label]

#### Badges
	[badge type="success"] … [/badge]

#### Wells
	[well] … [/well]

#### Icons
	[icon type="arrow"]
	[icon_white type="arrow"]

#### Grid
	[row]
	  [span size="6"]
	    …
	  [/span]
	  [span size="6"]
	    …
	  [/span]
	[/row]

#### Tables
	[table type="striped" cols="#,First Name, Last Name, Username" data="1, Filip, Stefansson, filipstefansson, 2, Victor, Meyer, Pudge, 3, Måns, Ketola-Backe, mossboll"]

#### Accordion
	[collapsibles]
	  [collapse title="Collapse 1" state="active"]
	    …
	  [/collapse]
	  [collapse title="Copllapse 2"]
	    …
	  [/collapse]
	  [collapse title="Copllapse 3"]
	    …
	  [/collapse]
	[/collapsibles]

#### Tabs
	[tabs]
	  [tab title="Home"]
	    …
	  [/tab]
	  [tab title="Profile"]
	    …
	  [/tab]
	  [tab title="Messages"]
	    …
	  [/tab]
	[/tabs]
