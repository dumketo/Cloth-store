<?php 
function dumketo_get_block( $id ) {
    $content_post = get_post( $id );
    $content = $content_post->post_content;
    return $content;
}
function dumketo_display_block( $id ) {
    echo apply_filters( 'the_content', dumketo_get_block( $id ) );
}
function dumketo_shortcode( $atts ){
    ob_start();
    $id = $atts['id'];
    echo apply_filters( 'the_content', dumketo_get_block( $id ) );
    $output = ob_get_clean();
    return $output;    
}
add_shortcode( 'dumketo_reusble', 'dumketo_shortcode' );