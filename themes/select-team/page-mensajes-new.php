<?php 
	$status = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mensaje = $_POST["mensaje"];
		$to = null;
		
		if($_POST["email-advisor"] != -1 && $_POST["email-advisor"] != '' ){
			$to = $_POST["email-advisor"];
		}else if($_POST["email-advisor-user"] != -1 && $_POST["email-advisor-user"] != ''){
			$to = $_POST["email-advisor-user"];
		}elseif ($_POST["email-advisor-user"] == -1) {
			$to = 'luismendoza@selectteambecas.com';
		}
		
		$from = get_current_user_id();
		$status = register_mensaje($mensaje, $from, $to);
	}
	$role = get_current_user_role();
	$users_st = null;

	if ( $role == 'administrator' ){
		$users_st = get_all_st_user();
	}

?>
<head>
		<meta charset="utf-8">
		<title>Select Team</title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.png">
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
<?php if($status != null){ ?> 
	<?php if($status){ ?> 
	<div class="alert alert-success" role="alert">
		<?php if (qtrans_getLanguage() == 'es'){ ?>
			<p>Tu mensaje ha sido enviado. <i class="fa fa-check"></i></p>
		<?php } else { ?>
			<p>Your message has been sent. <i class="fa fa-check"></i></p>
		<?php } ?>
	</div>
	<?php } else { ?>
	<div class="alert alert-danger" role="alert">
		<?php if (qtrans_getLanguage() == 'es'){ ?>
			<p>Lo sentimos! Algo salió mal. <i class="fa fa-check"></i></p>
		<?php } else { ?>
			<p>Ups! Something went wrong. <i class="fa fa-check"></i></p>
		<?php } ?>
	<?php } ?>
<?php } ?>

<div id="page-content-wrapper">
    <div class="[ container-fluid ]" id="page-content">
        <div class="[ row ] [ margin-bottom ]" id="profile">
            <div class="[ col-xs-12 col-sm-7 center block ]">
				<form role="form" method="post" class="[ j-message ]" id="j-message">
					<img class="[ img-responsive ] [ margin-bottom ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt="Select Team"/>
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<p class="[ margin-bottom ] [ text-right ] [ border-bottom ]"><a href="<?php echo site_url('dashboard'); ?>"><b class=""><i class="fa fa-cogs"></i> Volver a Dashboard</b></a></p>
					<?php } else { ?>
						<p class="[ margin-bottom ] [ text-right ] [ border-bottom ]"><a href="<?php echo site_url('dashboard'); ?>"><b class=""><i class="fa fa-cogs"></i> Go back to Dashboard</b></a></p>
					<?php } ?>
					<div class="[ form-group ]">
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<label for="">Enviar a:</label>
						<?php } else { ?>
							<label for="">Send to:</label>
						<?php } ?>
						<div>
							<?php if($users_st != null){ ?>
								<select class="[ form-control ][ required ][ j-select-user ]" name="email-advisor-user">
									<option value="">Select user</option>
								<?php 
									foreach ($users_st as $key => $user) 
									{
								?>
									<option value="<?php echo $user->id; ?>"><?php echo $user->full_name; ?></option>
								<?php } ?>
								</select>
								<br/>
							<?php } ?>
						</div>
					<div>
						<select class="[ form-control ][ required ][ j-select-advisor ]" name="email-advisor">
							<?php if (qtrans_getLanguage() == 'es'){ ?>
								<option value="">Selecciona un agente o administrador</option>
								<option value="-1">Administrador</option>
							<?php } else { ?>
								<option value="">Select advisor or administrator</option>
								<option value="-1">Administrator</option>
							<?php } ?>
							<?php 
								$users = get_advisors_basic_info(); 
								foreach ($users as $key => $user) 
								{
							?>
								<option value="<?php echo $user->ID; ?>"><?php echo $user->full_name; ?></option>
							<?php } ?>
						</select>
					</div>
					</div>
					<div class="clear"></div>
					<div class="[ form-group ]">
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<label for="">Tu mensaje:</label>
					<?php } else { ?>
						<label for="">Your message:</label>
					<?php } ?>
						<textarea class="[ form-control ] [ margin-bottom ] [ required ]" rows="4" cols="50" name="mensaje"></textarea>
					</div>
					<div class="clear"></div>
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<button type="submit" class="[ btn btn-primary ] [ btn-new-message ] [ btn-enviar ]">Enviar</button>
					<?php } else { ?>
						<button type="submit" class="[ btn btn-primary ] [ btn-new-message ] [ btn-enviar ]">Send</button>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>