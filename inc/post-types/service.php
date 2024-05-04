<?php



/***



* service Post Type



***/







if(! class_exists('Progressive_Service_Post_Type')):



class Progressive_Service_Post_Type{







	function __construct(){



		// Adds the brands post type and taxonomies



		add_action('init',array(&$this,'service_init'),0);



		// Thumbnail support for service posts



		add_theme_support('post-thumbnails',array('service'));



	}







	function service_init(){



		/**



		 * Enable the Brands_init custom post type



		 * http://codex.wordpress.org/Function_Reference/register_post_type



		 */



		$labels = array(



			'name'					=> __('Service','Progressive'),



			'singular_name'		=> __('Service Name','Progressive'),



			'add_new'				=> __('Add New','Progressive'),



			'add_new_item'			=> __('Add New Service','Progressive'),



			'edit_item'			=> __('Edit Service','Progressive'),



			'new_item'				=> __('Add New Service','Progressive'),



			'view_item'			=> __('View Service','Progressive'),



			'search_items'			=> __('Search Service','Progressive'),



			'not_found'			=> __('No Service items found','Progressive'),



			'not_found_in_trash'	=> __('No Service found in trash','Progressive')



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



		



		$args = apply_filters('Progressive_service_args',$args);



		register_post_type('service',$args);



	}



}



// new Progressive_Service_Post_Type;



endif;