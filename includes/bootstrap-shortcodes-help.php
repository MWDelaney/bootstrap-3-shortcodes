<?php

// We need a function that can add ids to HTML header tags
function retitle($match) {
    list($_unused, $h3, $title) = $match;

    $id = strtolower(strtr($title, " .", "--"));

    return "<$h3 id='$id'>$title</$h3>";
}

$html = file_get_contents(dirname(__FILE__) . '/help/readme.html');
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
<script type="text/javascript">
    jQuery( '.bootstrap-shortcodes-button' ).each( function( index, value ) {
    var h = window.innerHeight * .85;
    var href = jQuery( this ).attr('href');
    var find = 'height=650';
    var replace = '&height='+h;
    href = href.replace( find, replace )
    jQuery( this ).attr( 'href', href );
    } );
</script>
        <div style="display:none;" id="bootstrap-shortcodes-help-popup">
            <div id="bootstrap-shortcodes-help">
            <?php
                # Put HTML content in the document
                $html = preg_replace('/(<a href="http:[^"]+")>/is','\\1 target="_blank">',$html);
                $html = str_replace('<table>', '<table class="table table-striped">', $html);
                $html = str_replace('<ul>', '<div class="list-group">', $html);
                $html = str_replace('</ul>', '</div>', $html);
                $html = str_replace('<li><a ', '<a class="list-group-item" ', $html);
                $html = str_replace('</li>', '', $html);
                $html = preg_replace_callback("#<(h[1-6])>(.*?)</\\1>#", "retitle", $html);
                $html = str_replace('</pre>', '</pre><p><button class="btn btn-primary btn-sm insert-code">Insert Example <i class="glyphicon glyphicon-share-alt"></i></button></p>', $html);
                echo $html;
            ?>
            </div>
        </div>
