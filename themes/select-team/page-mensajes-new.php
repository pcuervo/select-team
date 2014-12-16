<?php 
	$status = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mensaje = $_POST["mensaje"];
		$to = $_POST["email-advisor"];
		$from = get_current_user_id();
		
		$status = register_mensaje($mensaje, $from, $to);
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
		<link rel="stylesheet" href="<?php echo THEMEPATH; ?>style.css">
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
		<p>TODO BIEN</p>
	<?php } else { ?>
		<p>TODO MAL</p>
	<?php } ?>
<?php } ?>
<div class="[ container-fluid ]">
	<div id="page-content-wrapper" class="[ row ]">
		<form role="form" class="[ col-xs-12 col-sm-6 col-lg-4 ] [ center block ]" method="post" >
			<a href="<?php echo site_url(); ?>"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt=""></a>
			<h3>Contact an advisor.</h3>
			<div class="[ form-group ]">
				<?php if (qtrans_getLanguage() == 'es'){ ?>
					<label for="">Selecciona un agente</label>
				<?php } else { ?>
					<label for="">Select an advisor</label>
				<?php } ?>
				<select class="[ form-control ]" name="email-advisor">
					<?php 
						$users = get_advisors_basic_info(); 
						foreach ($users as $key => $user) 
						{
					?>
						<option value="<?php echo $user->ID; ?>"><?php echo $user->full_name; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="clear"></div>
			<div class="[ form-group ]">
				<textarea class="[ form-control ]" rows="4" cols="50" name="mensaje"></textarea>
			</div>
			<div class="clear"></div>
			<?php if (qtrans_getLanguage() == 'es'){ ?>
				<button type="submit" class="[ btn btn-primary ] [ btn-enviar ]">Enviar</button>
			<?php } else { ?>
				<button type="submit" class="[ btn btn-primary btn-message ] [ btn-enviar ]">Send</button>
			<?php } ?>
		</form>
	</div>
</div>
<?php get_footer(); ?>