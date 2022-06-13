<?php global $dumketo; ?>
<footer>
    <?php
    /**
     *
     * @hooked dumketo_site_credit - 10
     *
    **/
    do_action( 'dumketo_credit' );
    ?>
</footer>
</section>
<?php if( $dumketo['both_footer_include'] == 1):
    echo '';
endif;
?>
<?php wp_footer(); ?>