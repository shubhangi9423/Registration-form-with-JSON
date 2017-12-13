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

	/*$slug = array( 'balvihar-registarion',
					'e-camp-gurudakshina', 
					'event-user-registration' ); */

    $prefix = 'gcmw_';

	function event_user_reg_metabox() { 
		global $prefix;
		$slug = array( 	'e-camp-gurudakshina', 
						'guruji-painting',
						'book-magazine',
						'seva',
						'ecamp-videos',
						'chinmaya-udghosh',
						'donation', 
						'event-user-registration',
						'balvihar',
						'membership',
						'acharya-conference-registration' 
						); 
	    $cmb_reg = new_cmb2_box( array(
	        'id'            => $prefix . 'user_reg',
	        'title'         => __( 'User Registration Setup', 'cmb2' ),
	        'object_types'  => array( 'page'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' =>$slug),
	        'closed'       	=> true, 

	    ) );
	    add_user_reg_fields($cmb_reg);

	    $cmb_ecamp = new_cmb2_box( array(
	        'id'            => $prefix . 'ecamp_user_reg',
	        'title'         => __( 'User Registration Setup', 'cmb2' ),
	        'object_types'  => array( 'ai1ec_event'), // Post type
	        'show_on'    	=> array( 'meta_key' => ['event_type'], 'meta_value' => ['ecamp'], ),
	        'closed'       	=> true, 

	    ) );
	    add_user_reg_fields($cmb_ecamp);
	    
	}

	add_action( 'cmb2_admin_init', 'event_user_reg_metabox', 10,2 );


	function add_user_reg_fields($metacmb) {
		global $prefix ;
		$metacmb->add_field( array(
	        'name'       => __( 'Event ID', 'cmb2' ),
	        'id'         => $prefix.'event_id',
	        'type'       => 'text_small',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Event Type', 'cmb2' ),
	        'id'         => $prefix.'event_type',
	        'type'       => 'select',
	        'options_cb' => 'cmb_event_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Donation Type', 'cmb2' ),
	        'id'         => $prefix.'donation_type',
	        'type'       => 'select',
	        'options_cb' => 'cmb_donation_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Registration Amount (Rupees)', 'cmb2' ),
	        'id'         => $prefix.'amount_inr',
	        'type'       => 'text_small',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Registration Amount (US Dollars)', 'cmb2' ),
	        'id'         => $prefix.'amount_dollar',
	        'type'       => 'text_small',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Registration Status', 'cmb2' ),
	        'id'         => $prefix.'reg_status',
	        'type'       => 'select',
	        'options_cb' => 'cmb_registrationstatus_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       	=> __( 'conversion rate (USD to INR)', 'cmb2' ),
	        'id'         	=> $prefix . 'exchange_rate',
	        'type'       	=> 'text_small',
	    ) );
	}

	

	function cmb_donation_options( $field ) {
		$options = array(
			'' => 'Select Donation Type',
			'Registration' 	=> 'Registration',
			'Subscription'  => 'Subscription',
			'Gurudakshina'  => 'Gurudakshina',
			'Donation'  	=> 'Donation',
			'Pledge'  		=> 'Pledge',
			'Painting' 		=> 'Painting',
			'subscription'    => 'subscription',
			'membership_nopay'=> 'membership_nopay',
			'membership_pay'  => 'membership_pay',
			'FreeCamp'     =>'FreeCamp',
			'PaidCamp'     =>'PaidCamp'
		);
		return $options;
	}

	function cmb_event_options( $field ) {
		$options = array(
			'' => 'Select Event Type',
			'Painting' 		  => 'Painting',
			'Donation'		  => 'Donation',
			'Gurudakshina'    => 'Gurudakshina',
			'e-Camp'  		  => 'E-camp',
			'Balvihar'  	  => 'Balvihar',
			'Seva' 		  	  => 'Seva',
			'Tapovan_prasad'  => 'Tapovan Prasad',
			'membership'      =>  'membership',
			'Camp'            =>  'Camp'
		);
		return $options;
	}

	
	function cmb_registrationstatus_options( $field ) {
		$options = array(
			'' => 'Select',
			'open' 	=> 'Open',
			'closed'  => 'Closed',
		);
		return $options;
	}



?>