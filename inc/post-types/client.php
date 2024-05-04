<?php



/***



* Press Post Type



***/







if(! class_exists('Progressive_Client_Post_Type')):



class Progressive_Client_Post_Type{







	function __construct(){



		// Adds the brands post type and taxonomies



		add_action('init',array(&$this,'client_init'),0);



		// Thumbnail support for client posts



		add_theme_support('post-thumbnails',array('client'));



	}







	function client_init(){



		/**



		 * Enable the Brands_init custom post type



		 * http://codex.wordpress.org/Function_Reference/register_post_type



		 */



		$labels = array(



			'name'					=> __('Client','Progressive'),



			'singular_name'		=> __('Client Name','Progressive'),



			'add_new'				=> __('Add New','Progressive'),



			'add_new_item'			=> __('Add New Client','Progressive'),



			'edit_item'			=> __('Edit Client','Progressive'),



			'new_item'				=> __('Add New Client','Progressive'),



			'view_item'			=> __('View Client','Progressive'),



			'search_items'			=> __('Search Client','Progressive'),



			'not_found'			=> __('No Client items found','Progressive'),



			'not_found_in_trash'	=> __('No Client found in trash','Progressive')



		);



		



		$args = array(



		    'labels' => $labels,



			'public' => true,



			'publicly_queryable' => true,



			'show_ui' => true,



			'query_var' => true,



			'menu_icon' => 'dashicons-id',



			'rewrite' => true,			



			'map_meta_cap' => true,



			'hierarchical' => false,



			'menu_position' => 5,



			'supports' => array('title','thumbnail','editor','page-attributes')



		); 



		



		$args = apply_filters('Progressive_client_args',$args);



		register_post_type('client',$args);



	}



}



// new Progressive_Client_Post_Type;



endif;