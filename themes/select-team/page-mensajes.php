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
<?php get_header(); ?>
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
<?php get_footer(); ?>