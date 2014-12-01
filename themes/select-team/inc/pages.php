<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){

		// DASHBOARD
		if( ! get_page_by_path('dashboard') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Dashboard',
				'post_name'   => 'dashboard',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		
		// CONTACTO
		if( ! get_page_by_path('contacto') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Contacto',
				'post_name'   => 'contacto',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}
		
		// REGISTER
		if( ! get_page_by_path('register') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Register',
				'post_name'   => 'register',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});
