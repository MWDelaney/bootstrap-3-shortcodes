Bootstrap Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes for easier use of the Bootstrap elements in your content.

## Requirements
This plugin won't do anything if you don't have website built with the [Twitter Bootstrap framework](http://getbootstrap.com/). **The plugin does not include the Bootstrap framework**.

The plugin is tested to work with ```Bootstrap version 3.0.0``` and ```WordPress 3.6```.

## Supported shortcodes
The plugin doesn't support all Bootstrap elements yet, but most of them.

### CSS
* [Grid](#grid)
* [Lead body copy](#lead-body-copy)
* [Emphasis classes](#emphasis-classes)
* [Code](#code)
* [Tables](#tables)
* [Buttons](#buttons)
* [Responsive utilities](#responsive-utilities)

### Components
* [Icons](#icons)
* [Button Groups](#button-groups)
* [Labels](#labels)
* [Badges](#badges)
* [Jumbotron](#jumbotron)
* [Thumbnails](#thumbnails)
* [Alerts](#alerts)
* [Media Objects](#media-objects)
* [List Groups](#list-groups)
* [Panels](#panels)
* [Wells](#wells)

### JavaScript
* [Tabs](#tabs)
* [Tooltip](#tooltip)
* [Popover](#popover)
* [Collapse (Accordion)](#collapse)
* [Modal](#modal)


# Usage

## CSS

### Grid
	[row]
	  [column md="6"]
	    …
	  [/column]
	  [column md="6"]
	    …
	  [/column]
	[/row]


#### [row] parameters
None

#### [column] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xs | Size of column on extra small screens (less than 768px) | optional | 1-12 | false
sm | Size of column on small screens (greater than 768px) | optional | 1-12 | false
md | Size of column on medium screens (greater than 992px) | optional | 1-12 | false
lg | Size of column on large screens (greater than 1200px) | optional | 1-12 | false
offset_xs | Offset on extra small screens | optional | 1-12 | false
offset_sm | Offset on small screens | optional | 1-12 | false
offset_md | Offset on column on medium screens | optional | 1-12 | false
offset_lg | Offset on column on large screens | optional | 1-12 | false
pull_xs | Pull on extra small screens | optional | 1-12 | false
pull_sm | Pull on small screens | optional | 1-12 | false
pull_md | Pull on column on medium screens | optional | 1-12 | false
pull_lg | Pull on column on large screens | optional | 1-12 | false
push_xs | Push on extra small screens | optional | 1-12 | false
push_sm | Push on small screens | optional | 1-12 | false
push_md | Push on column on medium screens | optional | 1-12 | false
push_lg | Push on column on large screens | optional | 1-12 | false

[Bootstrap grid documentation](http://getbootstrap.com/css/#grid).

### Lead body copy
	[lead] … [/lead]

#### [lead] parameters
None

[Bootstrap body copy documentation](http://getbootstrap.com/css/#type-body-copy)

### Emphasis classes
	[emphasis type="success"] … [/emphasis]

#### [emphasis] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of label to display | required | muted, primary, success, info, warning, danger | muted

[Bootstrap emphasis classes documentation](http://getbootstrap.com/css/#type-emphasis)

### Code
	[code] … [/code]

#### [code] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
inline | Display inline code | optional | true, false | false
scrollable | Set a max height of 350px and provide a scroll bar. Not usable with inline="true".  | optional | true, false | false

[Bootstrap code documentation](http://getbootstrap.com/css/#code)

### Tables
	[table type="striped" cols="#,First Name, Last Name, Username" data="1, Filip, Stefansson, filipstefansson, 2, Victor, Meyer, Pudge, 3, Måns, Ketola-Backe, mossboll"]

#### [table] parameters

[Bootstrap table documentation](http://getbootstrap.com/css/#tables)

### Buttons
	[button type="success" size="lg" link="#"] … [/button]

#### [button] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the button | optional | default, primary, success, info, warning, danger, link | default
size | The size of the button | optional | xs, sm, lg | none
block | Whether the button should be a block-level button | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
link | The url you want the button to link to | optional | any valid link | none
target | Target for the link | optional | any valid target | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example below). | optional | any text | none

[Bootstrap button documentation](http://getbootstrap.com/css/#buttons)

### Responsive Utilities
	[responsive visible="sm xs" hidden="lg"] … [/responsive]

#### [reponsive] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
visible | Sizes at which this element is visible (separated by spaces) | optional | xs, sm, md, lg  | false
hidden | Sizes at which this element is hidden (separated by spaces) | optional | xs, sm, md, lg  | false

[Bootstrap emphasis classes documentation](http://getbootstrap.com/css/#type-emphasis)

## Components

### Icons
	[icon type="arrow"]

#### [icon] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of icon you want to display | required | See Bootstrap docs | none

[Bootstrap Glyphicons documentation](http://getbootstrap.com/components/#glyphicons)

### Button Groups
	[button-group size="lg" justified="" vertical=""]
        [button link="#"] … [/button]
        [button link="#"] … [/button]
        [button link="#"] … [/button]
	[/button-group]

#### [button-group] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
size | The size of the button group | optional | xs, sm, lg | none
justified | Whether button group is justified | optional | true, false | false
vertical | Whether button group is vertical | optional | true, false | false

[Bootstrap button groups documentation](http://getbootstrap.com/css/#btn-groups)

### Labels
	[label type="success"] … [/label]

#### [label] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of label to display | optional | default, primary, success, info, warning, danger | default

[Bootstrap label documentation](http://getbootstrap.com/components/#labels)

### Badges
	[badge right="true"] … [/badge]

#### [badge] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
right | Whether the badge should align to the right of its container | optional | true, false | false

[Bootstrap badges documentation](http://getbootstrap.com/components/#badges)

### Jumbotron
    [jumbotron title="My Jumbotron"] … [/jumbotron]

#### [jumbotron] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The jumbotron title | optional | Any text | none

[Bootstrap jumbotron documentation](http://getbootstrap.com/components/#jumbotron)

### Thumbnails
    [thumbnail] … [/thumbnail]
    [thumbnail] … [/thumbnail]
    [thumbnail] … [/thumbnail]

#### [thumbnail] parameters
None

[Bootstrap thumbnails documentation](http://getbootstrap.com/components/#thumbnails)

### Alerts
	[alert type="success"] … [/alert]

#### [alert] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the alert | required | success, info, warning, danger | success
dismissable | If the alert should be dismissable | optional | true, false | false
strong | Text to display in bold at the beginning | optional | any text | false

[Bootstrap alert documentation](http://getbootstrap.com/components/#alerts)

### Media Objects
    [media]
	  [media-object pull="right"]
	    …
	  [/media-object]
	  [media-body title="Testing"]
	    …
	  [/media-body]
    [/media]

#### [media] parameters
None

#### [media-object] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
pull | Whether the image pulls to the left or right | optional | left, right | right

#### [media-body] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The object title | required | Any text | none

__NOTE: media-object should contain an image, or linked image, inserted using the WordPress TinyMCE editor__

[Bootstrap media objects documentation](http://getbootstrap.com/components/#media)

### List Groups
	[list-group]
	  [list-group-item]
	    …
	  [/list-group-item]
	  [list-group-item]
	    …
	  [/list-group-item]
	  [list-group-item]
	    …
	  [/list-group-item]
	[/list-group]

#### [list-group] parameters
None

[Bootstrap list groups documentation](http://getbootstrap.com/components/#list-group)

### Panels
	[panel type="info" title="Panel Title" footer="Footer text"] … [/panel]

#### [panel] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the panel | optional | default, primary, success, info, warning, danger, link | default
title | The panel title | required | any text | none
footer | The panel footer text if desired | optional | any text | none

[Bootstrap panels documentation](http://getbootstrap.com/components/#panels)

### Wells
	[well size="sm"] … [/well]

#### [well] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
size | Modifies the amount of padding inside the well | optional | sm, lg | normal

[Bootstrap wells documentation](http://getbootstrap.com/components/#wells)

## Javascript

### Tabs
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

#### [tabs] parameters
None

#### [tab] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The title of the tab | required | any text | false

[Bootstrap tabs documentation](http://getbootstrap.com/javascript/#tabs)

### Tooltip
	[tooltip title="I'm the title" placement="right"] … [/tooltip]

#### [tooltip] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The text of the tooltip | required | any text | none
placement | The placement of the tooltip | optional | left, top, bottom, right | top
animation | apply a CSS fade transition to the tooltip | optional | any text | none
html | Insert HTML into the tooltip | optional | true, false | false

[Bootstrap tooltip documentation](http://getbootstrap.com/javascript/#tooltips)

### Popover
	[popover title="I'm the title" content="And here's some amazing content. It's very engaging. right?" placement="right"] … [/popover]

#### [popover] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The title of the popover | optional | any text | none
text | The text of the popover | required | any text | none
placement | The placement of the popover | optional | left, top, bottom, right | top
animation | apply a CSS fade transition to the tooltip | optional | any text | none
html | Insert HTML into the tooltip | optional | true, false | false

[Bootstrap popover documentation](http://getbootstrap.com/javascript/#popovers)

### Collapse (Accordion)
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

#### [collapsibles] parameters
None

#### [collapse] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The title of the collapsible, visible when collapsed | required | any text | false
type | The type of the panel | optional | default, primary, success, info, warning, danger, link | default
active | Whether the tab is expanded at load time | optional | active | false

[Bootstrap collapse documentation](http://getbootstrap.com/javascript/#collapse)

### Modal
    [modal text="This is my modal" title="Modal Title Goes Here" xclass="btn btn-primary btn-large"]
        …
        [modal-footer]
            [button type="primary" link="#" data="dismiss,modal"]Dismiss[/button]
        [/modal-footer]
    [/modal]

#### [modal] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
text | Text of the modal trigger link | required | any text  | none
title | Title of the modal popup | required | any text | none
xclass | Any extra classes you want to add to the trigger link | optional | any text | none

#### [modal-footer] parameters
None

[Bootstrap modal documentation](http://getbootstrap.com/javascript/#modals)
