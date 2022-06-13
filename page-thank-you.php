<?php
/**
 * The template for Thank You Pge
**/
get_header(); 
global $dumketo;
$pageID = get_the_ID();
$page = get_post($pageID);
$title = $page->post_name;
$dumketo['thank-page'];
if ( $dumketo['thank-page'] == 1 ):
	echo "<link rel='stylesheet' id='thank-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Montez' type='text/css' media='all' />";
else:
	echo "<link rel='stylesheet' id='thank-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Redressed' type='text/css' media='all' />";
endif;
if ( $dumketo['thank-page'] == 1 ): $font_family = "'Montez', cursive"; else: $font_family = "'Redressed', cursive";
endif;
?>

<style type="text/css">
	.thank-you-section { background: url( '<?php echo get_template_directory_uri(); ?>/images/Bg-<?php echo $dumketo['thank-page']; ?>.jpg' ) no-repeat center center;background-size: cover;min-height: 800px;display: flex;align-items: center; }
	.thank-text {  }
	.thank-text h1 { font-size:100pt;font-weight:400;font-family: <?php echo $font_family; ?>;text-align: center;color: <?php echo $dumketo['thank_content_heading_color']["rgba"]; ?>; }
	.thank-text p { font-size: 20px;line-height: 1.4;text-align: center;color: <?php echo $dumketo['thank_content_paragraph_color']["rgba"]; ?>; }
</style>
   
    <?php
    /**
     *
     * @hooked dumketo_inner_heading  - 10
     *
    **/
    do_action( 'dumketo_inner_heading' ); 
    ?>
	
	<section class="thank-you-section">
        <div class="container">
            <div class="row">                         
                <div class="col-xs-12 col-md-12 col-lg-12">
					<div class="thank-text">
						<h1>Thank You</h1>
						<?php echo wpautop( $dumketo['thank_content'] ); ?>
					</div>					
				</div>
            </div>
        </div>
    </section>
	
	<?php
    get_template_part( 'template-parts/home_part/footer-contact', 'page' );
    ?>

<?php get_footer(); ?>