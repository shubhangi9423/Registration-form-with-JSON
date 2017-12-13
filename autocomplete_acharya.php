<?php

/**
* Template Name:  autocomplete acharya selection
* author:Shubhangi Wani
* 
* Version: 1.0
* Date: 8 April 2017
* @package WordPress
* @subpackage Twenty_Eleven
* @since Twenty Eleven 1.0
*/
//get_header();

global $wpdb;

   $query = $_REQUEST['first_name_search'];
   $acharya_name= explode("-",$query);

   $search_name=$_REQUEST['search_name'];
   $search_acharya_name=explode("-",$search_name);
    //$searchTerm = '%' . $acharya_name[0] . '%';
   if($query)
 {
     /* echo "SELECT count(*) as countdata from wp_donation as wp
        inner join wp_donation_event as wde on wp.id = wde.donation_id
        inner join wp_camp_registration as wcr on wde.id = wcr.donation_event_id
        where wde.donation_type='FreeCamp' and wp.first_name = '".$acharya_name[1]."'";*/
       

  


    $sql = $wpdb->get_results("SELECT wa.*,wl.name  FROM `wp_acharya` AS wa LEFT OUTER JOIN wp_location AS wl ON wa.centre = wl.id WHERE wa.id = '". $acharya_name[0]."'");
  
   foreach($sql as $result)
   {
       $data[]= $result->last_name;
       $data[]= $result->salutation;
       $data[]= $result->name;
       $data[]= $result->dob;
       $data[]= $result->address1;
       $data[]= $result->address2;
       $data[]= $result->address3;
       $data[]= $result->pincode;
       $data[]= $result->country;
       $data[]= $result->state;
       $data[]= $result->city;
       $data[]= $result->phone;
       $data[]= $result->email;
      /* $data[]= $result->phone;
       $data[]= $result->phone;
       $data[]= $result->phone;*/

      
       
    }
 

   
    echo json_encode($data);
}
else if($search_name)
{
  /*echo "SELECT * from wp_donation as wp
        inner join wp_donation_event as wde on wp.id = wde.donation_id
        inner join wp_camp_registration as wcr on wde.id = wcr.donation_event_id
        where wde.donation_type='FreeCamp' and wcr.id LIKE '".$search_acharya_name[0]."'";*/
  $sqls = $wpdb->get_results("SELECT *,CONCAT(wp.id,'-',wp.first_name) as idfname from wp_donation as wp
        inner join wp_donation_event as wde on wp.id = wde.donation_id
        inner join wp_camp_registration as wcr on wde.id = wcr.donation_event_id
        where wde.donation_type='FreeCamp' and wp.id = '".$search_acharya_name[0]."'");
  
   foreach($sqls as $result)
   {
       $data[]= $result->first_name;
       $data[]= $result->prefix;
       $data[]= $result->address1;
       $data[]= $result->address2;
       $data[]= $result->pincode;
       $data[]= $result->country;
       $data[]= $result->state;
       $data[]= $result->city;
       $data[]= $result->contact;
       $data[]= $result->email;
       $data[]= $result->center;
       $data[]= $result->special_arrengment;
       $data[]= $result->need_transport;
       $data[]= $result->arrivalFrom;
       $data[]= $result->departureTo;
       $data[]= $result->arrival_date;
       $data[]= $result->arrival_time;
       $data[]= $result->departure_date;
       $data[]= $result->departure_time;
       $data[]= $result->idfname;
       $data[]= $result->registration_type;
       $data[]= $result->acharya_lookup;
  
    }

   
    echo json_encode($data);

}

?>
