<?php
add_action ( 'wp_head', 'dynamic_css' );
function dynamic_css() {
    global $dumketo; ?>
    <style type="text/css">
    <?php if( $dumketo["banner-option"]== 'banner' ):?>
        .bannerservice { display: flex;justify-content: center;flex-direction: column;min-height: 660px; }
        .bannerservice h1 { font-size: 37px;color: #fff;line-height: 1.4;font-weight: 700;margin-bottom: 0;background: #070248;padding: 10px 20px; }
        .bannerservice h2 { font-size: 14pt;color: #181818;line-height: 1.4;font-weight: 400;margin-bottom: 1rem; }
        .bannerservice h3 { color: #00050A; font-size: 17px;background: #fff;padding: 10px 20px;font-weight: 700;line-height: 1.4; }
        .bannerservice a { background: #070248;padding: 12px 30px;text-transform: capitalize;font-weight: 700;margin-top: 0px;color: #fff;font-size: 18px;border-radius: 4px;text-align: center;display: inline-block;width: 200px; }
    <?php endif; ?>
    <?php if( $dumketo["banner-option"]== 'slider' ):?>
        /* div#homeslider .bg-overlay { position: relative; z-index: 2; }
        div#homeslider .bg-overlay:after { background-color: rgba(0,0,0,0.74);opacity: 0.45;transition: background 0.3s, border-radius 0.3s, opacity 0.3s; position: absolute; z-index: -1; top: 0; left: 0; width: 100%; height: 100%; content: ""; }*/
        div#homeslider.swiper-container { width: 100%; height: 100%; }
        div#homeslider .swiper-slide { height: <?php echo $dumketo['slider_height'] ?>px; }
        div#homeslider .swiper-pagination-bullets { bottom: 25px; left: 0; width: 100%; }
        div#homeslider .swiper-pagination-bullet { margin: 0 4px;width: 15px; height: 15px;background: #fff;opacity: 1; }
        div#homeslider .swiper-pagination-bullet-active { background: #14b2c4; }
        .swiper-button-prev, .swiper-container-rtl .swiper-button-next { left: 60px; right: auto; background: #fff; color: #000; padding: 20px 22px; border-radius: 50%; }
        .swiper-button-prev:hover, .swiper-container-rtl .swiper-button-next:hover { color: #14b2c5; }
        .swiper-button-next, .swiper-container-rtl .swiper-button-prev { right: 60px; left: auto;background: #fff; color: #000; padding: 20px 22px; border-radius: 50%; }
        .swiper-button-next:hover, .swiper-container-rtl .swiper-button-prev:hover { color: #14b2c5; }
        .swiper-container-rtl .swiper-button-prev:hover { color: #14b2c5; }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 20px; }
       
        div#homeslider .slideshow__slide__image { width: 100%; height: 100%; background-position: center; background-size: cover; }  
        div#homeslider .meta { position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 100%;text-align: left; }
        div#homeslider .meta h2 { font-size: 35pt; margin: 0 0 15px; line-height: 1.2; font-weight: 400;color: #000;font-family: 'Staatliches', cursive; }

        div#homeslider .meta h3 { font-size: 20pt; margin: 0 0 10px; line-height: 1.3; font-weight: 400;text-shadow: 1px 1px 1px rgba(0,0,0,0.15);  }
        div#homeslider .meta p { margin-bottom: 10px;font-size: 15px;text-align: left;font-weight: 400;opacity: 0; -webkit-transition: all .6s cubic-bezier(0.215, 0.61, 0.355, 1) 1.4s; transition: all .6s cubic-bezier(0.215, 0.61, 0.355, 1) 1.4s; -webkit-transform: translate3d(-20%, 0, 0); transform: translate3d(-20%, 0, 0); }
        div#homeslider .swiper-slide.swiper-slide-active .meta p { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); opacity: 1; }
        div#homeslider .meta a.btn-card { display: inline-block;position: relative;cursor: pointer;outline: none;white-space: nowrap;margin: 25px 0 0;font-size: 17px;height: 50px;line-height: 15px;color: #000;font-weight: 600;text-transform: capitalize;background: #fff;border-radius: 5px;padding: 17px 40px; }
        div#homeslider .meta .btn-large { padding: 0 26px;font-size: 16px;height: 46px;line-height: 46px; }
        div#homeslider .meta a.btn-card:hover, div#homeslider .meta a.btn-card:focus { text-decoration: none;outline: 0; }
    <?php endif; ?>
    <?php if( $dumketo["banner-option"]== 'video' ):?>
        .video-container { height: 80vh; }
        #video { width: 100%; }
        .video-container .meta { position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 100%;text-align: left; }
        .video-container .meta h2 { font-size: 42px; margin: 0 0 20px; line-height: 1.2em; font-weight: 600;color: #000; }
        .video-container .meta h3 { font-size: 20pt; margin: 0 0 10px; line-height: 1.3; font-weight: 400;  }
        .video-container .meta p { margin-bottom: 10px;font-size: 16px;text-align: left;font-weight: 400;line-height: 1.7em;color: #000; }
        .video-container .meta a.btn-card { display: inline-block;position: relative;cursor: pointer;outline: none;white-space: nowrap;margin: 20px 0 0;font-size: 21px;height: 55px;line-height: 40px;color: #FFF;font-weight: 600;text-transform: capitalize;background: transparent;border-radius: 3px;padding: 0.3em 1em; border: 2px solid #e9f2f5 }
        .video-container .meta .btn-large { padding: 0 26px;font-size: 16px;height: 46px;line-height: 46px; }
        .video-container .meta a.btn-card:hover, div#homeslider .meta a.btn-card:focus { text-decoration: none;outline: 0;background: #e9f2f5;color: #00a0b3 }
    <?php endif; ?>
    <?php if( isset($dumketo['scrollheight']) ): ?>
		.scroll {height: <?php echo $dumketo['scrollheight']; ?>px;}
    <?php endif; ?>
    <?php if( $dumketo["main_nav_sticky"]==1 ) : ?>
        div#head-section-sticky-wrapper { height: <?php echo $dumketo['is_sticky_nav_height']; ?> !important; }
        .is-sticky .head-section { padding: 15px 0;background: <?php echo $dumketo['is_sticky_nav_bg']; ?>;margin-top: 0 !important;box-shadow: 0px 27px 21px rgb(0 0 0 / 25%); } 
        img.logo { -webkit-transition: width .4s ease,opacity .3s ease;transition: width .4s ease,opacity .3s ease; }
        .is-sticky img.logo { }
        div#main-menu {  -webkit-transition: padding .4s ease,opacity .2s .2s ease;  transition: padding .4s ease,opacity .2s .2s ease;  }
        .head-section { -webkit-transition: padding .4s ease,opacity .2s .2s ease; transition: padding .4s ease,opacity .2s .2s ease; }
    <?php endif; ?>
    <?php if ( $dumketo['float_social'] == 1 ) : ?>
        .social-sidebar-left { position: fixed; left: 0; top: 32%; z-index: 5;text-align: left;  }
        .social-sidebar-left ul { padding: 0;margin: 0; }       
        .social-sidebar-left ul li:last-child { border-bottom: 0; }
        .social-sidebar-left ul li a  {  color: #fff; display: block; }
        .social-sidebar-right { position: fixed; right: 0; top: 50%; z-index: 5;text-align: left; width: 228px;padding: 10px 0 }
        .social-sidebar-right ul { padding: 0;margin: 0; }
        .social-sidebar-right ul li a {  color: #fff; display: block; }
        .social-sidebar-left ul li { margin-bottom: -2px; }
    <?php endif; ?>
    <?php if( $dumketo["content-show-option"]==3 ) : ?>
        .white-popup { position: relative; background: #fff; padding: 30px; width: auto; max-width: 1170px; margin: 20px auto; -webkit-transition: 1s all; transition: 1s all;line-height: 1.4;font-size: 17px;    overflow-y: scroll;height: 900px; }
        .white-popup button.mfp-close { background: #d90000; color: #fff !important; margin: 10px; padding: 0px 12px;font-size: 30pt;position: fixed; right: 21%; top: 3%; }
        .mfp-bg {}
        .mfp-fade.mfp-bg { opacity: 0; -webkit-transition: all 0.15s ease-out; transition: all 0.15s ease-out; }
        .mfp-fade.mfp-bg.mfp-ready { opacity: 0.8; }
        .mfp-fade.mfp-bg.mfp-removing { opacity: 0; }
        .mfp-fade.mfp-wrap .mfp-content { opacity: 0; -webkit-transition: all 0.4s ease-out; transition: all 0.4s ease-out; }
        .mfp-fade.mfp-wrap.mfp-ready .mfp-content { opacity: 1; }
        .mfp-fade.mfp-wrap.mfp-removing .mfp-content { opacity: 0; }
        .white-popup::-webkit-scrollbar {background-color:#eee;width:10px;}
        .white-popup::-webkit-scrollbar-thumb { border:1px #eee solid;border-radius:2px;background:#777; -webkit-box-shadow: 0 0 8px #555 inset;box-shadow: 0 0 8px #555 inset; -webkit-transition: all .3s ease-out;transition: all .3s ease-out; }
        .white-popup::-webkit-scrollbar-track {-webkit-box-shadow: 0 0 2px #ccc;box-shadow: 0 0 2px #ccc;}
    <?php endif; ?>
    </style>
<?php } ?>
