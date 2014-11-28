<?php get_header(); ?>
    <?php 
	$args = array(
		'post_type'   => 'prospecto',
		'order'       => 'ASC'
	);

    $queryBannerAcerca = new WP_Query( $args );
    if ( $queryBannerAcerca->have_posts() ) : while ( $queryBannerAcerca->have_posts() ) : $queryBannerAcerca->the_post(); 
    	$imgUrl=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    ?>
		<div class="jumbotron banner-prospects" style="background-image:url(' <?php echo $imgUrl[0];  ?>')" ></div>
 	<?php break; endwhile; endif; wp_reset_query(); ?>

		
    <div id="filters">
        <div class="container center block clearfix margin-bottom ui-group">

        <?php 
        $args = array(
		'post_type'   => 'prospecto',
		'order'       => 'ASC'
		);
	    $queryAcerca = new WP_Query( $args );
	    $count=0;
        if ( $queryAcerca->have_posts() ) : while ( $queryAcerca->have_posts() ) : $queryAcerca->the_post(); ?>
			<h2 class="red"><?php the_title(); ?></h2>
			<?php the_content(); 
			$count++; 
			if($count=='1'){?>
	
            <div class="[ isotope-filters-sports ]">
              <div class="[ prospects ] [ margin-bottom clearfix ] [ sportFilter button-group text-center ]" id="sportAll" data-active="">
                <button type="button" class="btn btn-primary sport" data-filter="*">All </button>
                <button type="button" class="btn btn-primary sport" data-filter=".tennis"><img src="<?php echo THEMEPATH; ?>images/tennis-icon.png" alt=""> <span class="hidden-xs">Tennis</span></button>
                <button type="button" class="btn btn-primary sport" data-filter=".golf"><img src="<?php echo THEMEPATH; ?>images/golf-icon.png" alt=""> <span class="hidden-xs">Golf</span></button>
                <button type="button" class="btn btn-primary sport" data-filter=".soccer"><img src="<?php echo THEMEPATH; ?>images/soccer-icon.png" alt=""> <span class="hidden-xs">Soccer</span></button>
                <button type="button" class="btn btn-primary sport" data-filter=".volleyball"><img src="<?php echo THEMEPATH; ?>images/volleyball-icon.png" alt=""> <span class="hidden-xs">Volleyball</span></button>
              </div>
              <div class="[ prospects ] [ center margin-bottom ] [ block ] [ clearfix ] [ genderFilter button-group text-center ]" id="genderAll" data-active="">
                <button type="button" class="btn btn-primary gender" data-filter="*">All</button>
                <button type="button" class="btn btn-primary gender" data-filter=".male">Male</button>
                <button type="button" class="btn btn-primary gender" data-filter=".female">Female</button>
              </div>
            </div><!-- isotope-filters -->
        </div>
        <div class="[ container ] [ margin-bottom ] [ sportContainer ] [ isotope-container-sports ]">
          <div class="female soccer player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class="info">
              <h4 class="center-text">Julia Zegër</h4>
              <p class="center-text">Sport: <span>Soccer</span></p>
            </div>
          </div>
          <div class="male tennis player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-01.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Carlos H.</h4>
              <p class="center-text">Sport: <span>Tennis</span></p>
            </div>
          </div>
          <div class="female tennis player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Tania Ruiz</h4>
              <p class="center-text">Sport: <span>Tennis</span></p>
            </div>
          </div>
          <div class="male soccer player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-01.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Antonio Villa</h4>
              <p class="center-text">Sport: <span>Soccer</span></p>
            </div>
          </div>
          <div class="male tennis player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-01.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Diego Mozas</h4>
              <p class="center-text">Sport: <span>Tennis</span></p>
            </div>
          </div>
          <div class="female volleyball player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Gabriela M.</h4>
              <p class="center-text">Sport: <span>Volleyball</span></p>
            </div>
          </div>
          <div class="male volleyball player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-01.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Julio Peres</h4>
              <p class="center-text">Sport: <span>Volleyball</span></p>
            </div>
          </div>
          <div class="female volleyball player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Aislin Barreto</h4>
              <p class="center-text">Sport: <span>Volleyball</span></p>
            </div>
          </div>
          <div class="female volleyball player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Karla Bustillos</h4>
              <p class="center-text">Sport: <span>Volleyball</span></p>
            </div>
          </div>
          <div class="male tennis player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-01.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Aldo M.</h4>
              <p class="center-text">Sport: <span>Tennis</span></p>
            </div>
          </div>
          <div class="female tennis player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Estefania G.</h4>
              <p class="center-text">Sport: <span>Tennis</span></p>
            </div>
          </div>
          <div class="female soccer player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
            <img src="<?php echo THEMEPATH; ?>images/profile-02.png" alt="" class="">
            <div class=" info">
              <h4 class="center-text">Shadia S.</h4>
              <p class="center-text">Sport: <span>Soccer</span></p>
            </div>
          </div>
 		<?php } endwhile; endif; ?>

    	</div>
    </div><!--CONTAINER-FLUID-->

<?php get_footer(); ?>