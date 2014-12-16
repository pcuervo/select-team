<?php 
	$status = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mensaje = $_POST["mensaje"];
		$to = $_POST["email-advisor"];
		$from = get_current_user_id();
		$conv = $_POST["conv"];
		
		$status = add_mensaje_conversation($mensaje, $from, $to,$conv);
	}else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		$conv = $_GET["id"];
		$from = $_GET["f"];
	}

?>
<?php get_header(); ?>
<?php 
	$user_id = get_current_user_id();
	$mensajes = get_mensajes_conversations($conv); 
	foreach ($mensajes as $key => $mensaje) {
?>	
		<p><?php echo $mensaje->message; ?></p>
		<p><?php echo $mensaje->date; ?></p>
<?php } ?>
<form role="form" class="" method="post" >
	
	<input type="text" name="conv" value="<?php echo $conv ?>">
	<input type="text" name="email-advisor" value="<?php echo $from ?>">
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