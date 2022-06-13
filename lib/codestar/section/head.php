<?php
CSF::createSection( $prefix, array(
  'id'    => 'header',
  'title' => 'Header Section',
  'icon'  => 'fas fa-desktop',
) );

CSF::createSection( $prefix, array(
    'parent'      => 'header',
    'title'       => 'Topbar Section',
    'fields'      => array(
        array(
            'id'       => 'topbar-section',
            'type'     => 'switcher',
            'title'    => __('Activate Topbar Section', 'dumketo'),
            'options'      => array(
                '1'   => 'Activate',
                '0'   => 'Deactivate',
            ),
            'default'      => '0',
        ),
        array(
            'id'       => 'activate_container',
            'type'     => 'button_set',
            'dependency' => array( 'topbar-section', '==', '1' ),
            'title'    => __('Activate topbar Container', 'dumketo'),
            'options'  => array(
                'container'       => 'Container',
                'container-fluid' => 'Container Fluid',
            ),
            'default'  => 'container'
        ),
        array(
            'id'       => 'topbar-section-section-color',
            'type'     => 'background',
            'dependency' => array( 'topbar-section', '==', '1' ),
            'output'   => '.topbar-section',
            'title'    => __( 'Topbar Section Background color', 'dumketo' ),
            'default'  => '#000000',
        ),
        array(
            'id'             => 'topbar-section-spacing',
            'type'           => 'spacing',
            'dependency'     => array( 'topbar-section', '==', '1' ),
            'output'         => '.topbar-section',
            'output_mode'    => 'padding',
            'title'          => __('Padding Option', 'dumketo'),
            'subtitle'       => __('Allow your users to choose the spacing or padding they want.', 'dumketo'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'dumketo'),
        ),
        array(
            'title'      => __( 'Select Topbar Menu', 'dumketo' ),
            'dependency' => array( 'topbar-section', '==', '1' ),
            'id'         => 'topbar_menu',
            'placeholder'=> 'Select a menu',
            'type'       => 'select',
            'options'    => 'menus',
        ),
        array(
            'title'      => __( 'Select Request a Quote Link', 'dumketo' ),
            'dependency' => array( 'topbar-section', '==', '1' ),
            'id'         => 'topbar_request',
            'type'       => 'select',
            'placeholder'=> 'Select an item',
            'options'    => 'pages',
        ),
        
        array(
            'id'     => 'topbar-section-border',
            'type'   => 'border',
            'dependency' => array( 'topbar-section', '==', '1' ),
            'title'  => 'Border',
            'output' => array( '.topbar-section' ),
        ),
    )    
) );

CSF::createSection( $prefix, array(
    'parent'      => 'header',
    'title'       => 'Menu Section',
    'fields'      => array(
        array(
            'id'       => 'head_section',
            'type'     => 'switcher',
            'title'    => __( 'Activate Menu Section', 'dumketo' ),
            'default'  => 0,
            '1'      => 'Enabled',
            '0'      => 'Disabled',
        ),
        array(
            'id'         => 'activate_head_container',
            'type'       => 'button_set',
            'dependency' => array( 'head_section', '==', '1' ),
            'title'      => __( 'Activate Header Container', 'dumketo' ),
            'options'    => array(
                'container'       => 'Container',
                'container-fluid' => 'Container Fluid',
            ),
        ),
        array(
            'id'         => 'head_container_fluid_extra_class',
            'type'       => 'text',
            'dependency' => array( 'activate_head_container', '==', 'container-fluid' ),
            'title'      => __( 'Fluid Extra Class', 'dumketo' ),
        ), 
        array(
            'id'         => 'head_section_section_color',
            'type'       => 'background',
            'dependency' => array( 'head_section', '==', '1' ),
            'output'     => '.head-section',
            'title'      => __( 'Menu Section Background color', 'dumketo' ),
        ),
        array(
            'id'             => 'head-section-spacing',
            'type'           => 'spacing',
            'dependency'     => array( 'head_section', '==', '1' ),
            'output'         => '.head-section',
            'output_mode'    => 'padding',
            'title'          => __('Padding Option', 'dumketo'),
            'subtitle'       => __('Allow your users to choose the spacing or padding they want.', 'dumketo'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'dumketo'),
        ),
        array(
            'id'             => 'head-section-border',
            'type'           => 'border',
            'dependency'     => array( 'head_section', '==', '1' ),
            'output'         => '.head-section',            
            'title'          => __('Border', 'dumketo'),
        ),
        array(
            'title'      => __( 'Select Main Menu', 'dumketo' ),
            'dependency' => array( 'head_section', '==', '1' ),
            'id'         => 'main-menu',
            'placeholder'=> 'Select a Primary Menu',
            'type'       => 'select',
            'options'    => 'menus',
        ),
        array(
            'id'       => 'activate_menu',
            'type'     => 'switcher',
            'title'    => __( 'Activate Menu Part', 'dumketo' ),
            'default'  => 0,
            '1'      => 'Enabled',
            '0'      => 'Disabled',
        ),
        array(
            'id'         => 'menu_typography',
            'type'       => 'typography',
            'title'      => 'Menu Typography',
            'dependency' => array( 'activate_menu', '==', '1' ),
            'output'     => '#cssmenu > ul > li > a',
        ),
        array(
            'id'         => 'menu_hover_active',
            'type'       => 'color',
            'title'      => 'Menu Hover & Active Color',
            'dependency' => array( 'activate_menu', '==', '1' ),
            'output'     => '#cssmenu > ul > li:hover > a, #cssmenu > ul > li.active > a',
        ),
        array(
            'id'         => 'menu_spacing',
            'type'       => 'spacing',
            'title'      => __('Padding Option', 'dumketo'),
            'dependency' => array( 'activate_menu', '==', '1' ),
            'output'     => '#cssmenu > ul > li > a',
            'output_mode'=> 'padding',
        ),

    )    
) );