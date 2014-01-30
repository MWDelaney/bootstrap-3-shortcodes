Bootstrap Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes for easier use of the Bootstrap elements in your content.

## Requirements
This plugin won't do anything if you don't have WordPress theme built with the [Bootstrap](http://getbootstrap.com/) framework. **This plugin does not include the Bootstrap framework**.

The plugin is tested to work with ```Bootstrap 3``` and ```WordPress 3.8```.

## Supported shortcodes

### CSS
* [Grid](#grid)
* [Lead body copy](#lead-body-copy)
* [Emphasis classes](#emphasis-classes)
* [Code](#code)
* [Tables](#tables)
* [Buttons](#buttons)
* [Images](#images)
* [Responsive utilities](#responsive-utilities)

### Components
* [Icons](#icons)
* [Button Groups](#button-groups)
* [Button Dropdowns](#button-dropdowns)
* [Navs](#navs)
* [Breadcrumbs](#breadcrumbs)
* [Labels](#labels)
* [Badges](#badges)
* [Jumbotron](#jumbotron)
* [Page Header](#page-header)
* [Thumbnails](#thumbnails)
* [Alerts](#alerts)
* [Progress Bars](#progress-bars)
* [Media Objects](#media-objects)
* [List Groups](#list-groups)
* [Panels](#panels)
* [Wells](#wells)

### JavaScript
* [Tabs](#tabs)
* [Tooltip](#tooltip)
* [Popover](#popover)
* [Collapse (Accordion)](#collapse-(accordion))
* [Carousel](#carousel)
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
    
The container component is also supported in case your theme doesn't incude a container.

	[container]
	  [row]
	    [column md="6"]
	      …
	    [/column]
	    [column md="6"]
	      …
	    [/column]
	  [/row]
	[/container]

#### [container] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [row] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

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
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap grid documentation](http://getbootstrap.com/css/#grid).

### Lead body copy
	[lead] … [/lead]

#### [lead] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap body copy documentation](http://getbootstrap.com/css/#type-body-copy)

### Emphasis classes
	[emphasis type="success"] … [/emphasis]

#### [emphasis] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of label to display | required | muted, primary, success, info, warning, danger | muted
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap emphasis classes documentation](http://getbootstrap.com/css/#type-emphasis)

### Code
	[code] … [/code]

#### [code] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
inline | Display inline code | optional | true, false | false
scrollable | Set a max height of 350px and provide a scroll bar. Not usable with inline="true".  | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap code documentation](http://getbootstrap.com/css/#code)

### Tables
	[table-wrap bordered="true" striped="true"]
        
        Standard HTML table code goes here.
        
    [/table-wrap]

#### [table-wrap] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
bordered | Set "bordered" table style (see Bootstrap documentation) | optional | true, false | false
striped | Set "striped" table style (see Bootstrap documentation) | optional | true, false | false
hover | Set "hover" table style (see Bootstrap documentation) | optional | true, false | false
condensed | Set "condensed" table style (see Bootstrap documentation) | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap table documentation](http://getbootstrap.com/css/#tables)

### Buttons
	[button type="success" size="lg" link="#"] … [/button]

#### [button] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the button | optional | default, primary, success, info, warning, danger, link | default
size | The size of the button | optional | xs, sm, lg | none
block | Whether the button should be a block-level button | optional | true, false | false
dropdown | Whether the button triggers a dropdown menu (see [Button Dropdowns](#button-dropdowns)) | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
link | The url you want the button to link to | optional | any valid link | none
target | Target for the link | optional | any valid target | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap button documentation](http://getbootstrap.com/css/#buttons)

### Images
	[img type="circle" responsive="true"] … [/img]

Wrap any number of HTML image tags or images inserted via the WordPress media manager.
#### [img] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The effect to apply to wrapped images | optional | rounded, circle, thumbnail | false
responsive | Make the wrapped images responsive | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap images documentation](http://getbootstrap.com/css/#images)

### Responsive Utilities
	[responsive visible="sm xs" hidden="lg"] … [/responsive]

#### [reponsive] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
visible | Sizes at which this element is visible (separated by spaces) | optional | xs, sm, md, lg  | false
hidden | Sizes at which this element is hidden (separated by spaces) | optional | xs, sm, md, lg  | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap emphasis classes documentation](http://getbootstrap.com/css/#type-emphasis)

## Components

### Icons
	[icon type="arrow"]

#### [icon] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of icon you want to display | required | See Bootstrap docs | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap Glyphicons documentation](http://getbootstrap.com/components/#glyphicons)

### Button Groups
#### Basic example
	[button-group size="lg" justified="" vertical=""]
        [button link="#"] … [/button]
        [button link="#"] … [/button]
        [button link="#"] … [/button]
	[/button-group]
    
#### Button toolbar
    [button-toolbar]
    	[button-group]
            [button link="#"] … [/button]
            [button link="#"] … [/button]
            [button link="#"] … [/button]
    	[/button-group]
    	[button-group]
            [button link="#"] … [/button]
            [button link="#"] … [/button]
            [button link="#"] … [/button]
    	[/button-group]
    	[button-group]
            [button link="#"] … [/button]
    	[/button-group]
    [/button-toolbar]

#### [button-group] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
size | The size of the button group | optional | xs, sm, lg | none
justified | Whether button group is justified | optional | true, false | false
vertical | Whether button group is vertical | optional | true, false | false
dropup | **Must correspond with the use of [dropdown]** | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [button-toolbar] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap button groups documentation](http://getbootstrap.com/css/#btn-groups)

### Button Dropdowns
Button Dropdowns can be accomplished by combining the [button-group] shortcode, the "data" parameters of the [button] shortcode, and [dropdown] shortcode as follows.

#### Single button dropdowns
    [button-group]
        [button link="#" dropdown="true" data="toggle,dropdown"] … [caret][/button]
        [dropdown]
            [dropdown-item link="#"] … [/dropdown-item]
            [divider]
            [dropdown-item link="#"] … [/dropdown-item]
        [/dropdown]
    [/button-group]

#### Split button dropdowns
    [button-group]
        [button link="#"] … [/button]
        [button dropdown="true" data="toggle,dropdown"][caret][/button]
        [dropdown]
            [dropdown-item link="#"] … [/dropdown-item]
            [divider]
            [dropdown-item link="#"] … [/dropdown-item]
        [/dropdown]
    [/button-group]

#### Dropup variation
    [button-group dropup="true"]
        [button link="#"] … [/button]
        [button dropdown="true" data="toggle,dropdown"][caret][/button]
        [dropdown]
            [dropdown-item link="#"] … [/dropdown-item]
            [divider]
            [dropdown-item link="#"] … [/dropdown-item]
        [/dropdown]
    [/button-group]  

#### [dropdown] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [dropdown-item] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
link | The url you want the dropdown-item to link to | optional | any valid link | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [caret] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [divider] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap button dropdowns documentation](http://getbootstrap.com/components/#btn-dropdowns)

### Navs
    [nav type="pills"]
        [nav-item link="#"] … [/nav-item]
        [nav-item link="#"] … [/nav-item]
        [nav-item link="#"] … [/nav-item]
    [/nav]

#### Nav with dropdowns
    [nav type="pills"]
        [nav-item link="#" active="true"] … [/nav-item]
        [nav-item dropdown="true" link="#"] … [caret]
            [dropdown]
                [dropdown-item link="#"] … [/dropdown-item]
                [dropdown-item link="#"] … [/dropdown-item]
            [/dropdown]
        [/nav-item]
    [/nav]

#### [nav] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of nav | required | tabs, pills | tabs
stacked | Whether the nav is stacked (should be used with "pills" type | optional | true, false | false
justified | Whether the nav is justified | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [nav-item] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
link | The url you want the dropdown-item to link to | optional | any valid link | none
active | Whether the item has the "active" style applied | optional | true, false | false
disabled | Whether the item is disabled | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap button navs documentation](http://getbootstrap.com/components/#nav)


### Breadcrumbs
	[breadcrumb]
        [breadcrumb-item link="#"] … [/breadcrumb-item]
        [breadcrumb-item link="#"] … [/breadcrumb-item]
        [breadcrumb-item link="#"] … [/breadcrumb-item]
	[/breadcrumb]

#### [breadcrumb] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [breadcrumb-item] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
link | The url you want the breadcrumb-item to link to | optional | any valid link | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap breadcrumbs documentation](http://getbootstrap.com/components/#breadcrumbs)

### Labels
	[label type="success"] … [/label]

#### [label] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of label to display | optional | default, primary, success, info, warning, danger | default
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap label documentation](http://getbootstrap.com/components/#labels)

### Badges
	[badge right="true"] … [/badge]

#### [badge] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
right | Whether the badge should align to the right of its container | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap badges documentation](http://getbootstrap.com/components/#badges)

### Jumbotron
    [jumbotron title="My Jumbotron"] … [/jumbotron]

#### [jumbotron] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The jumbotron title | optional | Any text | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap jumbotron documentation](http://getbootstrap.com/components/#jumbotron)

### Page Header
    [page-header] … [/page-header]

Automatically inserts H1 tag if not present
#### [page-header] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap page-header documentation](http://getbootstrap.com/components/#page-header)

### Thumbnails
    [thumbnail] … [/thumbnail]
    [thumbnail] … [/thumbnail]
    [thumbnail] … [/thumbnail]

#### [thumbnail] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap thumbnails documentation](http://getbootstrap.com/components/#thumbnails)

### Alerts
	[alert type="success"] … [/alert]

#### [alert] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the alert | required | success, info, warning, danger | success
dismissable | If the alert should be dismissable | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap alert documentation](http://getbootstrap.com/components/#alerts)

### Progress Bars
	[progress striped="true"]
        [progress-bar percent="50"]
        [progress-bar percent="25" type="success"]
    [/progress]

#### [progress] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
striped | Whether enclosed progress bars will be striped | optional | true, false | false
animated | Whether enclosed progress bars will be animated | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [progress-bar] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
percent | The percentage amount to show in the progress bar | required | any number between 0 and 100 | false
type | The type of the progress bar | optional | default, primary, success, info, warning, danger  | default
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap progress bars documentation](http://getbootstrap.com/components/#progress)


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
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [media-object] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
pull | Whether the image pulls to the left or right | optional | left, right | right
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [media-body] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The object title | required | Any text | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

__NOTE: media-object should contain an image, or linked image, inserted using the WordPress TinyMCE editor__

[Bootstrap media objects documentation](http://getbootstrap.com/components/#media)

### List Groups

#### Basic Example
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

#### Linked Items
	[list-group linked="true"]
	  [list-group-item link="#" active="true"]
	    …
	  [/list-group-item]
	  [list-group-item link="#"]
	    …
	  [/list-group-item]
	  [list-group-item link="#"]
	    …
	  [/list-group-item]
	[/list-group]

#### Custom Content
	[list-group linked="true"]
	  [list-group-item link="#" active="true"]
	    [list-group-item-heading]…[/list-group-item-heading]
        [list-group-item-text]…[/list-group-item-text]
	  [/list-group-item]
	  [list-group-item link="#"]
	    [list-group-item-heading]…[/list-group-item-heading]
        [list-group-item-text]…[/list-group-item-text]
      [/list-group-item]
	  [list-group-item link="#"]
	    [list-group-item-heading]…[/list-group-item-heading]
        [list-group-item-text]…[/list-group-item-text]
	  [/list-group-item]
	[/list-group]

#### [list-group] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
linked | Whether this is a linked list group, or a standard one | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [list-group-item] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
link | The url you want the list item to link to **Must correspond with the "linked" parameter in [list-group]** | optional | any text | false
active | Whether the item has the "active" style applied | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [list-group-item-heading] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [list-group-item-text] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap list groups documentation](http://getbootstrap.com/components/#list-group)

### Panels
	[panel type="info" title="Panel Title" footer="Footer text"] … [/panel]

#### [panel] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
type | The type of the panel | optional | default, primary, success, info, warning, danger, link | default
title | The panel title | required | any text | none
footer | The panel footer text if desired | optional | any text | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap panels documentation](http://getbootstrap.com/components/#panels)

### Wells
	[well size="sm"] … [/well]

#### [well] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
size | Modifies the amount of padding inside the well | optional | sm, lg | normal
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

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
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [tab] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The title of the tab | required | any text | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

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
	  [collapse title="Collapse 2"]
	    …
	  [/collapse]
	  [collapse title="Collapse 3"]
	    …
	  [/collapse]
	[/collapsibles]

#### [collapsibles] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [collapse] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
title | The title of the collapsible, visible when collapsed | required | any text | false
type | The type of the panel | optional | default, primary, success, info, warning, danger, link | default
active | Whether the tab is expanded at load time | optional | true, false | false
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap collapse documentation](http://getbootstrap.com/javascript/#collapse)

### Carousel
	[carousel]
        [carousel-item] … [/carousel-item]
        [carousel-item] … [/carousel-item]
        [carousel-item] … [/carousel-item]
	[/carousel]

[carousel-item] wraps an HTML image tag or image inserted via the WordPress editor.
#### [carousel] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [carousel-item] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
caption | This carousel slide's caption | optional | Any text | none
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap carousel documentation](http://getbootstrap.com/javascript/#carousel)


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
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

#### [modal-footer] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
xclass | Any extra classes you want to add | optional | any text | none
data | Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at [Button Dropdowns](#button-dropdowns)). | optional | any text | none

[Bootstrap modal documentation](http://getbootstrap.com/javascript/#modals)
