<?php get_header(); ?>
    <?php 
	$args = array(
		'post_type'   => 'padre',
		'order'       => 'ASC'
	);

    $queryBannerAcerca = new WP_Query( $args );
    if ( $queryBannerAcerca->have_posts() ) : while ( $queryBannerAcerca->have_posts() ) : $queryBannerAcerca->the_post(); 
    	$imgUrl=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    ?>
		<div class="jumbotron banner-parents" style="background-image:url(' <?php echo $imgUrl[0];  ?>')" ></div>
 	<?php break; endwhile; endif; wp_reset_query(); ?>

		
    <div class="container clearfix">
        <div class="col-xs-11 center-block margin-bottom">

        <?php 
        $args = array(
		'post_type'   => 'padre',
		'order'       => 'ASC'
		);
	    $queryAcerca = new WP_Query( $args );
	    $count=0;
        if ( $queryAcerca->have_posts() ) : while ( $queryAcerca->have_posts() ) : $queryAcerca->the_post();?>
			<h2 class="red"><?php the_title(); ?></h2>
			<?php the_content(); 
			$count++; 
			if($count=='3'){?>
	            <hr>
	            <div class="clearfix">
	                <p class="center-text">Does your son qualify for a sports scholarship at a university in the United States?</p>
	                <p class="center-text">Complete the form and we will evaluate your chances!</p>
	                <a href="<?php echo site_url( 'register' );?>?prosprectOpen" type="button" class="btn btn-info col-xs-8 col-md-5 center block freeAssesment">Free Assesment</a>
	            </div>
	            <hr>
	 	<?php } endwhile; endif; ?>

    	</div>
    </div><!--CONTAINER-FLUID-->

<?php get_footer(); ?>