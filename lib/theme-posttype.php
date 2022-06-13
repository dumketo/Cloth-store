<?php global $dumketo;
if ( $dumketo['post_type'] ):
    foreach ( $dumketo['post_type'] as $post_id => $post_value ) {
        // var_dump($post_value);
        $type_name  =  sanitize_title_with_dashes( $post_value['post_type_name'] );
        $type_title = $post_value['post_type_name'];
        $dashicon_name =  trim( $post_value['dashicon'] );
        $supports = array(
            $post_value['post_type_support'][0],
            $post_value['post_type_support'][1],
            $post_value['post_type_support'][2],
            $post_value['post_type_support'][3],
        );
        if ( $type_name ):
            //Register PostType
            register_post_type( $type_name,
               array(
                   'labels'          => array( 'name' => __( $type_title ), 'singular_name' => __( $type_title ) ),
                   'menu_icon'       => 'dashicons-'.$dashicon_name,
                   'supports'        => $supports,
                   'public'          => true,
                   'has_archive'     => true,
                   'rewrite'         => array('slug' => $type_name),
                   'capability_type' => 'post',
                   'show_in_rest'    => true,
                )
            );  
        endif;
        if($post_value['custom_taxonamy']):
            foreach ( $post_value['custom_taxonamy'] as $taxonamy_id => $taxonamy_value ) {
                $type_tax_title = sanitize_title_with_dashes( $taxonamy_value['custom_taxonamy_name'] );
                $args = array(
                    'labels'                     => array( 'name'  => $taxonamy_value['custom_taxonamy_name'], ),
                    'hierarchical'               => true,
                    'public'                     => true,
                    'show_ui'                    => true,
                    'show_in_nav_menus'          => true,
                    'show_tagcloud'              => true,
                );
                register_taxonomy( $type_tax_title, $type_name, $args );
                register_taxonomy_for_object_type( $type_tax_title, $type_name );
            }
        endif;
    }

endif;

// Add to admin_init function
add_filter('manage_edit-testimonial_columns', 'add_new_testimonial_columns');
function add_new_testimonial_columns($testimonial_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';     
    $new_columns['title'] = _x('Testimonial Title', 'column name');
    $new_columns['thumbnail'] = __('Testimonial Image', 'column name');
    $new_columns['author'] = __('Author'); 
    $new_columns['date'] = _x('Date', 'column name');

    return $new_columns;
}
// Add to admin_init function
add_action('manage_testimonial_posts_custom_column', 'manage_testimonial_columns');

function manage_testimonial_columns($column_name) {
    global $wpdb;
    switch ($column_name) {
        case 'thumbnail':
            echo get_the_post_thumbnail( get_the_ID(), array( 100, 100 ) );            
            break;
        default:
            break;
    }
}
add_filter( 'cs_metabox_options', 'dumketo_testimonial_metabox' );
function dumketo_testimonial_metabox( $options ) {
    $options[]    = array(
        'id'        => '_inner_testimonial_options',
        'title'     => 'Testimonial Sections',
        'post_type' => 'testimonial',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'testimonial_section',
                'fields' => array(
                    array(
                        'id'    => 'designation',
                        'type'  => 'text',
                        'title' => 'Designation',
                    ),                     
                ),
            ),
        ),
    );
    return $options;
}