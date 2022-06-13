<?php
CSF::createSection( $prefix, array(
    'id'    => 'advanced-setting',
    'title' => __('Advanced Settings', 'dumketo' ),
    'icon'  => 'fas fa-tools',
) );
CSF::createSection( $prefix, array(
    'parent'      => 'advanced-setting',
    'title'       => __( 'Extra CSS & Js', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'activate_css',
            'type'     => 'switcher',
            'title'    => __( 'Activate CSS Style', 'dumketo' ),
            'default'  => 0,
            '1'       => 'Enabled',
            '0'      => 'Disabled',
        ),
        array(
            'id'     => 'css_name',
            'type'   => 'repeater',
            'title'  => 'Add CSS',
            'dependency' => array( 'activate_css', '==', '1' ),
            'fields' => array(
                array(
                    'id'    => 'css-name',
                    'type'  => 'text',
                    'title' => 'CSS Title'
                ),
            ),
        ),
        array(
            'id'       => 'activate_js',
            'type'     => 'switcher',
            'title'    => __( 'Activate Js Style', 'dumketo' ),
            'default'  => 0,
            '1'       => 'Enabled',
            '0'      => 'Disabled',
        ),
        array(
            'id'     => 'js_name',
            'type'   => 'repeater',
            'title'  => 'Add Js',
            'dependency' => array( 'activate_js', '==', '1' ),
            'fields' => array(
                array(
                    'id'    => 'js-name',
                    'type'  => 'text',
                    'title' => 'Js Title'
                ),
            ),
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'advanced-setting',
    'title'       => __( 'Post Type', 'dumketo' ),
    'fields'      => array(
        array(
            'id'        => 'post_type',
            'type'      => 'group',
            'title'     => 'Add Posttype',
            'fields'    => array(
                array(
                    'id'    => 'post_type_name',
                    'type'  => 'text',
                    'title' => 'Post Type Name',
                ),
                array(
                    'id'    => 'dashicon',
                    'type'  => 'text',
                    'title' => 'DashIcon',
                ),
                array(
                    'id'         => 'post_type_support',
                    'type'       => 'checkbox',
                    'title'      => 'Supports',
                    'options'    => array(
                        'title'        => 'Title',
                        'editor'       => 'Editor',
                        'thumbnail'    => 'Thumbnail',
                        'post-formats' => 'Post Formats',
                    ),
                ),
                array(
                    'id'    => 'custom_taxonamy',
                    'type'  => 'group',
                    'title' => 'Taxonomy',
                    'fields'    => array(
                        array(
                            'id'    => 'custom_taxonamy_name',
                            'type'  => 'text',
                            'title' => 'Taxonamy Name',
                        ),
                    ),
                ),
                
            ),
        ),
    )
));

CSF::createSection( $prefix, array(
    'id'    => 'additional',
    'title' => '404 Information',
    'icon'  => 'fas fa-asterisk',
    'fields'  => array(
        array(
            'id'          => '404-page',
            'type'        => 'select',
            'title'       => __('Select 404 page Style', 'dumketo'),
            'placeholder' => 'Select an Item',
            'options'  => array(
                '1' => 'Style 1',
                '2' => 'Style 2',
                '3' => 'Style 3'
            ),
        ),
        array(
            'id'       => 'coming_soon_image',
            'type'     => 'media',
            'url'      => false,
            'title'    => __( 'Coming Soon Image', 'dumketo' ),
        ),
    )
) );

CSF::createSection( $prefix, array(
    'id'    => 'thank-you',
    'title' => 'Thank You Information',
    'icon'  => 'fas fa-check-circle',
    'fields'  => array(
        array(
            'id'          => 'thank-page',
            'type'        => 'select',
            'title'       => __('Select Thank You page Style', 'dumketo'),
            'placeholder' => 'Select an Item',
            'options'  => array(
                '1' => 'Style 1',
                '2' => 'Style 2',
            ),
        ),
        array(
            'id'       => 'thank_content_heading_color',
            'type'     => 'color',
            'title'    => __( 'Is Sticky Background Color', 'dumketo' ),
            'default'  => '#ffffff',
        ),
        array(
            'title'    => __( 'Thank You page content', 'dumketo' ),
            'id'       => 'thank_content',
            'type'     => 'wp_editor',
            'height'   => '100px',
        ),
        array(
            'id'       => 'thank_content_paragraph_color',
            'type'     => 'color',
            'title'    => __( 'Is Sticky Background Color', 'dumketo' ),
            'default'  => '#ffffff',
        ),
    )
) );