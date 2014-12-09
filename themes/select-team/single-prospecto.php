<?php
	if(!isset($_GET['p_id'])){
		$location = site_url().'/prospecto';
   		wp_redirect( $location );
   		exit;
   	}
   	get_header();
   	$user = get_user_basic_info($_GET['p_id']); 
   	$user_curriculum = get_user_curriculum($user->st_user_id);
?>
	<div class="container profile clearfix">
		<h2 class="col-xs-12 margin-bottom"><?php echo $user->full_name ?></h2>
		<div class="col-xs-12 col-sm-6 col-md-4 student-info margin-bottom right">
			<img src="<?php echo THEMEPATH.'profile_pictures/'.$user->profile_picture ?>" alt="" class="margin-bottom">
			<button type="button" class="btn btn-primary center block" data-toggle="modal" data-target="#student-video"><i class="fa fa-play-circle-o"></i> Watch video</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8 student-info margin-bottom">
			<p><b>Date of birth:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->date_of_birth ?></p>
			<hr>
			<p><b>School:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user_curriculum->high_school ?></p>
			<hr>
			<p><b>Expected graduation:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo substr($user_curriculum->graduation_date , 0, 10)?></p>
			<hr>
			<p><b>Current academic level:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user_curriculum->graduate_year ?></p>
			<hr>
			<p><b>Email:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->user_email ?></p>
			<hr>
			<p><b>Sport:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->sport; ?></p>
			<hr>
			<?php 
				$sport_answers = get_user_sport_answers($user->st_user_id);

				switch ($user->sport) {
					case 'tennis':
						if (qtrans_getLanguage() == 'es'){ 
                        	echo '<p><b>Mano:</b> <br class="hidden-sm hidden-md hidden-lg">';
                        	if($sport_answers[0]->answer == 'right') 
                        		echo 'derecha';
                        	else
                        		echo 'izquierda';
                        	echo '</p><hr>';

                        	echo '<p><b>Ranking FMT:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';

                        	echo '<p><b>¿Has jugado torneos ATP?:</b> <br class="hidden-sm hidden-md hidden-lg">';
                        	if($sport_answers[2]->answer == 1) 
                        		echo 'Si';
                        	else
                        		echo 'No';
                        	echo '</p>';
						} else { 
							echo '<p><b>Hand:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';

							echo '<p><b>FMT Ranking:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';

							echo '<p><b>Have you played an ATP tournament?:</b> <br class="hidden-sm hidden-md hidden-lg">';
                        	if($sport_answers[2]->answer == 1) 
                        		echo 'Yes';
                        	else
                        		echo 'No';
                        	echo '</p>';
                    	} 

						break;
					case 'soccer':
						
						break;
					case 'golf':
						
						break;
					case 'volleyball':
						
						break;
				}// switch
			?>
		</div>
	</div>

  <!-- STUDENT VIDEO -->
	<div class="modal fade" id="student-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header clearfix">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  </div>
		  <div class="modal-body">
			 <div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6UhXAHmCxHw" frameborder="0" allowfullscreen></iframe>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<?php get_footer(); ?>