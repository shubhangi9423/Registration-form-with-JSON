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
	function payment_gateway_metabox() {
		global $prefix;
		$slug= array(  'book-magazine',
						'seva',
					   'guruji-painting',
					   'donation', 
					   'balvihar',
					   'chinmaya-udghosh',
			      	   'e-camp-gurudakshina', 
			      	   'event-user-registration',
			      	   'career'
			      	   );
	    $cmb_paymentGateWay = new_cmb2_box( array(
	        'id'            => $prefix . 'paymentGateWay',
	        'title'         => __( 'Payment Gateway Configuration', 'cmb2' ),
	        'object_types'  => array( 'page','ai1ec_event'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' =>$slug),
	        'closed'       	=> true, 

	    ) );  
	   	add_user_paymenGateway_fields($cmb_paymentGateWay);
	}

	function add_user_paymenGateway_fields($metacmb) {
		global $prefix ;
	    $metacmb->add_field( array(
	        'name'       => __( 'Hash Code', 'cmb2' ),
	        'id'         =>$prefix.'hashcode',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Access Code', 'cmb2' ),
	        'id'         => $prefix.'accessCode',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Merchant ID', 'cmb2' ),
	        'id'         => $prefix.'merchantID',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Paypal Environment', 'cmb2' ),
	        'id'         => $prefix.'paypalurl',
	        'type'       => 'select',
	        'options_cb' => 'cmb_paypal_env_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Mail template NEFT', 'cmb2' ),
	        'id'         => $prefix.'mail_template_neft',
	        'type'       => 'text',
	    ) );

	    $metacmb->add_field( array(
	        'name'       => __( 'Mail template PayPal', 'cmb2' ),
	        'id'         => $prefix.'mail_template_paypal',
	        'type'       => 'text',
	    ) );
	}

	
	add_action( 'cmb2_admin_init', 'payment_gateway_metabox',10,2 );

	function cmb_paypal_env_options( $field ) {
		$options = array(
			'' => 'Select',
			'https://www.sandbox.paypal.com/cgi-bin/webscr' 	=> 'Sandbox',
			'https://www.paypal.com/cgi-bin/webscr'  	=> 'Prod',
		);
		return $options;
	}

?>