<?php
/**
* The default template for displaying content
**/
?>
<div class="row mb-4">
    <div class="col-md-6 order-1">
        <div class="post-thumbnail">
            <a href="<?php the_permalink() ?>">
                <?php if( has_post_thumbnail() ) { 
                    the_post_thumbnail( "large", array( "class" => "img-fluid d-block mx-auto mb-3" ) );
                } ?>
            </a>
        </div>
    </div>
    <div class="col-md-6 order-0 align-self-center">
        <div class="blog-content mb-3">        
            <h1 class="mb-2"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> </h1>
            <div class="media text-left mt-0 mb-2">
                <div class="media-body">
                <?php the_time('F j, Y'); ?>
                </div>
            </div>     
            <?php echo wpautop( dumketo_excerpt_blog( $dumketo['blog_excerpt_length'] ) ); ?>       
            <div class="text-left mt-2">
                <a class="btn-arrow-right-black text-decoration-none" href="<?php the_permalink(); ?>">Read More</a>
            </div>        
        </div>
    </div>
</div>    
