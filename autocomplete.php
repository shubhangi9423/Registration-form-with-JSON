<?php

/**
* Template Name:  autocomplete
* Use: Custom Membership Page for custom
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

    $query = $_REQUEST['term'];
    $searchname=$_REQUEST['search_name'];
   
    if($query)
    {
    $searchTerm = $query . '%';

   //echo 'SELECT last_name FROM `wp_acharya` WHERE last_name LIKE   "'. $searchTerm . '" ';
   
   // echo 'SELECT CONCAT(id, ' - ', last_name) as lasta_name,last_name FROM `wp_acharya` WHERE last_name LIKE "'. $searchTerm . '" ';
    $sql = $wpdb->get_results("SELECT CONCAT(id,'-',last_name) as lasta_name FROM `wp_acharya` WHERE last_name LIKE '". $searchTerm . "' order by last_name ASC");
  
   foreach($sql as $result)
   {
       $data[]= $result->lasta_name;
       //$data[]= $result->id;
    }

    //wp_send_json($data);
    //RETURN JSON ARRAY
    echo json_encode($data);

}
else if($searchname)
{
 $acharya=$searchname.'%';
  $sqls = $wpdb->get_results("SELECT CONCAT(wd.id,'-',first_name) as full_name FROM wp_donation as wd 
                               inner join wp_donation_event as wde on wd.id=wde.donation_id
                               inner join wp_camp_registration as wcr on wde.id =wcr.donation_event_id
                               where wde.donation_type='FreeCamp' and first_name LIKE '".$acharya."'"); 
  foreach($sqls as $results)
   {
       $datas[]= $results->full_name;
       //$data[]= $result->id;
    }

    //wp_send_json($data);
    //RETURN JSON ARRAY
    echo json_encode($datas);
    }

?>