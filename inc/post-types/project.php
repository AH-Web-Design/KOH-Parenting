<?php


/***


* gallerys Post Type


***/





if(! class_exists('Progressive_Course_Post_Type')):


class Progressive_Course_Post_Type{





	function __construct(){


		// Adds the brands post type and taxonomies


		add_action('init',array(&$this,'course_init'),0);


		// Thumbnail support for course posts


		add_theme_support('post-thumbnails',array('course'));


	}





	function course_init(){


		/**


		 * Enable the Brands_init custom post type


		 * http://codex.wordpress.org/Function_Reference/register_post_type


		 */


		$labels = array(


			'name'					=> __('Course','Progressive'),


			'singular_name'		=> __('Course Name','Progressive'),


			'add_new'				=> __('Add New','Progressive'),


			'add_new_item'			=> __('Add New Course','Progressive'),


			'edit_item'			=> __('Edit Course','Progressive'),


			'new_item'				=> __('Add New Course','Progressive'),


			'view_item'			=> __('View Course','Progressive'),


			'search_items'			=> __('Search Course','Progressive'),


			'not_found'			=> __('No Course items found','Progressive'),


			'not_found_in_trash'	=> __('No Course found in trash','Progressive')


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


		


		$args = apply_filters('Progressive_course_args',$args);


		register_post_type('course',$args);


	}


}


// new Progressive_Course_Post_Type;


endif;


