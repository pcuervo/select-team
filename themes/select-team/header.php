<html !doctype>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--FONT AWESOME-->
	    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	    <!--TYPEKIT-->
	    <script src="//use.typekit.net/nwo2lbv.js"></script>
	    <script>try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<?php $page_slug; if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>
	<body <?php
		if(is_page()){
			body_class($page_slug);
		} else {
			body_class();
		}
		?> >
	    <div class="[ container-fluid ]">
	        <header class="[ clearfix ]">
	            <nav class="[ hidden-md hidden-lg ] [ navbar navbar-default ]" role="navigation">
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="[ navbar-header ]">
	                  <button type="button" class="[ navbar-toggle collapsed ]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="[ sr-only ]"></span>
	                    <i class="[ fa fa-bars ]"></i>
	                  </button>
	                  <a class="[ navbar-brand ]" href="<?php echo site_url('index.php'); ?>"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt=""></a>
	                </div>

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="[ collapse navbar-collapse navbar-mobile ]" id="bs-example-navbar-collapse-1">
	                    <ul class="[ nav navbar-nav ]">
	                        <li class="[ menu ]"><a href="<?php echo site_url('acerca'); ?>">About</a></li>
	                        <li class="[ menu ]"><a href="<?php echo site_url('prospecto'); ?>">Prospects</a></li>
	                    <!--<li class="[ menu ]"><a href="coaches.html">Coaches</a></li>-->
	                        <li class="[ menu ]"><a href="<?php echo site_url('padre'); ?>">Parents</a></li>
	                        <li class="[ menu ]"><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
	                    </ul>
	                </div><!-- /.navbar-collapse -->
	            </nav>
	            <div class="[ container ] [ hidden-xs hidden-sm ] [ header-top ] [ clearfix ]">
	            	<input type="hidden" id="current_url" value="<?php echo site_url(); ?>"/>
	                <h1>
	                    <a href="<?php echo site_url('index.php'); ?>">
	                        <img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team.png" alt="Select Team"/>
	                    </a>
	                </h1><ul class="[ clearfix ]">
	                    <li><a class="[ center block ]" href="<?php echo site_url('acerca'); ?>">About</a></li>
	                    <li><a class="[ center block ]" href="<?php echo site_url('prospecto'); ?>">Prospects</a></li>
	                <!--<li class="clearfix"><a class="[ center block ]" href="coaches.html">Coaches</a></li>-->
	                    <li><a class="[ center block ]" href="<?php echo site_url('padre'); ?>">Parents</a></li>
	                    <li><a class="[ center block ]" href="<?php echo site_url('contact'); ?>">Contact</a></li>
	                </ul>
	                <div class="[ registro ]">
	                    <?php own_wp_loginout(); ?>
	                    <p class="[ center-text ] [ no-margin ]"><a href="">English</a> | <a href="">Español</a></p>
	                </div> 
	            </div>
	            <?php if(is_home()){ ?>
		            <div class="[ header-bottom ]">
		                <div class="[ container ]">
		                    <p class="[ text-center ] [ col-xs-12 col-md-9 ] [ center block ]">
		                        Select Team creates new opportunities for students and helps athletes to become part of a sports team with an scholarship in universities in the United States.
		                    </p>
		                    <img class="[ col-xs-6 col-sm-5 col-md-2 ] [ center block ]" src="<?php echo THEMEPATH; ?>images/icon-sports.png" alt="">
		                </div>
		            </div>
		        <?php } ?>    
	        </header>
	        <div class="[ content clearfix ]">