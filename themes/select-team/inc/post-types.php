<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// Acerca
		$labels = array(
			'name'          => 'Acerca',
			'singular_name' => 'Acerca',
			'add_new'       => 'Nuevo Acerca',
			'add_new_item'  => 'Nuevo Acerca',
			'edit_item'     => 'Editar Acerca',
			'new_item'      => 'Nuevo Acerca',
			'all_items'     => 'Todos los Acercas',
			'view_item'     => 'Ver Acerca',
			'search_items'  => 'Buscar Acerca',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Acerca'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'acerca' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'acerca', $args );


		// Prospecto
		$labels = array(
			'name'          => 'Prospectos',
			'singular_name' => 'Prospecto',
			'add_new'       => 'Nuevo Prospecto',
			'add_new_item'  => 'Nuevo Prospecto',
			'edit_item'     => 'Editar Prospecto',
			'new_item'      => 'Nuevo Prospecto',
			'all_items'     => 'Todos los Prospectos',
			'view_item'     => 'Ver Prospecto',
			'search_items'  => 'Buscar Prospecto',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Prospecto'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'prospecto' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'genero', 'deporte' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'prospecto', $args );


		// Padres
		$labels = array(
			'name'          => 'Padres',
			'singular_name' => 'Padre',
			'add_new'       => 'Nuevo Padre',
			'add_new_item'  => 'Nuevo Padre',
			'edit_item'     => 'Editar Padre',
			'new_item'      => 'Nuevo Padre',
			'all_items'     => 'Todos los Padres',
			'view_item'     => 'Ver Padre',
			'search_items'  => 'Buscar Padre',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Padre'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'padre' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'padre', $args );

	});