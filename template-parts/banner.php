<?php global $dumketo; ?>
<?php if ( $dumketo["banner-option"]== 'banner' ) { 
$id = $dumketo["banner_link"]; ?>
<section class="banner-sec position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">                                   
                <div class="bannerservice">
                    <?php echo $dumketo["banner-text"]; ?>
                    <a class="shadow hvr-icon-forward" href="">Shop Now <i class="fas fa-long-arrow-alt-right ml-2 align-middle hvr-icon"></i></a>                              
                </div>    
            </div>
        </div>
    </div>
</section>
<?php }elseif ( $dumketo["banner-option"]== 'slider' ) { ?>   
    <div id="homeslider" class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            foreach($dumketo['banner_slides'] as $slide) :
                $picurl = $slide['image']['url'];  
                $img_meta = wp_prepare_attachment_for_js ( $slide['attachment_id'] );
                $description = $slide['description'];
                $url = explode(", ", $slide['url']);
            ?>
                <div class="swiper-slide">
                    <div class="slideshow__slide__image bg-overlay" style="background-image:url(<?php echo $picurl; ?>)">
                        <div class="meta">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <?php echo do_shortcode( wpautop( $description )); ?>
                                        <?php if( $url[0] ): ?>
                                            <a data-swiper-animation="fadeInLeft" data-delay=".5s" class="btn-card" href="<?php echo home_url(); ?>/<?php echo $url[0] ?>/"><?php echo $url[1] ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if( $dumketo['slider_pagination'] == 'true' ): ?>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-white"></div>
            <?php endif; ?>
            <?php if( $dumketo['slider_navigation'] == 'true' ): ?>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            <?php endif; ?>
        </div>
    </div>    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        var swiperAnimation = new SwiperAnimation();
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            effect: 'fade',
            grabCursor: true,
            loop: <?php echo $dumketo['slider_slideshow']; ?>,
            autoplay: {
                delay: <?php echo $dumketo['slider_interval']; ?>,
                disableOnInteraction: false,
            },
            <?php if( $dumketo['slider_pagination'] == 'true' ): ?>
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            <?php endif; ?>
            <?php if( $dumketo['slider_navigation'] == 'true' ): ?>
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            <?php endif; ?>
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            fadeEffect: {
                crossFade: true
            },
            on: {
                init: function () {
                swiperAnimation.init(this).animate();
                },
                slideChange: function () {
                swiperAnimation.init(this).animate();
                // hypeDocument.startTimelineNamed('default_hype_container');
                }
            }
        });
        
        
    });
    </script>
<?php } else { ?>
    <div class="swiper-container video-container" dir="rtl">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <video id="video" src="<?php echo $dumketo["background_video"]["url"]; ?>" autoplay muted loop></video>
                <div class="meta">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <?php echo do_shortcode($dumketo["video_banner_text"]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="et_pb_bottom_inside_divider"></div>
    </div>    
    <script type="text/javascript">
    jQuery(document).ready(function($) { 
        var swiper = new Swiper('.swiper-container', {            
            loop:false,
            autoplay: 300000
        });
        document.getElementById('video').play();
    });
    </script>
<?php } ?>