<?php
/***
 * Testinomial Post Type
 ***/
if (!class_exists('Progressive_Testinomial_Post_Type')):
    class Progressive_Testinomial_Post_Type
    {
        function __construct()
        {
            // Adds the brands post type and taxonomies
            add_action('init', array(
                &$this,
                'testinomial_init'
            ), 0);
            // Thumbnail support for testinomial posts
            add_theme_support('post-thumbnails', array(
                'testinomial'
            ));
        }
        function testinomial_init()
        {
            /**
             * Enable the Brands_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Testinomial', 'Progressive'),
                'singular_name' => __('Testinomial Name', 'Progressive'),
                'add_new' => __('Add New', 'Progressive'),
                'add_new_item' => __('Add New Testinomial', 'Progressive'),
                'edit_item' => __('Edit Testinomial', 'Progressive'),
                'new_item' => __('Add New Testinomial', 'Progressive'),
                'view_item' => __('View Testinomial', 'Progressive'),
                'search_items' => __('Search Testinomial', 'Progressive'),
                'not_found' => __('No Testinomial items found', 'Progressive'),
                'not_found_in_trash' => __('No Testinomial found in trash', 'Progressive')
            );
            $args   = array(
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
                'supports' => array(
                    'title',
                    'thumbnail',
                    'editor',
                    'page-attributes'
                )
            );
            $args   = apply_filters('Progressive_testinomial_args', $args);
            register_post_type('testinomial', $args);
        }
    }
    //new Progressive_Testinomial_Post_Type;
endif;