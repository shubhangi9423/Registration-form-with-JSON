<?php

	/**
	 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
	 *
	 * @param  CMB2 object $cmb CMB2 object.
	 *
	 * @return bool             True if metabox should show
	 * @param bool $display
	 * @param array $meta_box
	 * @return bool display metabox
	 */
	$prefix = 'gcmw_';

	function default_email_metabox() {
	    global $prefix; 
	    $slug = array( 'acharya-conference-registration' ); // Add more page slugs here
	    $cmb_email = new_cmb2_box( array(
	        'id'            => $prefix . 'acharya-conference-registration',
	        'title'         => __( 'Default Email Details', 'cmb2' ),
	        'object_types'  => array( 'page'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' => $slug),
	        'closed'       	=> true, 

	    ) );
	    add_email_fields($cmb_email); 	
	}
add_action( 'cmb2_admin_init', 'default_email_metabox');

	function add_email_fields($metacmb) {
		global $prefix;
		$metacmb->add_field( array(
	         'name'       => __( 'Default Email Template', 'cmb2' ),
	         'id'         => $prefix.'email_template',
	         'type'       => 'text',
	    ) );
	    $metacmb->add_field( array(
	        'name'       => __( 'Multiple To Address', 'cmb2' ),
	        'id'         => $prefix .'multireplyto_address',
	        'type'       => 'text'
	    ) );


	}
	
		
?>