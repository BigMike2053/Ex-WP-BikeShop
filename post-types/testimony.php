<?php
add_action('init', function() {
	// Déclaration du CPT pour gérer les témoignages
	register_post_type('testimony', [
		'labels' => [
			'name'                  => _x( 'Témoignages', 'Post type general name', 'bike-shop' ),
			'singular_name'         => _x( 'Témoignage', 'Post type singular name', 'bike-shop' ),
			'menu_name'             => _x( 'Témoignages', 'Admin Menu text', 'bike-shop' ),
			'name_admin_bar'        => _x( 'Témoignage', 'Add New on Toolbar', 'bike-shop' ),
			'add_new'               => __( 'Ajouter Nouveau', 'bike-shop' ),
			'add_new_item'          => __( 'Ajouter Nouveau Témoignage', 'bike-shop' ),
			'new_item'              => __( 'Nouveau Témoignage', 'bike-shop' ),
			'edit_item'             => __( 'Modifier Témoignage', 'bike-shop' ),
			'view_item'             => __( 'Voir Témoignage', 'bike-shop' ),
			'all_items'             => __( 'Tous les Témoignage', 'bike-shop' ),
			'search_items'          => __( 'Recherché Témoignages', 'bike-shop' ),
			'parent_item_colon'     => __( 'Témoignages Parent :', 'bike-shop' ),
			'not_found'             => __( 'Témoignages introuvable.', 'bike-shop' ),
			'not_found_in_trash'    => __( 'Témoignages introuvables dans la corbeille.', 'bike-shop' ),
			'featured_image'        => _x( 'Photo de l\'Témoignage', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'set_featured_image'    => _x( 'Ajouter une photo', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'remove_featured_image' => _x( 'Supprimer l\'image mise en avant', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'use_featured_image'    => _x( 'Utiliser comme image mise en avant', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'archives'              => _x( 'Témoignage archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'bike-shop' ),
			'insert_into_item'      => _x( 'Insérer dans Témoignage', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'bike-shop' ),
			'uploaded_to_this_item' => _x( 'Uploadé à cet Témoignage', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'bike-shop' ),
			'filter_items_list'     => _x( 'Filtrer la liste des Témoignages', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'bike-shop' ),
			'items_list_navigation' => _x( 'Témoignages navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'bike-shop' ),
			'items_list'            => _x( 'Témoignages liste', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'bike-shop' ),
		],
		'public' => true,
		'rewrite'=>['slug'=> 'Témoignage'],
		'menu_icon'=> 'dashicons-edit',
		'supports'=>['title', 'thumbnail', 'editor']
	]);
});

add_action('carbon_fields_register_fields', function() {
	\Carbon_Fields\Container::make('post_meta','Caractéristiques Témoignages')
		->where('post_type','=','testimony')
		->add_fields([
			\Carbon_Fields\Field::make_text('company','Entreprise'),
			\Carbon_Fields\Field::make_text('job','Poste'),
		]);
});
