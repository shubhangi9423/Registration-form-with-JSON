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

	function membership_sub_metabox() {
	    global $prefix; 
	    $slug = array( 'membership', ); // Add more page slugs here
	    $cmb_membership = new_cmb2_box( array(
	        'id'            => $prefix . 'membership',
	        'title'         => __( 'Membership Details', 'cmb2' ),
	        'object_types'  => array( 'page'), // Post type
	        'show_on'      	=> array( 'key' => 'slug', 'value' => $slug),
	        'closed'       	=> true, 

	    ) );
	    add_membership_fields($cmb_membership); 	
	}

	function add_membership_fields($metacmb) {
		global $prefix;
		$metacmb->add_field( array(
	        'name'       => __( 'Membership Details', 'cmb2' ),
	        'id'         => $prefix . 'membership_details',
	        'type'       => 'select',
	        'options_cb' => 'cmb_membershipsub_type',
	    ) );

	    $metacmb->add_field( array(
	        'name'       	=> __( 'Magzine', 'cmb2' ),
	        'id'         	=> $prefix . 'magzine',
	        'type'       	=> 'select',
	        'options_cb' 	=> 'cmb_magzine_options',
	    ) );

	    $metacmb->add_field( array(
	        'name'       	=> __( 'Payment', 'cmb2' ),
	        'id'         	=> $prefix . 'payment',
	        'type'       	=> 'select',
	        'options_cb' 	=> 'cmb_payment_options',
	    ) );
	     $metacmb->add_field( array(
	        'name'       	=> __( 'Membership Term', 'cmb2' ),
	        'id'         	=> $prefix . 'subscription_term',
	        'type'       	=> 'multicheck',
	        'options_cb' 	=> 'cmb_membership_term',
	    ) );
	      $metacmb->add_field( array(
	        'name'       	=> __( 'Membership Type', 'cmb2' ),
	        'id'         	=> $prefix . 'subscription_type',
	        'type'       	=> 'select',
	        'options_cb' 	=> 'cmb_membership_type',
	    ) );

	}
	add_action( 'cmb2_admin_init', 'membership_sub_metabox');

	function cmb_membershipsub_type( $field ) {
		$options = array(
			'' => 'Select',
			'short' 	=> 'Short',
			'full'      => 'Full',
		);
		return $options;
	}
	
	function cmb_magzine_options( $field ) {
		$options = array(
			'' => 'Select',
			'yes' 	=> 'Yes',
			'no'    => 'No',
		);
		return $options;
	}

  
	function cmb_payment_options( $field ) {
		$options = array(
			'' => 'Select',
			'No' 	=> 'No',
			'Yes'   => 'Yes',
		);
		return $options;
	}
	function cmb_membership_term($field ) {
		$options = array(
			'One Year'      => 'One year',
			'Two Years'     => 'Two years',
			'Three Years'   => 'Three years',
			'Five Years'    => 'Five years',
			'Fifteen Years' => 'Fifteen years',
			'Monthly'       => 'Monthly',
			'Quarterly'     => 'Quarterly',
			'Annually'	    => 'Annually',
			'Three Years'   => 'Three Years',
			'LifeTime'	    => 'LifeTime'
		);
		return $options;
	}
	function cmb_membership_type( $field ) {
		$options = array(
			'adult' 	=> 'Adult',
			'chyk'    => 'Chyk',
			'balvihar'    => 'Balvihar',
		);
		return $options;
	}
		
?>