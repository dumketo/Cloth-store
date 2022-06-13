<?php
while ( have_posts() ) : the_post(); 
    the_content();
endwhile; wp_reset_query();
?>
