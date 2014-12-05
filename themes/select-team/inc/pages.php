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

		// DASHBOARD ADMIN
		if( ! get_page_by_path('dashboard-admin') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Dashboard Admin',
				'post_name'   => 'dashboard-admin',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


		// ADMIN SINGLE PROSPECT
		if( ! get_page_by_path('admin-prospect-single') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Admin Prospect Single',
				'post_name'   => 'admin-prospect-single',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// ADMIN SINGLE ADVISOR
		if( ! get_page_by_path('admin-advisor-single') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Admin Advisor Single',
				'post_name'   => 'admin-advisor-single',
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
		
		// REGISTER ADVISOR
		if( ! get_page_by_path('register-advisor') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Register advisor',
				'post_name'   => 'register-advisor',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

	});
