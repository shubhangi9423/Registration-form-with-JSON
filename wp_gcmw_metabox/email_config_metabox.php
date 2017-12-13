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
	function mail_config_metabox() {
		global $prefix;
		$slug = array( 	'book-magazine',
						'guruji-painting',
						'seva',
						'chinmaya-udghosh',
						'donation', 
						'balvihar',
						'e-camp-gurudakshina', 
						'event-user-registration',
						'acharya-conference-registration',
						'career',
						'gcmw_reports'
						);
		 $cmb_mail = new_cmb2_box( array(
	        'id'            => $prefix . 'user_mail',
	        'title'         => __( 'E-mail Template Configuration', 'cmb2' ),
	        'object_types'  => array( 'page','ai1ec_event'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' =>$slug ),
	        'closed'       	=> true, 

	    ) );
	    add_metabox_field($cmb_mail);    
	}

	function add_metabox_field($metacmb) {
        global $prefix ;
	    $metacmb->add_field( array(
	        'name'       => __( 'Reply To Address', 'cmb2' ),
	        'id'         => $prefix .'replyto_address',
	        'type'       => 'text_email'
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'CC Address', 'cmb2' ),
	        'id'         => $prefix .'cc_address',
	        'type'       => 'text_email',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'BCC Address', 'cmb2' ),
	        'id'         => $prefix .'bcc_address',
	        'type'       => 'text_email',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Subject', 'cmb2' ),
	        'id'         => $prefix .'subject',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Business E-Mail', 'cmb2' ),
	        'id'         => $prefix .'businessemail',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Logo Image', 'cmb2' ),
	        'id'         => $prefix .'logo_image',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Banner Image', 'cmb2' ),
	        'id'         => $prefix .'banner_image',
	        'type'       => 'text',
	    ) );
	    $metacmb->add_field( array(
	        'name'       => __( 'Send Video Link', 'cmb2' ),
	        'id'         => $prefix . 'sendVideoLink',
	        'type'       => 'select',
	        'options_cb' => 'cmb_sendVideoLink_options',
	    ) );

	}
	add_action( 'cmb2_admin_init', 'mail_config_metabox',10,2 );
	function cmb_sendVideoLink_options( $field ) {
		$options = array(
			'' => 'Select',
			'paid' 	=> 'Paid User Only',
			'all'  => 'All Registered User',
		);
		return $options;
	}


?>