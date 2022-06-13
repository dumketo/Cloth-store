<?php
CSF::createSection( $prefix, array(
    'id'    => 'footer',
    'title' => 'Footer Section',
    'icon'  => 'fas fa-code',
    'fields'  => array(
        array(
            'id'       => 'both_footer_include',
            'type'     => 'button_set',
            'title'    => __('Both Footer Add', 'dumketo'),
            'options'  => array(
                '1' => 'Yes',
                '2' => 'No',
            ),
            'default'  => '2'
        ),
        array(
            'id'       => 'footer_bottom_background',
            'type'     => 'background',
            'output'   => '.footer-bottom',
            'title'    => __( 'Footer bottom Background', 'dumketo' ),
        ),
        array(
            'id'          => 'footer_bottom_padding',
            'type'        => 'spacing',
            'title'       => __('Section Padding Second', 'dumketo'),
            'output'      => '.footer-bottom',
            'output_mode' => 'padding',
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'typography',
            'output'   => '#copyright',
            'title'    => __( 'Copyright', 'dumketo' ),
        ),
        array(
            'id'       => 'company_text',
            'type'     => 'text',
            'title'    => __( 'Copyright Before Text', 'dumketo' ),
        ),
        array(
            'id'       => 'company_logo',
            'type'     => 'media',
            'url'      => false,
            'title'    => __( 'Copyright Company Logo', 'dumketo' ),
        ),
        array(
            'id'       => 'company_name',
            'type'     => 'text',
            'title'    => __( 'Copyright Company Name', 'dumketo' ),
        ),
        array(
            'id'       => 'company_url',
            'type'     => 'text',
            'title'    => __( 'Copyright Company Url', 'dumketo' ),
        ),
        array(
            'id'       => 'copyright_link_color',
            'type'     => 'color',
            'title'    => __( 'Copyright link Color', 'dumketo' ),
            'default'  => '#000000',
        ),
    )
) );