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

		if ($user_id == $convData[0]->from_id){
			$from = $convData[0]->to_id;
		}else if ($user_id == $convData[0]->to_id){
			$from = $convData[0]->from_id;
		}else {
			header( 'Location: ../' );
		}
	}
	$dest=$convData[0]->to_id;
	//var_dump($convData);
	$display_name = get_user_display_name($dest);
	$disp_name =$display_name[0]->display_name;
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
            	<img class="[ img-responsive ] [ margin-bottom ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt="Select Team"/>
            	<?php if (qtrans_getLanguage() == 'es'){ ?>
					<p class="[ margin-bottom ] [ text-right ] [ border-bottom ]"><a href="<?php echo site_url('dashboard'); ?>"><b class=""><i class="fa fa-cogs"></i> Volver a Dashboard</b></a></p>
					<h3>Conversación con <?php echo $disp_name; ?></h3>
				<?php } else { ?>
					<p class="[ margin-bottom ] [ text-right ] [ border-bottom ]"><a href="<?php echo site_url('dashboard'); ?>"><b class=""><i class="fa fa-cogs"></i> Go back to Dashboard</b></a></p>
					<h3>Conversation with <?php echo $disp_name; ?></h3>
				<?php } ?>
				<?php
					foreach ($mensajes as $key => $mensaje) {
				?>
					<?php if($mensaje->receptor == $user_id) {?>
						<div class="[ message user ]">
							<p class="[ conversation-date ]"><?php echo $mensaje->date; ?></p>
							<p class="[ conversation-text ]"><?php echo $mensaje->message; ?></p>
						</div>
					<?php } else { ?>
						<div class="[ message advisor ]">
							<p class="[ conversation-date ]"><?php echo $mensaje->date; ?></p>
							<p class="[ conversation-text ]"><?php echo $mensaje->message; ?></p>
						</div>
					<?php } ?>
				<?php } ?>
				<form role="form" id="j-send-mes" method="post" class="[ j-send-mes ]">
					<input type="hidden" name="conv" value="<?php echo $conv ?>">
					<input type="hidden" name="email-advisor" value="<?php echo $from ?>">
					<div class="[ clear ] [ margin-bottom ]"></div>
					<div class="[ form-group ]">
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<label for="">Tu mensaje:</label>
						<?php } else { ?>
							<label for="">Your message:</label>
						<?php } ?>
							<textarea class="[ form-control ] [ margin-bottom ][ required ]" rows="4" cols="50" name="mensaje"></textarea>
						</div>
						<div class="clear"></div>
						<?php if (qtrans_getLanguage() == 'es'){ ?>
							<button type="submit" class="[ btn btn-primary btn-message ] [ btn-enviar ]">Enviar</button>
						<?php } else { ?>
							<button type="submit" class="[ btn btn-primary btn-message ] [ btn-enviar ]">Send</button>
						<?php } ?>
					</form>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>