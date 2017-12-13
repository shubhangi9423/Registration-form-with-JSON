<?php
	/**
	 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
	 *
	 * Be sure to replace all instances of 'gcmw_' with your project's prefix.
	 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
	 *
	 * @category GCMW-Plugin
	 * @package  Demo_CMB2
	 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
	 * @link     https://github.com/WebDevStudios/CMB2
	 * Plugin Name:  GCMW Customization
	 * Description:  Plugin to support GCMW functionalities
	 * Author:       Pallavi P
	 * Author URI:   http://www.chinmayamission.com/devloper/pallavi
	 * Contributors: Pallavi P 
	 * Version:      1.0.0
	 *
	 * Text Domain:  gcmw
	 * Domain Path:  languages
	 *
	 *
	 * This is an add-on for WordPress
	 * http://wordpress.org/
	 */
	/**
	 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
	 */
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}
    if( file_exists ( dirname( __FILE__ ) . '/membership_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/membership_metabox.php';
	}
	if( file_exists ( dirname( __FILE__ ) . '/email_config_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/email_config_metabox.php';
	}
	
	if( file_exists ( dirname( __FILE__ ) . '/event_user_reg_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/event_user_reg_metabox.php';
	}
	if( file_exists ( dirname( __FILE__ ) . '/default_email_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/default_email_metabox.php';
	}

	if( file_exists ( dirname( __FILE__ ) . '/payment_gateway_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/payment_gateway_metabox.php';
	}

	if( file_exists ( dirname( __FILE__ ) . '/magazine_sub_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/magazine_sub_metabox.php';
	}



	/*if( file_exists ( dirname( __FILE__ ) . '/pricing_in_rs_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/pricing_in_rs_metabox.php';
	}

	if( file_exists ( dirname( __FILE__ ) . '/pricing_in_dollars_metabox.php' ) ) {
		require_once dirname( __FILE__ ) . '/pricing_in_dollars_metabox.php';
	}*/


	function cmb_show_on_meta_value( $display, $meta_box ) {
		if ( ! isset( $meta_box['show_on']['meta_key'] ) ) {
			return $display;
		}
		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = $_GET['post'];
		} elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = $_POST['post_ID'];
		}
		if ( ! $post_id ) {
			return $display;
		}
	 	$value = get_post_meta( $post_id, $meta_box['show_on']['meta_key'][0], true );
		if ( empty( $meta_box['show_on']['meta_value'] ) ) {
			return (bool) $value;
		}
		return $value == $meta_box['show_on']['meta_value'][0];
	}
	add_filter( 'cmb2_show_on', 'cmb_show_on_meta_value',10,2);



	function be_metabox_show_on_slug( $display, $meta_box ) {
		if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
			return $display;
		}

		if ( 'slug' !== $meta_box['show_on']['key'] ) {
			return $display;
		}
		
		$post_id = 0;
		if ( isset( $_GET['post'] ) ) {
			$post_id = $_GET['post'];
		} elseif ( isset( $_POST['post_ID'] ) ) {
			$post_id = $_POST['post_ID'];
		}
		if ( ! $post_id ) {
			return $display;
		}
		$slug = get_post( $post_id )->post_name;
		return in_array( $slug, (array) $meta_box['show_on']['value']);
	}

	add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );
?>