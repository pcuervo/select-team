<?php
/*
* Template Name: Login Page
*/
?>

<?php get_header(); ?>

<?php get_footer(); ?>

<?php $args = array(
        'echo' => true,
        'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
        'form_id' => 'loginform',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false ); ?>

<?php
args = array('redirect' => get_permalink( get_page( $page_id_of_member_area ) ) );

wp_login_form( $args );
?>        