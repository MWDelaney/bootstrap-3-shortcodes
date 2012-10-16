Bootstrap Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes for easier use of the Bootstrap elements in your content.

## Requirements
This plugin won't do anything if you don't have website built with the [Twitter Bootstrap framework](http://twitter.github.com/bootstrap/). **The plugin does not include the Bootstrap framework**.

The plugin is tested to work with ```Bootstrap version 2.1.1``` and ```WordPress 3.4.2```.

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
	[button type="success" size="large" link="#"] … [/button]

#### Alerts
	[alert type="success"] … [/alert]

#### Code
	[code] … [/code]

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