<?php
	get_header();
	the_post();
	$argsSport = array(
		'slug' => 'deporte',
	);
	$sportTerm = get_terms( 'deporte', $args );
	$sport 	= $sportTerm[1]->name;
?>
	<div class="container profile clearfix">
		<h2 class="col-xs-12 margin-bottom"><?php the_title(); ?></h2>
		<div class="col-xs-12 col-sm-6 col-md-4 student-info margin-bottom right">
			<?php the_post_thumbnail('thumbnail', array('class' => 'margin-bottom')); ?>
			<button type="button" class="btn btn-primary center block" data-toggle="modal" data-target="#student-video"><i class="fa fa-play-circle-o"></i> Watch video</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8 student-info margin-bottom">
			<p><b>Day of birth:</b> <br class="hidden-sm hidden-md hidden-lg">March 27, 1990.</p>
			<hr>
			<p><b>School:</b> <br class="hidden-sm hidden-md hidden-lg">Tecnólogico de Monterrey.</p>
			<hr>
			<p><b>Expected graduation:</b> <br class="hidden-sm hidden-md hidden-lg">June, 2015.</p>
			<hr>
			<p><b>Current academic level:</b> <br class="hidden-sm hidden-md hidden-lg">12th.</p>
			<hr>
			<p><b>Email:</b> <br class="hidden-sm hidden-md hidden-lg"><a href="mailto:rebeca.esparza@gmail.com">rebeca.esparza@gmail.com</a></p>
			<hr>
			<p><b>Sport:</b> <br class="hidden-sm hidden-md hidden-lg"><?php echo $sport; ?></p>
			<hr>
			<p><b>Average score:</b> <br class="hidden-sm hidden-md hidden-lg">81-84</p>
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