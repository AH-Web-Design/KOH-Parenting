<?php



/***



* Press Post Type



***/







if(! class_exists('Progressive_Area_Post_Type')):



class Progressive_Area_Post_Type{







	function __construct(){



		// Adds the brands post type and taxonomies



		add_action('init',array(&$this,'area_init'),0);



		// Thumbnail support for area posts



		add_theme_support('post-thumbnails',array('area'));



	}







	function area_init(){



		/**



		 * Enable the Brands_init custom post type



		 * http://codex.wordpress.org/Function_Reference/register_post_type



		 */



		$labels = array(



			'name'					=> __('Areas of expertise
','Progressive'),



			'singular_name'		=> __('Areas of expertise
 Name','Progressive'),



			'add_new'				=> __('Add New','Progressive'),



			'add_new_item'			=> __('Add New Areas of expertise
','Progressive'),



			'edit_item'			=> __('Edit Areas of expertise
','Progressive'),



			'new_item'				=> __('Add New Areas of expertise
','Progressive'),



			'view_item'			=> __('View Areas of expertise
','Progressive'),



			'search_items'			=> __('Search Areas of expertise
','Progressive'),



			'not_found'			=> __('No Areas of expertise
 items found','Progressive'),



			'not_found_in_trash'	=> __('No Areas of expertise
 found in trash','Progressive')



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



		



		$args = apply_filters('Progressive_area_args',$args);



		register_post_type('area',$args);



	}



}



// new Progressive_Area_Post_Type;



endif;