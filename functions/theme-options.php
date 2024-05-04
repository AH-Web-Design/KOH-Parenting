<?php

add_action('init','vtdesign_ftn_options');

if(!function_exists('vtdesign_ftn_options')){

	function vtdesign_ftn_options(){

		// If using image radio buttons,define a directory path

		$imagepath = get_stylesheet_directory_uri().'/images/'; 

		$options = array(

		/* ---------------------------------------------------------------------------- */

		/* Header Setting */

		/* ---------------------------------------------------------------------------- */

		array("name" => "Header Section",

			  "type" => "heading"),



		array("name" => "Choose Header Logo",

			  "desc" => "Optimal size: 44px width by 30px height.",

			  "id"   => "header_header_logo",

			  "std"  => "",

			  "type" => "upload"),



		array("name" => "Enter Phone No",

			  "desc" => "Enter Phone here",

			  "id"   => "phone",

			  "std"  => "",

			  "type" => "text"),




		array("name" => "Enter Email",

			  "desc" => "Enter Email",

			  "id"   => "email",

			  "std"  => "",

			  "type" => "textarea"),


		array("name" => "Enter Address",

			  "desc" => "Enter Address",

			  "id"   => "address",

			  "std"  => "",

			  "type" => "textarea"),


		array("name" => "Enter ABN No",

			  "desc" => "Enter ABN here",

			  "id"   => "abn",

			  "std"  => "",

			  "type" => "text"),

		

		/* ---------------------------------------------------------------------------- */

		/* Footer Setting */

		/* ---------------------------------------------------------------------------- */

		array("name" => "Footer Section",

			  "type" => "heading"),


		// array("name" => "Choose Footer Logo",

		// 	  "desc" => "Optimal size: 44px width by 30px height.",

		// 	  "id"   => "header_footer_logo",

		// 	  "std"  => "",

		// 	  "type" => "upload"),


		array("name" => "Enter Footer Vision Content",

			  "desc" => "Enter Footer Vision Content",

			  "id"   => "footercontent",

			  "std"  => "",

			  "type" => "textarea"),


		array("name" => "Enter Footer Copyright",

			  "desc" => "Enter Footer Copyright",

			  "id"   => "copyright",

			  "std"  => "",

			  "type" => "textarea"),



		array("name" => "Zoom Section",

			  "type" => "heading"),


		// array("name" => "Choose Footer Logo",

		// 	  "desc" => "Optimal size: 44px width by 30px height.",

		// 	  "id"   => "header_footer_logo",

		// 	  "std"  => "",

		// 	  "type" => "upload"),


		array("name" => "Enter Zoom Link",

			  "desc" => "Enter Zoom Link",

			  "id"   => "zoomlink",

			  "std"  => "",

			  "type" => "text"),



		

        /* ---------------------------------------------------------------------------- */

		/* Home Bottom Social Media Section */

		/* ---------------------------------------------------------------------------- */

		array("name" => "Home Bottom Social Media Section",

			  "type" => "heading"),



		array("name" => "Bottom instagram Link",

			  "desc" => "Enter instagram url here",

			  "id"   => "bi_bottom_instagram",

			  "std"  => "",

			  "type" => "text"),



		array("name" => "Bottom twitter Link",

			  "desc" => "Enter twitter url here",

			  "id"   => "bi_bottom_twitter",

			  "std"  => "",

			  "type" => "text"),


		array("name" => "Bottom Facebook Link",

			  "desc" => "Enter Facebook here",

			  "id"   => "bi_bottom_facebook",

			  "std"  => "",

			  "type" => "text"),


		array("name" => "Bottom google plus Link",

			  "desc" => "Enter google plus here",

			  "id"   => "bi_bottom_googleplus",

			  "std"  => "",

			  "type" => "text"),




			);		

		vtdesign_ftn_update_option('of_template',$options);

		}

	}

?>