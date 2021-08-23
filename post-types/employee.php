<?php
add_action('init', function() {
	// Déclaration du CPT pour gérer les employés
	register_post_type('employee', [
		'labels' => [
			'name'                  => _x( 'Employés', 'Post type general name', 'bike-shop' ),
			'singular_name'         => _x( 'Employé', 'Post type singular name', 'bike-shop' ),
			'menu_name'             => _x( 'Employés', 'Admin Menu text', 'bike-shop' ),
			'name_admin_bar'        => _x( 'Employé', 'Add New on Toolbar', 'bike-shop' ),
			'add_new'               => __( 'Ajouter Nouveau', 'bike-shop' ),
			'add_new_item'          => __( 'Ajouter Nouveau Employé', 'bike-shop' ),
			'new_item'              => __( 'Nouveau Employé', 'bike-shop' ),
			'edit_item'             => __( 'Modifier Employé', 'bike-shop' ),
			'view_item'             => __( 'Voir Employé', 'bike-shop' ),
			'all_items'             => __( 'Tous les Employés', 'bike-shop' ),
			'search_items'          => __( 'Recherché Employés', 'bike-shop' ),
			'parent_item_colon'     => __( 'Employés Parent :', 'bike-shop' ),
			'not_found'             => __( 'Employés introuvable.', 'bike-shop' ),
			'not_found_in_trash'    => __( 'Employés introuvables dans la corbeille.', 'bike-shop' ),
			'featured_image'        => _x( 'Photo de l\'employé', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'set_featured_image'    => _x( 'Ajouter une photo', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'remove_featured_image' => _x( 'Supprimer l\'image mise en avant', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'use_featured_image'    => _x( 'Utiliser comme image mise en avant', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'bike-shop' ),
			'archives'              => _x( 'Employé archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'bike-shop' ),
			'insert_into_item'      => _x( 'Insérer dans employé', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'bike-shop' ),
			'uploaded_to_this_item' => _x( 'Uploadé à cet employé', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'bike-shop' ),
			'filter_items_list'     => _x( 'Filtrer la liste des employés', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'bike-shop' ),
			'items_list_navigation' => _x( 'Employés navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'bike-shop' ),
			'items_list'            => _x( 'Employés liste', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'bike-shop' ),
		],
		'public' => true,
		'rewrite'=>['slug'=> 'employe'],
		'menu_icon'=> 'dashicon-groups',
		'supports'=>['title', 'thumbnail']
	]);

	// Déclaration de la taxonomie "Poste" associée au CPT des employés
	register_taxonomy('job', ['employee'], [
		'labels' => [
			'name'              => _x( 'Postes', 'taxonomy general name', 'bike-shop' ),
			'singular_name'     => _x( 'Poste', 'taxonomy singular name', 'bike-shop' ),
			'search_items'      => __( 'Rechercher Postes', 'bike-shop' ),
			'all_items'         => __( 'Tous les Postes', 'bike-shop' ),
			'parent_item'       => __( 'Poste Parent', 'bike-shop' ),
			'parent_item_colon' => __( 'Poste Parent :', 'bike-shop' ),
			'edit_item'         => __( 'Modifier Poste', 'bike-shop' ),
			'update_item'       => __( 'Mettre à jour Poste', 'bike-shop' ),
			'add_new_item'      => __( 'Ajouter Nouveau Poste', 'bike-shop' ),
			'new_item_name'     => __( 'Nom du nouveau Poste', 'bike-shop' ),
			'menu_name'         => __( 'Poste', 'bike-shop' ),
		],
		'hierarchical' => true,
		'rewrite' => ['slug' => 'poste']
	]);

});

add_action('carbon_fields_register_fields', function() {
	\Carbon_Fields\Container::make('post_meta','Caractéristiques Employé')
		->where('post_type','=','employee')
		->add_fields([
			\Carbon_Fields\Field::make_text('firstname','Prénom'),
			\Carbon_Fields\Field::make_text('lastname','Nom'),
			\Carbon_Fields\Field::make_complex('social_networks','Réseaux sociaux')
				->add_fields([
					\Carbon_Fields\Field::make('icon','icon','Icone'),
					\Carbon_Fields\Field::make_text('url','URL')
						->set_attribute('type','url')
				])
		]);
});
