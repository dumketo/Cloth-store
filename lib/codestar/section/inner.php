<?php
CSF::createSection( $prefix, array(
  'id'    => 'inner',
  'title' => 'Inner Section',
  'icon'  => 'fas fa-cogs',
) );
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'Inner Page Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'inner_page_background',
            'type'     => 'background',
            'output'   => '.inner-banner-section',
            'title'    => __( 'Inner Page Background', 'dumketo' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'          => 'inner_banner_height',
            'type'        => 'number',
            'title'       => __( 'Banner Background Height', 'dumketo' ),
            'output'      => '.inner-banner-section, .inner-banner-title',
            'output_mode' => 'min-height',
            'unit'        => 'px',
        ),
        array(
            'id'       => 'inner_page_heading',
            'type'     => 'typography',
            'output'   => '.inner-banner-section h1',
            'title'    => __( 'Inner Page Heading', 'dumketo' ),
        ),
        array(
            'id'       => 'inner_page_heading_spacing',
            'type'     => 'spacing',
            'output'   => '.inner-banner-section h1',
            'output_mode' => 'margin',
            'title'    => __( 'Inner Page Heading Spacing', 'dumketo' ),
        ),
        array(
            'id'       => 'inner_page_content_spacing',
            'type'     => 'spacing',
            'output'   => '.inner-padding',
            'output_mode' => 'padding',
            'title'    => __( 'Inner Page Content Spacing', 'dumketo' ),
        ),
        array(
            'id'       => 'inner_page_sidebar',
            'type'     => 'switcher',
            'title'    => __( 'Activate Inner Page Sidebar ', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
        array(
            'id'       => 'inner_page_sidebar_bg',
            'type'     => 'background',
            'dependency' => array( 'inner_page_sidebar', '==', '1' ),
            'output'   => '.side-form',
            'title'    => __( 'Inner Page Sidebar Form Background', 'dumketo' ),
            'default'  => '#000000',
        ),
        array(
            'id'             => 'inner_page_sidebar-spacing',
            'type'           => 'spacing',
            'dependency'     => array( 'inner_page_sidebar', '==', '1' ),
            'output'         => '.side-form',
            'output_mode'    => 'padding',
            'title'          => __('Inner Page Sidebar Form Padding', 'dumketo'),
            'subtitle'       => __('Allow your users to choose the spacing or padding they want.', 'dumketo'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'dumketo'),
        ),
        array(
            'title'      => __( 'Select inner Menu', 'dumketo' ),
            'id'         => 'select_inner_menu',
            'dependency' => array( 'inner_page_sidebar', '==', '1' ),
            'type'       => 'select',
            'placeholder'=> 'Select an option',
            'options'    => 'menus',            
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'Gallery Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'gallery',
            'type'     => 'gallery',
            'title'    => __('Add/Edit Gallery', 'dumketo'),
            'add_title'=> 'Add Gallery',
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'Logo Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'clients_logo',
            'type'     => 'gallery',
            'title'    => __('Add/Edit Corporate Client', 'dumketo'),
            'add_title'=> 'Add Corporate Client',
        ),
        array(
            'id'       => 'digital_clients_logo',
            'type'     => 'gallery',
            'title'    => __('Add/Edit Digital Client', 'dumketo'),
            'add_title'=> 'Add Digital Client',
        ),
        array(
            'id'       => 'btl_clients_logo',
            'type'     => 'gallery',
            'title'    => __('Add/Edit BTL Client Client', 'dumketo'),
            'add_title'=> 'Add BTL Client',
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'FAQ Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'       => 'faq_sidebar',
            'type'     => 'switcher',
            'title'    => __( 'Activate FAQ Page Sidebar ', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),

        array(
            'id'         => 'faq_sidebar_form_image',
            'type'       => 'button_set',
            'dependency' => array( 'faq_sidebar', '==', '1' ),
            'title'      => __( 'Activate FAQ Page Inner Sidebar or Image ', 'dumketo' ),
            'options'    => array(
                '1' => 'Inner Sidebar',
                '2' => 'FAQ Image'
            ),
            'default'  => '1'
        ),

        array(
            'title'      => __( 'FAQ Sidebar Image', 'dumketo' ),
            'id'         => 'faq_side_image',
            'dependency' => array( 'faq_sidebar', '==', '1' ),
            'dependency' => array( 'faq_sidebar_form_image', '==', '2' ),
            'type'       => 'media',
            'url'        => false,
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'Testimonials Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'        => 'testimonial_count',
            'type'      => 'slider',
            'title'     => __('Testimonial Posts Per Page', 'dumketo'),
            "default"   => 6,
            "min"       => 1,
            "step"      => 1,
            "max"       => 10,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'testimonial_excerpt_length',
            'type'      => 'slider', 
            'title'     => __('Testimonial Excerpt Length', 'dumketo'),
            "default"   => "40",
            "min"       => "20",
            "step"      => "2",
            "max"       => "200",
        ),
        array(
            'id'        => 'testimonial_item',
            'type'      => 'slider', 
            'title'     => __('Testimonial Item', 'dumketo'),
            "default"   => "1",
            "min"       => "1",
            "step"      => "1",
            "max"       => "4",
        ),
        array(
            'title'    => __( 'Testimonial Interval', 'dumketo' ),
            'id'       => 'testimonial_interval',
            'type'     => 'text',
        ),
        array(
            'title'    => __( 'Testimonial Slideshow', 'dumketo' ),
            'id'       => 'testimonial_slideshow',
            'type'     => 'button_set',
            'options'  => array(
                'true'  => 'True',
                'false' => 'False',
            ),
            'default'  => 'true',
        ),
        array(
            'title'    => __( 'Testimonial Pagination', 'dumketo' ),
            'id'       => 'testimonial_pagination',
            'type'     => 'button_set',
            'options'  => array(
                'true'  => 'True',
                'false' => 'False',
            ),
            'default'  => 'false'
        ),
        array(
            'title'    => __( 'Testimonial Navigation', 'dumketo' ),
            'id'       => 'testimonial_navigation',
            'type'     => 'button_set',
            'options'  => array(
                'true'  => 'True',
                'false' => 'False',
            ),
            'default'  => 'false'
        ),
        array(
            'id'       => 'testimonials_sidebar',
            'type'     => 'switcher',
            'title'    => __( 'Activate Testimonials Page Sidebar ', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
        array(
            'id'         => 'testimonials_sidebar_form_image',
            'type'       => 'button_set',
            'dependency' => array( 'testimonials_sidebar', '==', '1' ),
            'title'      => __( 'Activate Testimonials Page Inner Sidebar or Image ', 'dumketo' ),
            'options'  => array(
                '1' => 'Inner Sidebar',
                '2' => 'Testimonial Side Image'
            ),
            'default'  => '1'
        ),
        array(
            'title'    => __( 'Testimonials Sidebar Image', 'dumketo' ),
            'id'       => 'testimonials_side_image',
            'dependency' => array( 'testimonials_sidebar', '==', '1' ),
            'dependency' => array( 'testimonials_sidebar_form_image', '==', '2' ),
            'type'     => 'media',
            'url'      => false,
        ),
    )
));
CSF::createSection( $prefix, array(
    'parent'      => 'inner',
    'title'       => __( 'Blog Section', 'dumketo' ),
    'fields'      => array(
        array(
            'id'             => 'blog_page_section_spacing',
            'type'           => 'spacing',
            'output'         => array( '.about-banner' ),
            'output_mode'    => 'padding',
            'title'          => __( 'Padding Option', 'dumketo' ),
            'desc'           => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'dumketo' ),
        ),
        array(
            'title'    => __( 'Blog Text', 'dumketo' ),
            'id'       => 'blog_page_text',
            'type'     => 'wp_editor',
            'height'   => '100px',
        ),
        array(
            'id'        => 'blog_excerpt_length',
            'type'      => 'slider', 
            'title'     => __('Blogs Excerpt Length', 'dumketo'),
            "default"   => "40",
            "min"       => "20",
            "step"      => "2",
            "max"       => "80",
        ),
        array(
            'id'       => 'blog_page_sidebar',
            'type'     => 'switcher',
            'title'    => __( 'Activate Blog Page Sidebar ', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
        array(
            'id'       => 'activate_single_page_pagination',
            'type'     => 'switcher',
            'title'    => __( 'Activate Single Page Pagination', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
        array(
            'id'       => 'blog_single_page_sidebar',
            'type'     => 'switcher',
            'title'    => __( 'Activate Blog Single Page Sidebar ', 'dumketo' ),
            'default'  => 0,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
    )
));





