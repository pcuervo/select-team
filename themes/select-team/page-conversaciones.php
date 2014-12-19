<?php get_header(); ?>
<?php 
	$user_id = get_current_user_id();
	$conversations = get_user_conversations(); 
	foreach ($conversations as $key => $conver) {
?>	
	<?php if($user_id == $conver->from_id){ ?>
		<p><?php echo $conver->to; ?></p><a href="mensajes?id=<?php echo $conver->id; ?>&f=<?php echo $conver->to_id; ?>">Ver</a>
	<?php } else { ?>
		<p><?php echo $conver->from; ?></p><a href="mensajes?id=<?php echo $conver->id; ?>&f=<?php echo $conver->from_id; ?>">Ver</a>
	<?php } ?>
<?php } ?>
<?php get_footer(); ?>