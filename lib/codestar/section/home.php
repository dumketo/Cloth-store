<?php
CSF::createSection( $prefix, array(
    'title'  => __('Home layout', 'dumketo' ),
    'id'     => 'home_layout',
    'icon'   => 'fas fa-list',
    'fields' => array(
        array(
            'id'             => 'home_layout_manager',
            'type'           => 'sorter',
            'title'          => 'Homepage Layout Manager',
            'desc'           => 'Organize how you want the layout to appear on the homepage',
            'default'        =>  $home_data,
        ),
    )
) );

CSF::createSection( $prefix, array(
    'title'  => __( 'Home Section', 'dumketo' ),
    'id'     => 'home',
    'icon'   => 'fas fa-h-square',
) );
CSF::createSection( $prefix, array(
    'parent'      => 'home',
    'title'       => 'Banner',
    'fields'      => array(
        array(
            'id'       => 'banner-option',
            'type'     => 'button_set',
            'title'    => __( 'Banner Option', 'dumketo' ),
            'options'  => array(
                'banner' => 'Banner',
                'slider' => 'Slider',
                'video'  => 'Video',
            ),
            'default'  => 'banner'
        ),
        array(
            'title'      => __( 'Banner Background', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'banner' ),
            'id'         => 'banner-background',
            'type'       => 'background',
            'output'     => '.banner-sec'
        ),
        array(
            'title'       => __( 'Banner Background Height', 'dumketo' ),
            'dependency'  => array( 'banner-option', '==', 'banner' ),
            'id'          => 'banner_height',            
            'type'        => 'number',            
            'output'      => array( '.banner-sec' ),
            'output_mode' => 'min-height',
            'unit'        => 'px',
        ),
        array(
            'title'      => __( 'Banner Text', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'banner' ),
            'id'         => 'banner-text',
            'type'       => 'wp_editor',
            'height'     => '50px'
        ),
        array(
            'title'      => __( 'Banner Link', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'banner' ),
            'id'         => 'banner_link',
            'type'       => 'text',
        ),
        array(
            'title'       => __( 'Slider Height', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'slider' ),
            'id'          => 'slider_height',
            'type'        => 'number',
            'output_mode' => 'height',
            'unit'        => 'px',
        ),
        array(
            'title'    => __( 'Slider Interval', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'slider' ),
            'id'       => 'slider_interval',
            'type'     => 'text',
        ),
        array(
            'title'       => __( 'Slider Slideshow', 'dumketo' ),
            'dependency'  => array( 'banner-option', '==', 'slider' ),
            'id'          => 'slider_slideshow',
            'type'        => 'select',
            'placeholder' => 'Select an option',
            'options'     => array(
                'true'  => 'True',
                'false' => 'False',
            ),
            'default'   => 'false',
        ),
        array(
            'title'       => __( 'Slider Pagination', 'dumketo' ),
            'dependency'  => array( 'banner-option', '==', 'slider' ),
            'id'          => 'slider_pagination',
            'placeholder' => 'Select an option',
            'type'        => 'button_set',
            'options'     => array(
                'true'    => 'True',
                'false'   => 'False',
            ),
            'default'    => 'false'
        ),
        array(
            'title'       => __( 'Slider Navigation', 'dumketo' ),
            'dependency'  => array( 'banner-option', '==', 'slider' ),
            'id'          => 'slider_navigation',
            'placeholder' => 'Select an option',
            'type'        => 'button_set',
            'options'     => array(
                'true'  => 'True',
                'false' => 'False',
            ),
            'default'  => 'false'
        ),
        array(
            'id'         => 'banner_slides',
            'type'       => 'group',
            'title'      => __('Slides Options', 'dumketo'),
            'dependency' => array( 'banner-option', '==', 'slider' ),
            'fields'     => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => __( 'Title', 'dumketo' ),
                ),
                array(
                    'id'       => 'image',
                    'type'     => 'media',
                    'title'    => __( 'Banner Image', 'dumketo' ),
                    'url'      => false,
                ),
                array(
                    'id'     => 'description',
                    'type'   => 'wp_editor',
                    'title'  => __( 'Description', 'dumketo' ),
                    'height' => '50px',
                ),
                array(
                    'id'    => 'url',
                    'type'  => 'text',
                    'title' => __( 'URL', 'dumketo' ),
                ),
            )
        ),
        array(
            'title'          => __( 'Background Video', 'dumketo' ),
            'id'             => 'background_video',
            'subtitle'       => __( 'Upload/select the video .mp4 file for the background. ', 'dumketo' ),
            'type'           => 'media',
            'library'        => 'video',
            'placeholder'    => __('Upload a video format.', 'dumketo'),
            'dependency'     => array( 'banner-option', '==', 'video' ),
        ),
        array(
            'title'    => __( 'Video Banner Height', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'video' ),
            'id'       => 'video_banner_height',
            'type'     => 'text',
        ),
        array(
            'title'    => __( 'Video Banner Text', 'dumketo' ),
            'dependency' => array( 'banner-option', '==', 'video' ),
            'id'       => 'video_banner_text',
            'type'     => 'wp_editor',
            'height'   => '50px'
        ),        
    )
) );
CSF::createSection( $prefix, array(
    'parent'      => 'home',
    'title'       => 'Footer Contact Info',
    'fields'      => array(
        array(
            'title'    => __( 'footer Contact Background', 'dumketo' ),
            'id'       => 'footer_contact_background',
            'type'     => 'background',
            'output'   => '.footer-contact'
        ),
        array(
            'id'             => 'footer-contact-spacing',
            'type'           => 'spacing',
            'output'         => '.footer-contact',
            'title'          => __('Padding Option', 'dumketo'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'dumketo'),
            'output_mode' => 'padding',
        ),
        array(
            'id'       => 'footer_content',
            'type'     => 'wp_editor',
            'height'   => '50px',
            'title'    => __( 'Footer Content', 'dumketo' ),
        ),
        array(
            'id'       => 'footer_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Footer Logo', 'dumketo' ),
        ),
        array(
            'title'    => __( 'Footer map', 'dumketo' ),
            'id'       => 'footer_map',
            'type'     => 'background',
            'output'   => '.map-section'
        ),
        
    )
) );