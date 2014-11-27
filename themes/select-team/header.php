<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--FONT AWESOME-->
	    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<?php wp_head(); ?>
	    <!--TYPEKIT-->
	    <script src="//use.typekit.net/nwo2lbv.js"></script>
	    <script>try{Typekit.load();}catch(e){}</script>
	</head>
	<body class="body-home">
	    <div class="[ container-fluid ]">
	        <header class="[ clearfix ]">
	            <nav class="[ hidden-md hidden-lg ] [ navbar navbar-default ]" role="navigation">
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="[ navbar-header ]">
	                  <button type="button" class="[ navbar-toggle collapsed ]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="[ sr-only ]"></span>
	                    <i class="[ fa fa-bars ]"></i>
	                  </button>
	                  <a class="[ navbar-brand ]" href="index.html"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt=""></a>
	                </div>

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="[ collapse navbar-collapse navbar-mobile ]" id="bs-example-navbar-collapse-1">
	                    <ul class="[ nav navbar-nav ]">
	                        <li class="[ menu ]"><a href="<?php echo site_url('index.php'); ?>">About</a></li>
	                        <li class="[ menu ]"><a href="<?php echo site_url('prospects.php'); ?>">Prospects</a></li>
	                    <!--<li class="[ menu ]"><a href="coaches.html">Coaches</a></li>-->
	                        <li class="[ menu ]"><a href="<?php echo site_url('parents.php'); ?>">Parents</a></li>
	                        <li class="[ menu ]"><a href="<?php echo site_url('contact.php'); ?>">Contact</a></li>
	                    </ul>
	                </div><!-- /.navbar-collapse -->
	            </nav>
	            <div class="[ container ] [ hidden-xs hidden-sm ] [ header-top ] [ clearfix ]">
	                <h1>
	                    <a href="index.html">
	                        <img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team.png" alt="Select Team"/>
	                    </a>
	                </h1><ul class="[ clearfix ]">
	                    <li><a class="[ center block ]" href="<?php echo site_url('index.php'); ?>">About</a></li>
	                    <li><a class="[ center block ]" href="<?php echo site_url('prospects.php'); ?>">Prospects</a></li>
	                <!--<li class="clearfix"><a class="[ center block ]" href="coaches.html">Coaches</a></li>-->
	                    <li><a class="[ center block ]" href="<?php echo site_url('parents.php'); ?>">Parents</a></li>
	                    <li><a class="[ center block ]" href="<?php echo site_url('contact.php'); ?>">Contact</a></li>
	                </ul>
	                <div class="[ registro ]">
	                    <!--<p class="[ text-center ]"  id="j-login">
	                      <i class="[ fa fa-user fa-1x ]"></i>
	                      <a href="" data-toggle="modal"  data-target="#Login">Login</a>
	                    </p>
	                    <p class="[ text-center ]" id="j-logout">
	                      <i class="[ fa fa-user fa-1x ]"></i>
	                      <a href="" id="j-logoutLink" data-toggle="modal" data-target="#Logout">Logout</a>
	                    </p>-->
	                    <?php own_wp_loginout(); ?>
	                    <p class="[ center-text ]"><a href="">English</a> | <a href="">Español</a></p>
	                </div> 
	            </div>
	            <div class="[ header-bottom ]">
	                <div class="[ container ]">
	                    <p class="[ text-center ] [ col-xs-12 col-md-9 ] [ center block ]">
	                        Select Team creates new opportunities for students and helps athletes to become part of a sports team with an scholarship in universities in the United States.
	                    </p>
	                    <img class="[ col-xs-6 col-sm-5 col-md-2 ] [ center block ]" src="<?php echo THEMEPATH; ?>images/icon-sports.png" alt="">
	                </div>
	            </div>
	        </header>
	        <div class="[ content clearfix ]">