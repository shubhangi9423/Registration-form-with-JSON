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

	function magazin_sub_metabox() {
	    global $prefix; 
	    $slug = array( 'book-magazine', 'balvihar','chinmaya-udghosh', ); // Add more page slugs here
	    $cmb_subs = new_cmb2_box( array(
	        'id'            => $prefix . 'subscription',
	        'title'         => __( 'Magazine Subscription', 'cmb2' ),
	        'object_types'  => array( 'page'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' => $slug),
	        'closed'       	=> true, 

	    ) );
	    add_subscription_fields($cmb_subs); 	
	}

	function add_subscription_fields($metacmb) {
		global $prefix;
		$metacmb->add_field( array(
	        'name'       => __( 'Subscription Type', 'cmb2' ),
	        'id'         => $prefix . 'subscription_type',
	        'type'       => 'multicheck',
	        'options_cb' => 'cmb_magazinesub_type',
	    ) );

	    $metacmb->add_field( array(
	        'name'       	=> __( 'Subscription Term', 'cmb2' ),
	        'id'         	=> $prefix . 'subscription_term',
	        'type'       	=> 'multicheck',
	        'options_cb' 	=> 'cmb_term_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       	=> __( 'conversion rate (USD to INR)', 'cmb2' ),
	        'id'         	=> $prefix . 'USDtoINR_Rate',
	        'type'       	=> 'text_small',
	    ) );

	}
	add_action( 'cmb2_admin_init', 'magazin_sub_metabox' );

	function cmb_magazinesub_type( $field ) {
		$options = array(
			'print' 	=> 'Print',
			'digital'  => 'Digital',
		);
		return $options;
	}
	
	function cmb_term_options( $field ) {
		$options = array(
			'One Year'    => 'One year',
			'Two Years'    => 'Two years',
			'Three Years'  => 'Three years',
			'Five Years'   => 'Five years',
			'Fifteen Years'   => 'Fifteen years',
		);
		return $options;
	}

		
?>