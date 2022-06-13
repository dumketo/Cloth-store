<?php
CSF::createSection( $prefix, array(
  'id'    => 'basic_fields',
  'title' => 'Basic Fields',
  'icon'  => 'fas fa-tachometer-alt',
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => __( 'Fonts', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'activate_font',
            'type'     => 'switcher',
            'title'    => __( 'Activate Font Style', 'dumketo' ),
            'default'  => 0,
            '1'       => 'Enabled',
            '0'       => 'Disabled',
        ),
        array(
            'id'     => 'font_atts',
            'type'   => 'repeater',
            'title'  => 'Add Font',
            'dependency' => array( 'activate_font', '==', '1' ),
            'fields' => array(
                array(
                    'id'         => 'font_name',
                    'type'       => 'text',
                    'title'      => __('Fonts Name', 'dumketo'),
                ),
                array(
                    'id'         => 'font_link',
                    'type'       => 'text',
                    'title'      => __('Fonts Url', 'dumketo'),
                ),
            ),
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Typography & Color',
    'fields'      => array(
        array(
            'id'          => 'body_typography',
            'type'        => 'typography',
            'title'       => __('Body Typography', 'dumketo'),
            'output'      => 'body',
        ),
        array(
            'id'          => 'heading_typography',
            'type'        => 'typography',
            'title'       => __('Headding Typography', 'dumketo'),
            'output'      => 'h1, h2, h3, h4, h5, h6',
        ),
        array(
            'id'    => 'link-color',
            'type'  => 'link_color',
            'title' => 'Link Color',
            'output'=> 'a',
        ),
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Logo Section',
    'fields'      => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => __( 'Logo', 'dumketo' ),
            'url'      => false
        ),
        array(
            'id'       => 'float_social',
            'type'     => 'checkbox',
            'title'    => __('Float Social Option', 'dumketo'),
            'default'  => 0,
        ),
        array(
            'id'       => 'main_nav_sticky',
            'type'     => 'button_set',
            'title'    => __('Main Navigation Sticky', 'dumketo'),
            'options'      => array(
                '1'   => 'Activate',
                '0'   => 'Deactivate',
            ),
            'default'      => '0',
        ),
        array(
            'id'         => 'is_sticky_nav_bg',
            'type'       => 'color',
            'dependency' => array( 'main_nav_sticky', '==', '1' ),
            'title'      => __( 'Is Sticky Background Color', 'dumketo' ),
            'default'    => '#ffffff',
        ),
        array(
            'id'         => 'is_sticky_nav_height',
            'type'       => 'text',
            'dependency' => array( 'main_nav_sticky', '==', '1' ),
            'title'      => __( 'Is Sticky Nav Height', 'dumketo' ),
        ),

    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Info Section',
    'fields'      => array(
        array(
            'id'     => 'basic_info',
            'type'   => 'fieldset',
            'title'  => __('Basic Info', 'dumketo'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => 'Basic Info',
                ),
                array(
                    'id'    => 'phone',
                    'type'  => 'text',
                    'title' => __( 'Phone', 'dumketo' ),
                ),
                array(
                    'id'    => 'email',
                    'type'  => 'text',
                    'title' => __( 'Email', 'dumketo' ),
                ),
                array(
                    'id'     => 'address',
                    'type'   => 'wp_editor',
                    'title'  => __( 'Address', 'dumketo' ),
                    'height' => '50px',
                ),
                array(
                    'id'     => 'business_hour',
                    'type'   => 'wp_editor',
                    'title'  => __( 'Business Hour', 'dumketo' ),
                    'height' => '50px',
                ),
                array(
                    'id'     => 'map_link',
                    'type'   => 'text',
                    'title'  => __( 'Map Link', 'dumketo' ),
                ),
            )
        ),
        array(
            'id'     => 'read_more_link',
            'type'   => 'select',
            'title'  => __( 'Read more Link', 'dumketo' ),
            'placeholder' => 'Select a page',
            'options'     => 'pages',
        ),        
        array(
            'id'     => 'img_alt',
            'type'   => 'textarea',
            'title'  => __( 'Image ALt Main Part', 'dumketo' ),
        ),
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Social Section',
    'fields'      => array(
        array(
            'id'       => 'gplus-review',
            'type'     => 'text',
            'title'    => __( 'Google+ Review', 'dumketo' ),
        ),
        array(
            'id'     => 'social_profiles',
            'type'   => 'group',
           'title'   => __('Social Profiles', 'dumketo'),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => __( 'Social Profile title', 'dumketo' ),
                ),
                array(
                    'id'       => 'social_profile_im',
                    'type'     => 'button_set',
                    'title'    => __('Social Profile Attribute', 'dumketo'),
                    'options'      => array(
                        'image'  => 'Image',
                        'icon'   => 'Icon',
                    ),
                    'default'  => 'icon',
                ),
                array(
                    'id'    => 'profile_icon',
                    'type'  => 'icon',
                    'dependency' => array( 'social_profile_im', '==', 'icon' ),
                    'title' => 'Icon',
                ),
                array(
                    'id'         => 'profile_image_top',
                    'type'       => 'media',
                    'dependency' => array( 'social_profile_im', '==', 'image' ),
                    'title'      => __( 'Image Top', 'dumketo' ),                    
                ),
                array(
                    'id'         => 'profile_image_top_hover',
                    'type'       => 'media',
                    'dependency' => array( 'social_profile_im', '==', 'image' ),
                    'title'      => __( 'Image Top Hover', 'dumketo' ),                    
                ),
                array(
                    'id'         => 'profile_image',
                    'type'       => 'media',
                    'dependency' => array( 'social_profile_im', '==', 'image' ),
                    'title'      => __( 'Image', 'dumketo' ),                    
                ),
                array(
                    'id'         => 'profile_image_hover',
                    'type'       => 'media',
                    'dependency' => array( 'social_profile_im', '==', 'image' ),
                    'title'      => __( 'Image Hover', 'dumketo' ),                    
                ),
                array(
                    'id'    => 'profilelink',
                    'type'  => 'text',
                    'title' => __( 'Social Profile Link', 'dumketo' ),
                ),
            )
        ),
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Padding Section Info',
    'fields'      => array(
        array(
            'id'          => 'home_padding',
            'type'        => 'spacing',
            'title'       => __('Section Padding', 'dumketo'),
            'output'      => '.home-ptb',
            'output_mode' => 'padding',
        ),
        array(
            'id'          => 'home_padding_5',
            'type'        => 'spacing',
            'title'       => __('Section Padding All Side', 'dumketo'),
            'output'      => '.home-padding',
            'output_mode' => 'padding',
        ),
        array(
            'id'          => 'flex_container',
            'type'        => 'spacing',
            'title'       => __('Flexible Container', 'dumketo'),
            'output'      => '.flex-container',
            'output_mode' => 'padding',
        ),
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Website Loading',
    'fields'      => array(
        array(
            'id'       => 'activate_loading',
            'type'     => 'switcher',
            'title'    => __( 'Activate Website Loading', 'dumketo' ),
            'default'  => 0,
            '1'        => 'Enabled',
            '0'        => 'Disabled',
        ),
        array(
            'id'         => 'website-loading',
            'type'       => 'background',
            'output'     => '#website-loading',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'title'      => __( 'Website Loading Background color', 'dumketo' ),
        ),
        array(
            'id'         => 'loading-title',
            'type'       => 'color',
            'output'     => '.loading-title',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'title'      => __( 'Loading Title color', 'dumketo' ),
        ),
        array(
            'title'      => __( 'Website Loading Style', 'dumketo' ),
            'id'         => 'loading-style',
            'type'       => 'select',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'title'      => __( 'Website Loading Background color', 'dumketo' ),
            'output'     => '.loading-style',
            'options'  => array(
                '' => 'Select',
                'la-ball-fall' => 'La Ball Fall',
                'load-1' => 'load-1',
                'load-4' => 'load-4',
                'la-ball-clip-rotate-multiple' => 'la-ball-clip-rotate-multiple',
                'spinner' => 'spinner',
                'loading-effect-2' => 'loading-effect-2',
                'spinning' => 'spinning ',
            ),
        ),
        array(
            'id'         => 'la-ball-fall',
            'type'       => 'color',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'dependency' => array( 'loading-style', '==', 'la-ball-fall' ),
            'output'     => '.la-ball-fall',
            'title'      => __( 'la-ball-fall color', 'dumketo' ),
        ),
        array(
            'id'         => 'load-1',
            'type'       => 'color',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'dependency' => array( 'loading-style', '==', 'load-1' ),
            'output'     => '.load-1',
            'title'      => __( 'load-1 color', 'dumketo' ),
        ),
        array(
            'id'         => 'load-4',
            'type'       => 'color',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'dependency' => array( 'loading-style', '==', 'load-4' ),
            'output'     => '.load-4',
            'title'      => __( 'load-4 color', 'dumketo' ),
        ),
        array(
            'id'         => 'la-ball-clip-rotate-multiple',
            'type'       => 'color',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'dependency' => array( 'loading-style', '==', 'la-ball-clip-rotate-multiple' ),
            'output'     => '.la-ball-clip-rotate-multiple',
            'title'      => __( 'la-ball-clip-rotate-multiple color', 'dumketo' ),
        ),
        array(
            'id'         => 'spinner',
            'type'       => 'background',
            'dependency' => array( 'activate_loading', '==', '1' ),
            'dependency' => array( 'loading-style', '==', 'spinner' ),
            'output'     => '.spinner > div',
            'title'      => __( 'spinner color', 'dumketo' ),
        ),
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'basic_fields',
    'title'       => 'Schema Information',
    'fields'      => array(
        array(
            'id'       => 'activate_schema',
            'type'     => 'switcher',
            'title'    => __( 'Activate Schema', 'dumketo' ),
            'default'  => 0,
            '1'        => 'Enabled',
            '0'        => 'Disabled',
        ),
        array(
            'id'      => 'schema_type',
            'type'    => 'group',
            'dependency' => array( 'activate_schema', '==', '1' ),
            'title'   => __( 'Schema', 'dumketo' ),
            'fields'  => array(
                array(
                    'id'    => 'schema_type',
                    'type'  => 'text',
                    'title' => __( 'Schema Type', 'dumketo' ),
                ),
                array(
                    'id'    => 'schema_name',
                    'type'  => 'text',
                    'title' => __( 'Schema Name', 'dumketo' ),
                ),
                array(
                    'id'     => 'schema_des',
                    'type'   => 'wp_editor',
                    'title'  => __( 'Description', 'dumketo' ),
                    'height' => '50px',
                ),
            )
        ),
        array(
            'title'      => __( 'Street Address', 'dumketo' ),
            'dependency' => array( 'activate_schema', '==', '1' ),
            'id'         => 'streetAddress',
            'type'       => 'text',
        ),
        array(
            'title'      => __( 'Address Locality', 'dumketo' ),
            'dependency' => array( 'activate_schema', '==', '1' ),
            'id'         => 'addressLocality',
            'type'       => 'text',
        ),
        array(
            'title'      => __( 'Address Region', 'dumketo' ),
            'dependency' => array( 'activate_schema', '==', '1' ),
            'id'         => 'addressRegion',
            'type'       => 'text',
        ),
        array(
            'title'      => __( 'Postal Code', 'dumketo' ),
            'dependency' => array( 'activate_schema', '==', '1' ),
            'id'         => 'postalCode',
            'type'       => 'text',
        ),
    )
) );