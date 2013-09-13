(function() {
    tinymce.create('tinymce.plugins.bs_shortcodes', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinyMCE.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.

         *   Icons for Bootstrap Shortcodes buttons from: http://icomoon.io/app/
         */
        init : function(ed, url) {
            
            //Hide this row of buttons unless the "Kitchen Sink" is shown.
                ed.onInit.add(function( ed ) {
                    if ( getUserSetting( 'hidetb', '0' ) == '0' ) {
                        jQuery( '#content_toolbar3' ).hide();
                    }
            
                    jQuery( '#wp-content-editor-container #content_wp_adv' ).click(function() {
                        if ( jQuery( '#content_toolbar2' ).is( ':visible' ) ) {
                            jQuery( '#content_toolbar3' ).show();
                        } else {
                            jQuery( '#content_toolbar3' ).hide();
                        }
                    });
                });

            
            //Let's make some buttons!
            
            /*
            *
            * Button  
            *
            */
                // Register command for when button is clicked
                ed.addCommand('bootstrap_shortcodes_insert_button', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[button type="" size="" link=""]'+selected+'[/button]';
                    }else{
                        content =  '[button type="" size="" link=""][/button]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_button', {text : 'Button', cmd : 'bootstrap_shortcodes_insert_button', image: url + '/icons/button.svg' });

            
            /*
            *
            * Alert  
            *
            */
                ed.addCommand('bootstrap_shortcodes_insert_alert', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[alert type="" dismissable="" strong=""]'+selected+'[/alert]';
                    }else{
                        content =  '[alert type="" dismissable="" strong=""][/alert]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_alert', {title : 'Alert', cmd : 'bootstrap_shortcodes_insert_alert', image: url + '/icons/alert.svg' });

            
            /*
            *
            * Label  
            *
            */
                ed.addCommand('bootstrap_shortcodes_insert_label', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[label type=""]'+selected+'[/label]';
                    }else{
                        content =  '[label type=""][/label]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_label', {title : 'Label', cmd : 'bootstrap_shortcodes_insert_label', image: url + '/icons/label.svg' });

            
            /*
            *
            * Badge  
            *
            */
                ed.addCommand('bootstrap_shortcodes_insert_badge', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[badge right="false"]'+selected+'[/badge]';
                    }else{
                        content =  '[badge right="false"][/badge]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_badge', {title : 'Badge', cmd : 'bootstrap_shortcodes_insert_badge', image: url + '/icons/badge.svg' });

            
            /*
            *
            * Icon  
            *
            */
                ed.addCommand('bootstrap_shortcodes_insert_icon', function() {
                    content =  '[icon type=""]';
                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_icon', {title : 'Icon', cmd : 'bootstrap_shortcodes_insert_icon', image: url + '/icons/icon.svg' });

            
            /*
            *
            * Panel  
            *
            */
                ed.addCommand('bootstrap_shortcodes_insert_panel', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[panel type="" title="" footer=""]'+selected+'[/panel]';
                    }else{
                        content =  '[panel type="" title="" footer=""][/panel]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });
                ed.addButton('bootstrap_shortcodes_panel', {title : 'Panel', cmd : 'bootstrap_shortcodes_insert_panel', image: url + '/icons/panel.svg' });

        },   

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinyMCE.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinyMCE.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinyMCE.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },
    });

    // Register plugin
    tinymce.PluginManager.add('bs_shortcodes', tinymce.plugins.bs_shortcodes);

// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.bs_columns', {
    createControl: function(n, cm) {
        switch (n) {
            case 'bootstrap_shortcodes_columns':
                var mlb = cm.createListBox('columns', {
                    title : 'Columns',
                    onselect : function(v) {
                        /* simpler right? */
                        tinyMCE.activeEditor.selection.setContent('[row]<br>'+v+'[/row]');
                        return false;
                    }
                });

                // Add some values to the list box
                mlb.add('Two', '[column md="6"] [/column]<br>[column md="6"] [/column]</br>');
                mlb.add('Three', '[column md="4"] [/column]<br>[column md="4"] [/column]</br>[column md="4"] [/column]<br>');
                mlb.add('Four', '[column md="3"] [/column]<br>[column md="3"] [/column]</br>[column md="3"] [/column]</br>[column md="3"] [/column]<br>');
                mlb.add('Six', '[column md="2"] [/column]<br>[column md="2"] [/column]</br>[column md="2"] [/column]</br>[column md="2"] [/column]<br>[column md="2"] [/column]</br>[column md="2"] [/column]</br>');
                mlb.add('Twelve', '[column md="1"] [/column]<br>[column md="1"] [/column]</br>[column md="1"] [/column]</br>[column md="1"] [/column]<br>[column md="1"] [/column]</br>[column md="1"] [/column]</br>[column md="1"] [/column]<br>[column md="1"] [/column]</br>[column md="1"] [/column]</br>[column md="1"] [/column]<br>[column md="1"] [/column]</br>[column md="1"] [/column]</br>');

            // Return the new listbox instance
            return mlb;

        }
        return null;
    }
});
tinymce.PluginManager.add('bs_columns', tinymce.plugins.bs_columns);  

tinymce.create('tinymce.plugins.bs_list_group', {
    createControl: function(n, cm) {
        switch (n) {
            case 'bootstrap_shortcodes_list_group':
                var mlb = cm.createListBox('list_group', {
                    title : 'List Group',
                    onselect : function(v) {
                        /* simpler right? */
                        tinyMCE.activeEditor.selection.setContent('[list-group]<br>'+v+'[/list-group]');
                        return false;
                    }
                });

                // Add some values to the list box
                mlb.add('Two Items', '[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>');
                mlb.add('Three Items', '[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>');
                mlb.add('Four Items', '[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>');
                mlb.add('Five Items', '[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>');
                mlb.add('Six Items', '[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>[list-group-item] [/list-group-item]<br>');

            // Return the new listbox instance
            return mlb;

        }
        return null;
    }
});
tinymce.PluginManager.add('bs_list_group', tinymce.plugins.bs_list_group);  
    
})();