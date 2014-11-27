<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// Género
		if( ! taxonomy_exists('genero')){

			$labels = array(
				'name'              => 'Géneros',
				'singular_name'     => 'Género',
				'search_items'      => 'Buscar Género',
				'all_items'         => 'Todos los Géneros',
				'edit_item'         => 'Editar Género',
				'update_item'       => 'Actualizar Género',
				'add_new_item'      => 'Nuevo Género',
				'new_item_name'     => 'Nuevo Género',
				'menu_name'         => 'Géneros'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'generos' ),
			);

			register_taxonomy( 'genero', 'prospecto', $args );
		}
		
		
		


		// Deporte
		if( ! taxonomy_exists('deporte')){

			$labels = array(
				'name'              => 'Deportes',
				'singular_name'     => 'Deporte',
				'search_items'      => 'Buscar Deporte',
				'all_items'         => 'Todos los Deportes',
				'edit_item'         => 'Editar Deporte',
				'update_item'       => 'Actualizar Deporte',
				'add_new_item'      => 'Nuevo Deporte',
				'new_item_name'     => 'Nuevo Deporte',
				'menu_name'         => 'Deportes'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'deportes' ),
			);

			register_taxonomy( 'deporte', 'prospecto', $args );
		}
		
		// TERMS
		if ( ! term_exists( 'hombre', 'genero' ) ){
			wp_insert_term( 'hombre', 'genero' );
		}
		if ( ! term_exists( 'mujer', 'genero' ) ){
			wp_insert_term( 'mujer', 'genero' );
		}
		
		// TERMS
		if ( ! term_exists( 'tennis', 'deporte' ) ){
			wp_insert_term( 'tennis', 'deporte' );
		}
		if ( ! term_exists( 'golf', 'deporte' ) ){
			wp_insert_term( 'golf', 'deporte' );
		}
		if ( ! term_exists( 'soccer', 'deporte' ) ){
			wp_insert_term( 'soccer', 'deporte' );
		}
		if ( ! term_exists( 'volleyball', 'deporte' ) ){
			wp_insert_term( 'volleyball', 'deporte' );
		}


	}
