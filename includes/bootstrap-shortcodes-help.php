<?php

// We need a function that can add ids to HTML header tags
function retitle($match) {
    list($_unused, $h3, $title) = $match;

    $id = strtolower(strtr($title, " .", "--"));

    return "<$h3 id='$id'>$title</$h3>";
}

//$thisfile = realpath(dirname(__FILE__));
# Install PSR-0-compatible class autoloader
//spl_autoload_register(function($class){
//    require dirname(__FILE__) . '/php_markdown/' . preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
//});
require_once 'php_markdown/Michelf/MarkdownExtra.inc.php';
# Get Markdown class
//use \Michelf\Markdown;
use \Michelf\MarkdownExtra;

$text = file_get_contents(dirname(__FILE__) . '/../README.md');
$html = MarkdownExtra::defaultTransform($text);
?>

<script>
    jQuery(document).ready(function() {
        jQuery(".insert-code").click(function() {
            var example = jQuery( this ).parent().prev().find("code").text();
            var lines = example.split('\n');
            var paras = '';
            jQuery.each(lines, function(i, line) {
                if (line) {
                    paras += line + '<br>';
                }
            });
            var win = window.dialogArguments || opener || parent || top;
            win.send_to_editor(paras);
        });
    });
</script>
        <div style="display:none;" id="bootstrap-shortcodes-help-popup">
            <div id="bootstrap-shortcodes-help">
            <?php
                # Put HTML content in the document
                $html = preg_replace('/(<a href="http:[^"]+")>/is','\\1 target="_blank">',$html);
                $html = str_replace('<table>', '<table class="table table-striped">', $html);
                $html = str_replace('<ul>', '<div class="list-group">', $html);
                $html = str_replace('</ul>', '</div">', $html);
                $html = str_replace('<li><a ', '<a class="list-group-item" ', $html);
                $html = str_replace('</li>', '', $html);
                $html = preg_replace_callback("#<(h[1-6])>(.*?)</\\1>#", "retitle", $html);
                $html = str_replace('</pre>', '</pre><p><button class="btn btn-primary btn-sm insert-code">Insert Example <i class="glyphicon glyphicon-share-alt"></i></button></p>', $html);
                echo $html;
            ?>
            </div>
        </div>
