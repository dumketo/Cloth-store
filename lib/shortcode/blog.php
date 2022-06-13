<?php
function dumketo_blog(){
    ob_start();
    global $dumketo, $post; 
    echo '<div id="blog-block" class="owl-carousel">';    
        $i=1;
        $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
        $loop = new WP_Query( $args );
        while ($loop->have_posts()) : $loop->the_post();
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'thumbnail') ); 
            $title = get_the_title(); ?>
            <div class="home-blog position-relative">
                <div class="home-blog-block position-relative">
                    <img src="<?php echo $url; ?>" alt="<?php echo $title; ?>" class="img-fluid d-block mx-auto">
                    <div class="card-img-overlay text-white text-center">
                        <?php echo wpautop( dumketo_excerpt_blog( $dumketo['blog_excerpt_length'] ) ); ?>
                        <button class="wp-button">More</button>
                    </div>
                </div>
                <div class="home-blog-content mt-3">
                    <div class="home-blog-component">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><?php the_time('j F Y'); ?></li>
                        </ul>                        
                    </div>                    
                    <h4 class="mb-3 font-weight-normal"><?php echo $title; ?></h4>              
                    <a class="text-decoration-none stretched-link" href="<?php echo get_permalink(); ?>"></a>                    
                </div>
            </div>
        <?php endwhile; 
    echo '</div>'; ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
            $("#blog-block").owlCarousel({     
                autoplay:true,
                autoplayTimeout:300000,
                autoplayHoverPause:true,
                loop:false,
                responsiveClass:true,
                responsive:{
                    0   :{ items:1 },
                    600 :{ items:1 },
                    1000:{ items:3 }
                },
                lazyLoad: true,                            
                margin:30,
                smartSpeed:450,
                nav: true,
                navText:[],                    
                dots: true,
                dotsData:false,
            });     
        });
    </script>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'dumketo_blog', 'dumketo_blog' );