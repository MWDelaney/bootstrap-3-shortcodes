<?php

// We need a function that can add ids to HTML header tags
function retitle($match) {
    list($_unused, $h3, $title) = $match;

    $id = strtolower(strtr($title, " .", "--"));

    return "<$h3 id='$id'>$title</$h3>";
}

$thisfile = realpath(dirname(__FILE__));
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".insert-code").click(function() {
            var example = $( this ).parent().prev().find("code").text();
            var lines = example.split('\n');
            var paras = '';
            $.each(lines, function(i, line) {
                if (line) {
                    paras += line + '<br>';
                }
            });
            var win = window.dialogArguments || opener || parent || top;
            win.send_to_editor(paras);
        });
    });
</script>
        <title>Bootstrap Shortcodes Documentation</title>
    </head>
    <body>
        <div class="container">
		<?php
			# Put HTML content in the document
            $html = preg_replace('/(<a href="http:[^"]+")>/is','\\1 target="_blank">',$html);
            $html = str_replace('<table>', '<table class="table table-striped">', $html);
            $html = preg_replace_callback("#<(h[1-6])>(.*?)</\\1>#", "retitle", $html);
            $html = str_replace('</pre>', '</pre><p><button class="btn btn-primary btn-sm insert-code">Insert Example <i class="glyphicon glyphicon-share-alt"></i></button></p>', $html);
            echo $html;
		?>
        </div>
    </body>
</html>
