<?php 
	$status = null;
	$user_id = get_current_user_id();
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mensaje = $_POST["mensaje"];
		$to = $_POST["email-advisor"];
		$from = get_current_user_id();
		$conv = $_POST["conv"];
		
		$status = add_mensaje_conversation($mensaje, $from, $to,$conv);
		header( 'Location: mensajes/?id='.$conv );
	}else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		$conv = $_GET["id"];
		$convData = get_conversacion_info($conv);
		if($user_id == $convData[0]->from_id){
			$from = $convData[0]->to_id;
		}else{
			$from = $convData[0]->from_id;
		}
	}

	$mensajes = get_mensajes_conversations($conv);

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

<div id="page-content-wrapper">
    <div class="[ container-fluid ]" id="page-content">
        <div class="[ row ] [ margin-bottom ]" id="profile">
            <div class="[ col-xs-12 col-sm-7 center block ]">
				<?php 
					foreach ($mensajes as $key => $mensaje) {
				?>	
						<p><?php echo $mensaje->message; ?></p>
						<p><?php echo $mensaje->date; ?></p>
				<?php } ?>
				<form role="form" class="" method="post" >
					
					<input type="hidden" name="conv" value="<?php echo $conv ?>">
					<input type="hidden" name="email-advisor" value="<?php echo $from ?>">
					<div class="clear"></div>
					<textarea rows="4" cols="50" name="mensaje"></textarea>
					<div class="clear"></div>
					<?php if (qtrans_getLanguage() == 'es'){ ?>
						<button type="submit" class=" [ btn-enviar ]">Enviar</button>
					<?php } else { ?>
						<button type="submit" class="[ btn-enviar ]">Send</button>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>