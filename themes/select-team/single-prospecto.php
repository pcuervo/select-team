<?php
	if(!isset($_GET['p_id'])){
		$location = site_url().'/prospecto';
   		wp_redirect( $location );
   		exit;
   	}
   	get_header();

   	$user = get_user_basic_info($_GET['p_id']); 
   	$role = '';
   	if ( is_user_logged_in() ) 
        $role = get_current_user_role();
   	
   	$user_curriculum = get_user_curriculum($user->st_user_id);
   	$tournament_info = get_user_tournament($user->st_user_id);
   	$academic_info = get_user_academic_info($user->st_user_id);
   	
?>
	<div class="container profile clearfix">
		<input type="hidden" class="p_id" value="<?php echo $_GET['p_id']; ?>">
		<h2 class="[ col-xs-12 ]"><?php echo $user->full_name ?></h2>
		<?php if( is_user_logged_in() ){
			if ( $role != 'subscriber' AND $role != 'author') { ?>
				<?php if (qtrans_getLanguage() == 'es'){ ?>
					<span class="[ j-delete-prospect ] [  ] [ margin-bottom ] [ delete-prospect ]">  <i class="fa fa-times-circle"></i> <b class="">Eliminar prospecto</b></span>
					<div class="[ clear ] [ margin-bottom ]"></div>
					<?php if($user->status=='1'){ ?>
						<span class="[ j-status-deactivate ] [  ] [ margin-bottom ] [ delete-prospect ]">  <i class="[ fa fa-dot-circle-o ]"></i> <b class="">Desactivar prospecto</b></span>
						<div class="[ clear ] [ margin-bottom ]"></div>
					<?php } else { ?>
						<span class="[ j-status-activate ] [  ] [ margin-bottom ] [ prospect-inactive ]">  <i class="[ fa fa-circle-o ]"></i> <b class="">Activar prospecto</b></span>
						<div class="[ clear ] [ margin-bottom ]"></div>
					<?php } ?>
				<?php } else { ?>
					<span class="[ j-delete-prospect ] [  ] [ margin-bottom ] [ delete-prospect ]">  <i class="fa fa-times-circle"></i> <b class="">Delete prospect</b></span>
					<div class="[ clear ] [ margin-bottom ]"></div>
					<?php if($user->status=='1'){ ?>
						<span class="[ j-status-deactivate ] [  ] [ margin-bottom ] [ delete-prospect ]"> <i class="[ fa fa-dot-circle-o ]"></i> <b class="">Deactivate prospect</b></span>
						<div class="[ clear ] [ margin-bottom ]"></div>
					<?php } else { ?>
						<span class="[ j-status-activate ] [  ] [ margin-bottom ] [ prospect-inactive ]"> <i class="[ fa fa-circle-o ]"></i> <b class="">Activate prospect</b></span>
						<div class="[ clear ] [ margin-bottom ]"></div>
					<?php }
					}
				}
			} ?>

		<div class="clear"></div>
		<div class="col-xs-12 col-sm-6 col-md-4 student-info margin-bottom right">
		<?php if ( $user->profile_picture != '' && $user->profile_picture != '-' ) { ?>
	        <img src="<?php echo THEMEPATH.'profile_pictures/'.$user->profile_picture ?>" alt="" class="">
	        <?php } elseif ($user->gender=='male') { ?>
	            <img src="<?php echo THEMEPATH.'profile_pictures/profile-01.png'?>" alt="" class="">
	        <?php } elseif ($user->gender=='female') { ?>
	            <img src="<?php echo THEMEPATH.'profile_pictures/profile-02.png'?>" alt="" class="">
	        <?php } ?>
    	    <div class="[ clear ] [ margin-bottom ]"></div>
    	    <?php if (qtrans_getLanguage() == 'es'){ ?>
				<button type="button" class="btn btn-primary [ center block ]" data-toggle="modal" data-target="#student-video"><i class="fa fa-play-circle-o"></i> Ver video</button>
			<?php } else { ?>
				<button type="button" class="btn btn-primary [ center block ]" data-toggle="modal" data-target="#student-video"><i class="fa fa-play-circle-o"></i> Watch video</button>
			<?php } ?>
			<div class="[ clear ] [ margin-bottom ]"></div>
			
			<?php if( is_user_logged_in() ){
				if ( $role != 'subscriber' AND $role != 'author') { ?>
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<button type="button" class="[ btn btn-primary ] [ center block ] [ back-dashboard ]" data-toggle="modal" data-target="#student-video"></i> Todos los prospectos </button>
					<?php } else { ?>
						<button type="button" class="[ btn btn-primary ] [ center block ] [ back-dashboard ]" data-toggle="modal"></i> All the prospects </button>
						<?php }
					}
				} ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8 student-info margin-bottom">
			<?php if (qtrans_getLanguage() == 'es'){ ?>
				<p><b>Fecha de nacimiento:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->date_of_birth ?></p>
			<?php } else { ?>
				<p><b>Date of birth:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->date_of_birth ?></p>
			<?php } ?>
			<hr>
			
			<?php if( is_user_logged_in() ){	
				if ( $role != 'subscriber' AND $role != 'author') { ?>
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<p><b>Escuela:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->high_school) ? $user_curriculum->high_school : '-';  ?></p>
						<hr>
					<?php } else { ?>
						<p><b>School:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->high_school) ? $user_curriculum->high_school : '-';  ?></p>
						<hr>
					<?php } ?>
				<?php }
				} ?>

			<?php if( is_user_logged_in() ){
				if ( $role != 'subscriber' AND $role != 'author') { ?>
					<p><b>Email:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->user_email ?></p>
					<hr>
				<?php }
			} ?>

			<?php if (qtrans_getLanguage() == 'es'){ ?>
				<p><b>Resultado SAT:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->sat) ? $user_curriculum->sat : '-'; ?></p>
				<hr>
			<?php } else { ?>
				<p><b>SAT Score:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->sat) ? $user_curriculum->sat : '-'; ?></p>
				<hr>
			<?php } ?>

			<?php if (qtrans_getLanguage() == 'es'){ ?>
				<p><b>Resultado TOEFL:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->toefl) ? $user_curriculum->toefl : '-'; ?></p>
				<hr>
			<?php } else { ?>
				<p><b>TOEFL Score:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->toefl) ? $user_curriculum->toefl : '-'; ?></p>
				<hr>
			<?php } ?>

			<?php if (qtrans_getLanguage() == 'es'){ ?>
				<p><b>Deporte:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->sport; ?></p>
				<hr>
			<?php } else { ?>
				<p><b>Sport:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $user->sport; ?></p>
				<hr>
			<?php } ?>
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
						if (qtrans_getLanguage() == 'es'){ 
                        	echo '<p><b>Posición:</b> <br class="hidden-sm hidden-md hidden-lg">';
                        	switch ($sport_answers[0]->answer){
                        		case 'forward':
                        			echo 'Delantero';
                        			break;
                        		case 'midfielder':
                        			echo 'Mediocampista';
                        			break;
                        		case 'defender':
                        			echo 'Defensa';
                        			break;
                        		default:
                        			echo 'Portero';

                        	}
                        	echo '</p><hr>';

                        	echo '<p><b>Estatura (cm):</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';
						} else { 
							echo '<p><b>Position:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';
                        	echo '<p><b>Height (cm):</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';
                    	} 
						break;
					case 'golf':
						if (qtrans_getLanguage() == 'es'){ 
                        	echo '<p><b>Puntaje promedio:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';

						} else { 
							echo '<p><b>Average score:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';
                    	} 
						break;
					case 'volleyball':
						if (qtrans_getLanguage() == 'es'){ 
                        	echo '<p><b>Posición:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';
                        	echo '<p><b>Estatura (cm):</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';
						} else { 
							echo '<p><b>Position:</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[0]->answer.'</p><hr>';
							echo '<p><b>Height (cm):</b> <br class="hidden-sm hidden-md hidden-lg">'.$sport_answers[1]->answer.'</p><hr>';
                    	} 
						break;
				}// switch
			?>
			<div class="[ clear ] [ margin-bottom ]"></div>
			<?php if( is_user_logged_in() ){
					if ( $role != 'subscriber' AND $role != 'author') { ?>
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<p><b>Dirección:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->address) ? $user_curriculum->address : '-'; ?></p>
							<hr>
						<?php } else { ?>
							<p><b>Address:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->address) ? $user_curriculum->address : '-'; ?></p>
							<hr>
						<?php } ?>
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<p><b>Teléfono:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->phone) ? $user_curriculum->phone : '-'; ?></p>
							<hr>
						<?php } else { ?>
							<p><b>Phone:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->phone) ? $user_curriculum->phone : '-'; ?></p>
							<hr>
						<?php } ?>
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<p><b>Celular:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->mobile_phone) ? $user_curriculum->mobile_phone : '-'; ?></p>
							<hr>
						<?php } else { ?>
							<p><b>Mobile Phone:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo isset($user_curriculum->mobile_phone) ? $user_curriculum->mobile_phone : '-'; ?></p>
							<hr>
						<?php } ?>
						<?php if(sizeof($academic_info)>0) { ?>
							<?php if (qtrans_getLanguage() == 'es'){ ?>
								<p><b>Historial Académico:</b> <br class="hidden-sm hidden-md hidden-lg"></p>
								<hr>
							<?php } else { ?>
								<p><b>Academic History:</b> <br class="hidden-sm hidden-md hidden-lg"></p>
								<hr>
							<?php } ?>
							<?php foreach ($academic_info as $academic) { ?>
								<div class="[ border-bottom ] [ row ]">
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<p id="Fecha" class="[ col-xs-6 ]"><b>Nombre de la escuela:<br/></b><?php echo $academic->high_school; ?></p>
										<p id="Fecha" class="[ col-xs-6 ]"><b>Fecha de graduación:<br/></b><?php echo substr($academic->graduation_date , 0, 10); ?></p>
										<p id="tournamentRank" class="[ col-xs-6 ]"><b>País:<br/></b><?php echo $academic->country; ?></p>
										<p id="tournamentRank" class="[ col-xs-6 ]"><b>Ciudad:<br/></b><?php echo $academic->city; ?></p>
									<?php } else { ?>
										<p id="Fecha" class="[ col-xs-6 ]"><b>School Name:<br/></b><?php echo $academic->high_school; ?></p>
										<p id="Fecha" class="[ col-xs-6 ]"><b>Graduation date:<br/></b><?php echo substr($academic->graduation_date , 0, 10); ?></p>
										<p id="tournamentRank" class="[ col-xs-6 ]"><b>Country:<br/></b><?php echo $academic->country; ?></p>
										<p id="tournamentRank" class="[ col-xs-6 ]"><b>City:<br/></b><?php echo $academic->city; ?></p>
									<?php } ?>
								</div>
							<?php } ?>

						<?php  } ?>

						<?php if(sizeof($tournament_info)>0) { ?>
						<br/>
							<?php if (qtrans_getLanguage() == 'es'){ ?>
								<p><b>Torneos:</b> <br class="hidden-sm hidden-md hidden-lg"></p>
								<hr>
							<?php } else { ?>
								<p><b>Tournaments:</b> <br class="hidden-sm hidden-md hidden-lg"></p>
								<hr>
							<?php } ?> 
							<?php foreach ($tournament_info as $tournament) { ?>
								<div class="[ border-bottom ] [ row ]">
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<p id="nameTournament" class="[ col-xs-12 ]"><b><?php echo $tournament->name ?></b></p>
										<p id="Fecha" class="[ col-xs-6 ]"><b>Fecha:<br/></b><?php echo substr($tournament->tournament_date , 0, 10) ?></p>
										<p id="tournamentRank" class="[ col-xs-4 ]"><b>Ranking:<br/></b><?php echo $tournament->ranking ?></p>
									<?php } else { ?>
										<p id="nameTournament" class="[ col-xs-12 ]"><b><?php echo $tournament->name ?></b></p>
										<p id="Fecha" class="[ col-xs-6 ]"><b>Date:<br/></b><?php echo substr($tournament->tournament_date , 0, 10) ?></p>
										<p id="tournamentRank" class="[ col-xs-4 ]"><b>Ranking:<br/></b><?php echo $tournament->ranking ?></p>
									<?php } ?>
								</div>
							<?php }
						}
					}
				} ?>
		</div>
	</div>
	<!-- STUDENT VIDEO -->
	<div class="modal fade" id="student-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg">
			<div class="modal-content">
		  		<div class="modal-header clearfix">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  		</div>
				<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
						<?php 
					  	$video_src = get_video_src($user->video_url, $user->video_host);
					  	if(! $video_src)
					  		echo '<p>No hay video</p>';
					  	else { ?>
							<iframe class="embed-responsive-item" src="<?php echo $video_src ?>" frameborder="0" allowfullscreen></iframe>
					  	<?php } ?>
					</div>
				</div>
			</div>
	  	</div>
	</div>
<?php get_footer(); ?>