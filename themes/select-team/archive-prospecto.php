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
			foreach ($users as $key => $user) 
				if($user->profile_picture!='') { ?>
					<a href="<?php echo site_url('prospects').'?p_id='.$user->id ?>">
						<div class="<?php echo $user->gender.' '.$user->sport; ?> player col-xs-5 col-sm-3 col-md-2 clearfix margin-bottom">
				  			<?php if($user->profile_picture!='') {?>
				  			<img src="<?php echo THEMEPATH.'profile_pictures/'.$user->profile_picture ?>" alt="" class="">
				  			<?php } elseif ($user->gender=='male') { ?>
				  				<img src="<?php echo THEMEPATH.'profile_pictures/profile-01.png'?>" alt="" class="">
				  			<?php } elseif ($user->gender=='female') { ?>
				  				<img src="<?php echo THEMEPATH.'profile_pictures/profile-02.png'?>" alt="" class="">
				  			<?php } ?>
				  			<div class=" info">
				  			  <h4 class="center-text"> <?php echo $user->full_name; ?> </h4>
				  			  <p class="center-text">Sport: <span><?php echo $user->sport; ?></span></p>
				  			</div>
				  		</div>
				  	</a>
				<?php } ?>
		</div>
	</div><!--CONTAINER-FLUID-->

<?php get_footer(); ?>