<?php get_header(); ?>

    <?php 
	$args = array(
		'post_type'   => 'acerca',
		'order'       => 'ASC'
	);

    $queryBannerAcerca = new WP_Query( $args );
    if ( $queryBannerAcerca->have_posts() ) : while ( $queryBannerAcerca->have_posts() ) : $queryBannerAcerca->the_post(); 
    	$imgUrl=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    ?>
		<div class="jumbotron banner-about" style="background-image:url(' <?php echo $imgUrl[0];  ?>')" ></div>
 	<?php break; endwhile; endif; wp_reset_query(); ?>

		
    <div class="container clearfix">
        <div class="col-xs-11 center-block margin-bottom">

        <?php 
        $args = array(
		'post_type'   => 'acerca',
		'order'       => 'ASC'
		);
	    $queryAcerca = new WP_Query( $args );
        if ( $queryAcerca->have_posts() ) : while ( $queryAcerca->have_posts() ) : $queryAcerca->the_post(); ?>
			<h2 class="red"><?php the_title(); ?></h2>
			<?php the_content(); ?>
	 	<?php endwhile; endif; ?>

    	</div>
    </div><!--CONTAINER-FLUID-->

<?php get_footer(); ?>