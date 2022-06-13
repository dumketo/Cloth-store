<?php
/**
 * The template part for displaying results in search pages
**/
$post->ID;
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'thumbnail') );
?>
<div class="blog">
    <ul class="post-container list-inline list-unstyled">
        <li class="col-md-3">
            <div class="date">
                <?php $real_date=get_the_date(); $date = explode(" ",$real_date); $day=explode(",",$date[1]); ?> 
                <?php echo $day[0]; ?>, <br /> <?php echo substr("$date[0]",0,3);?>-<?php echo $date[2]; ?>
            </div>
        </li>
        <li class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Window-Cleaning-Gold-Coast-Blog-Person-Icon.png" alt="Window-Cleaning-Gold-Coast-Blog-Person-Icon"> 
            <?php echo esc_html( get_the_author() ); ?>
        </li>
        <li class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Window-Cleaning-Gold-Coast-Blog-Comment-Icon.png" />
            <?php $commentscount = get_comments_number(); 
            if ( $commentscount == 0 ){
                echo 'No Comments';
            }else{
                echo $commentscount;
            }
            ?>
        </li>
        <li class="col-md-3"></li>
    </ul>
    <?php 
    if( has_post_thumbnail() ) { 
        the_post_thumbnail( "blog-thumb", array( "class" => "img-responsive blog-thumb center-block" ) );
    } 
    ?>
    <div class="blog-content">
    <h1>
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h1>
    <?php the_excerpt(); ?>
    </div>
</div>