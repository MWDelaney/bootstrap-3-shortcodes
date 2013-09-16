<?php

// We need a function that can add ids to HTML header tags
function retitle($match) {
    list($_unused, $h3, $title) = $match;

    $id = strtolower(strtr($title, " .", "--"));

    return "<$h3 id='$id'>$title</$h3>";
}

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require 'php_markdown/' . preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
//use \Michelf\Markdown;
use \Michelf\MarkdownExtra;

$text = file_get_contents(dirname(__FILE__) . '/../README.md');
$html = MarkdownExtra::defaultTransform($text);
?>
<!DOCTYPE html>
<html>
    <head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <title>PHP Markdown Lib - Readme</title>
    </head>
    <body>
        <div class="container">
		<?php
			# Put HTML content in the document
            $html = str_replace('<table>', '<table class="table table-striped">', $html);
            $html = preg_replace_callback("#<(h[1-6])>(.*?)</\\1>#", "retitle", $html);
            echo $html;
		?>
        </div>
    </body>
</html>