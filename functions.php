<?php


//...add this end the of your functions.php file inside the theme folder

function register_taxonomy_issues() {
	$labels = array(
		'name'              => _x( 'Monthly Archives', 'taxonomy general name' ),
		'singular_name'     => _x( 'Issue', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Issues' ),
		'all_items'         => __( 'All Issues' ),
		'parent_item'       => __( 'Parent Issue' ),
		'parent_item_colon' => __( 'Parent Issue:' ),
		'edit_item'         => __( 'Edit Issue' ),
		'update_item'       => __( 'Update Issue' ),
		'add_new_item'      => __( 'Add New Issue' ),
		'new_item_name'     => __( 'New Issue Name' ),
		'menu_name'         => __( 'Issue' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest' => true,
		'has_archive' => true,

		'rewrite'           => [ 'slug' => 'issue' ],
	);
	register_taxonomy( 'issues', [ 'post' ], $args );
}
add_action( 'init', 'register_taxonomy_issues',0 );

?>