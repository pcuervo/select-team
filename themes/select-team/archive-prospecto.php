<?php get_header(); ?>
	<div class="jumbotron banner-prospects" style="background-image:url(' <?php echo THEMEPATH ?>images/banner-golf2.jpg')" ></div>
	<div id="filters">
		<div class="container center block clearfix margin-bottom ui-group prospect-filters">
		<?php if (qtrans_getLanguage() == 'es'){ ?>
			<h2 class="red">Prospectos</h2>
		<?php } else { ?>
			<h2 class="red">Prospects</h2>
		<?php } ?>

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
		<div class="[ margin-bottom ] [ sportContainer ] [ isotope-container-sports ]">
		<?php 
			$users = get_users_basic_info(); 
			foreach ($users as $key => $user) {
		?>
				<a href="<?php echo site_url('prospects'); ?>">
					<div class="<?php echo $user->gender.' '.$user->sport; ?> player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
			  			<img src="<?php echo THEMEPATH.'profile_pictures/'.$user->profile_picture ?>" alt="" class="">
			  			<div class=" info">
			  			  <h4 class="center-text"> <?php echo $user->full_name; ?> </h4>
			  			  <p class="center-text">Sport: <span><?php echo $user->sport; ?></span></p>
			  			</div>
			  		</div>
			  	</a>
		<?php } ?>


<!-- 		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			$argsSport = array(
				'slug' => 'deporte',
			);
			$sportTerm = get_terms( 'deporte', $args );
			$argsGenre = array(
				'slug' => 'genero',
			);
			$genreTerm = get_terms( 'genero', $args );
			$sport 				= $sportTerm[1]->slug;
			$genre 				= $genreTerm[1]->slug;;
			?>
			<div class="[ player <?php echo $sport.' '.$genre; ?> ] [ col-xs-5 col-sm-3 col-md-2 ] [ clearfix margin-bottom ]">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<div class="info">
					<h4 class="center-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p class="center-text">Sport: <span><?php echo $sport; ?></span></p>
				</div>
			</div>
		<?php  endwhile; endif; wp_reset_query(); ?>
		  

 
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
		  -->
		</div>
	</div><!--CONTAINER-FLUID-->

<?php get_footer(); ?>