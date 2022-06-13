<?php
/*
* Admin css For redux and cmb2 and post types
*/
global $dumketo, $front_page_id;
?>

<script type="text/javascript">    
     ;(function ( $, window, document, undefined ) {
         'use strict';
         $(document).ready( function() {
             $('#post_ID').change( function() {
                 $('#_inner_meta_options').show();
                 $('#_home_meta_options').hide();
                 $('#team_options').hide();
                 $('#_inner_work_options').hide();
                 switch( $( this ).val() ) {
                    case '<?php echo $front_page_id; ?>':
                        $('#_home_meta_options').show();
                        $('#_inner_meta_options').hide();
                        $('#_inner_work_options').hide();
                    break;
                    case '33':
                        $('#team_options').show();
                    break;
                    case '13':
                        $('#_inner_work_options').show();
                    break;
                 }            
             }).change();
        
         });    
     })( jQuery, window, document );
</script>

<style type="text/css">
    input#opt-text { padding: 10px 15px; }
    .cs-element .cs-fieldset { margin-left: 20%; }
    .cs-element .cs-title { width: 20%; }
    .ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front.ui-draggable { z-index: 99999; }
    input#social_profiles-title_0 { height: 40px; }
    input#social_profiles-link_title_0 { height: 40px; }
    .js .tmce-active .wp-editor-area { color: #000; }
    .csf-field-button_set .csf--button:first-child { border-radius: 25px 0px 0px 25px !important; padding: 15px 25px !important;font-weight: 600;border: 0;box-shadow: none; }
    .csf-field-button_set .csf--button:not(:first-child) { padding: 15px 20px !important;font-weight: 600;border: 0;box-shadow: none; }
    .csf-field-button_set .csf--button:last-child { border-radius: 0px 25px 25px 0px !important;padding: 15px 20px !important;font-weight: 600;border: 0;box-shadow: none; }
    button#extendify-templates-inserter-btn { display: none; }
    .csf-field-group .csf-cloneable-header-icon { vertical-align: text-bottom; }
    .csf-header-left h1 a { color: #555; text-decoration: none; }
    #adminmenu .wp-menu-image img { padding: 6.5px 0 0; }
    html :where(.wp-block) { max-width: 100%; }
</style>



