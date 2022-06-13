<?php
/**
 * Template for displaying search forms
 */
?>

<form method="get" action="<?php bloginfo('url'); ?>" class="form-inline search">
    <input type="hidden" name="post_type" value="post" />
    <div class="input-group">
        <input class="form-control" type="text" name="s" value="" placeholder="search&hellip;" required="required">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <?php echo do_shortcode( '[img img_name="search" format="png" alt="Search Icon"]' ) ?>   
            </button>
        </span>
    </div>
</form>
