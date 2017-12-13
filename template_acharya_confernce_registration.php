<?php 
/**
  * Template Name: Acharya confernce registration1
  *
  * This is the template that displays all pages by default.
  * Please note that this is the WordPress construct of pages
  * and that other 'pages' on your WordPress site will use a
  * different template.*/

session_start();

$post_id= $post->ID;
$_SESSION = array();
if($_SESSION['reg_post_id'] == null) {
 $_SESSION['reg_post_id'] = $post_id;
}
$subsite = $_GET["subsite"];
if(!$subsite)
get_header();
$_SESSION['event_id'] = $_GET["event_id"];
//echo "Hiii".$file= get_site_url()."/autocomplete/"; 
 //include("autocomplete.php"); ?>
<style>
div#nonresident_reg {
    padding-left: 68px;
    padding-top: 10px;
}
h2.title {
    padding-left: 82px;
    padding-top: 21px;
    }

#ribbon-main {
   margin-left: 265px;
}
div#ribbon-main {
    width: 800px;
}
#temp
{
  display: none;
}
#next{
color: white;
    background-color: #145782;
    border-radius: 14.5px;
    padding: 10px 27px;
    cursor: pointer;
  }
  .travel-info
  {
  -webkit-transition-property: top, bottom;
  -webkit-transition-duration: 0.5s;
  }
  #first_name_search
  {
    background-color: #fff;
    color: rgba(0, 0, 0, 0.65);
    width: 50%;
    font-size: 18px;
    border-top-color: rgba(0, 0, 0, 0.45);
    width: 250px;
    line-height: 20px;
    font-weight: 300;
    height: 19px;
  }
  #search_name
  {
    background-color: #fff;
    color: rgba(0, 0, 0, 0.65);
    width: 50%;
    font-size: 18px;
    border-top-color: rgba(0, 0, 0, 0.45);
    width: 250px;
    line-height: 20px;
    font-weight: 300;
    height: 19px;
  }
    #next_button,#back_button
    {
    color: white;
    background-color: #145782;
    border-radius: 14.5px;
    padding: 10px 27px;
    cursor: pointer;
    }
    #updateb,#modifyb,#addb
    {
    color: #f4f4f4;
       background-color: #145782;
    border-radius: 14.5px;
    padding: 10px 27px;
    cursor: pointer;
    margin-left: 120px;
    }
    .updateB,.modifyB
    {
      padding-left: 300px;
      margin-top: -31px;
    }
    .backButton{
      padding-left: 786px;
      color: blue;
      cursor: pointer;
    }
    .updatetext,.modifytext,.uniquetext
    {
      color: #be2f2f;
    }
    #reg_message {
    color: red;
    }
    #travelling_details {
    margin-top: 10px;
}
#modifyfinal
{
   color: white;
    background-color: #146482;
    border-radius: 14.5px;
    padding: 10px 27px;
    cursor: pointer;
}
div#addbutton {
    margin-bottom: 50px;
}
div#uniqueregi
{
     margin-bottom: 30px;
}
img.imag-shadow {
    margin-left: 50px;
}
select.wpcf7-form-control.wpcf7-select {
    width: 254px;
    height: 27px;
}

/*select.wpcf7-form-control.wpcf7-select {
    background-color: #fff;
    color: rgba(0, 0, 0, 0.65);
    width: 65px;
    font-size: 18px;
    border-top-color: rgba(0, 0, 0, 0.45);
    
}*/
.registration_type
{
  width:254px;
}
.spec_requirment {
    padding-left: 63px;
    padding-right: 55px;
    color: #a21818;
}
select.wpcf7-form-control.wpcf7-select {
    width: 75px;
}
div#search {
    margin-left: 82px;
    margin-top: -28px;
}
.registration-details {
    margin-top: 57px;
}

</style>
<?php


if($_GET['id']!='')
{
$encrypted= $_GET['id']; 

global $cryptKey;
//write_log('cryptKey '.$cryptKey) ;   
 $decrypted = decryptIt($encrypted);
//write_log('decrypted '.$decrypted) ; 

 global $cryptKey;
         //write_log("Decryption ######");
         //write_log("CryptKey".$cryptKey);
         //write_log ("Crypted value ".$encrypted);
         $dec=    decryptIt($abc);
        // write_log ("decrypted value ".$dec);  

//$decrypted="60-Bhaskarananda";
 $acharya_conf_id=explode("-",$decrypted);
  $sqls = $wpdb->get_results("SELECT *,CONCAT(wcr.id,'-',wp.first_name) as idfname from wp_donation as wp
        inner join wp_donation_event as wde on wp.id = wde.donation_id
        inner join wp_camp_registration as wcr on wde.id = wcr.donation_event_id
        where wde.donation_type='FreeCamp' and wp.id LIKE '".$acharya_conf_id[0]."'", ARRAY_A);
}
?>
<div id="<?php echo $_GET["postid"];?>" class="temp"></div>
<div id="primary">
   <?Php if (!$_GET["tabpage"]) { ?>
   <div id="page_main_img">
            <img src="<?php echo get_post_meta( $post_id, 'gcmw_banner_image', true );?>" >
</div> 
<?php } ?>           
   <div class = "logo-ribbon">
        <div id="ribbon-main" style="margin-top: 30px;">
            <img src="<?php echo get_post_meta( $post_id, 'gcmw_logo_image', true ); ?>" />
        </div>
        <img src="/wp-content/uploads/2013/03/strip2.png" class="imag-shadow" style="transform:rotate(180deg);
        -ms-transform:rotate(180deg); /* IE 9 */ -webkit-transform:rotate(180deg); /* Safari and Chrome */ margin-top: -4px;">
    </div>
 
 
   <div class="spec_requirment"> <p><b>Special Instruction:</b>  This camp is only for those acharyas currently serving the mission and have received an invitation from CCMT to register. If in doubt please contact chinmaya.vibhooti@chinmayamission.com before you register.</p></div>
 <div class="tabs">
    <ul>
      <li class='cat-item' >
       New Registration
      </li>
      <li class='cat-item1' >
        Modify Registration
      </li>
    </ul>
  </div>

   
       <?php 
        if(get_post_meta( $post->ID, 'gcmw_reg_status', true ) <> 'closed'){   ?>

<div class="new_reg" >

          <?php
            echo do_shortcode(get_post_meta($post->ID,'short_code1',true));
          ?>
</div>

<div class="mod_reg" style="display:none">
  <?php  
            echo do_shortcode(get_post_meta($post->ID,'short_code1',true));
           ?> </div><?php 
         }else{ ?>
          <b> Sorry, Registration closed. Please visit us next time. </b>
      
       <?php 
      }  ?>    
  </div>
<?php
$file= get_site_url()."/autocomplete/"; 
$file1=get_site_url()."/autocomplete-acharya-selection/";
?>
 <!doctype html>
<html lang="en">
<head>
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
     
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
     <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
      <script type="text/javascript" src="js/jquery.form.js"></script>  
      <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    
</head>
 <script>


function checkNull(textfieldname) {    
    if(textfieldname.val().length == 0 || textfieldname.val() == "" ){
          event.preventDefault();
          if(textfieldname.attr("aria-invalid") === "false"){
            textfieldname.attr( "aria-invalid", "true" );
            textfieldname.after( "<span class='custom-alert' style='color: #f00;'>The field is required. </span>" );
          }
      }
      else {
             textfieldname.attr( "aria-invalid", "false" );
            $( ".custom-alert" ).remove();
      }     
} 
function checkNullCheckbox(textfieldname,lablename)
{
  if(textfieldname.val() == "" || textfieldname.val() === undefined)
            {
              event.preventDefault();
              
              lablename.attr( "aria-invalid", "true" );
              lablename.after( "<span class='custom-alert' style='color: #f00;'>Please choose one option,The field is required. </span>" );
            }
          
            else
            {
              lablename.attr( "aria-invalid", "false" );
              $( ".custom-alert" ).remove();
            }

}

function checkValidDepartDate(arrDate,deptDate){  
  if (Date.parse(deptDate.val()) <= Date.parse(arrDate.val())) {
    event.preventDefault();
    if(deptDate.attr("aria-invalid") === "false"){
      deptDate.attr( "aria-invalid", "true" );
      deptDate.after( "<span class='custom-alert' style='color: #f00;'>departure date should grether than arrival date</span>" );
    }
  }
  else
    $('div.new_reg #departuredate input').attr( "aria-invalid", "false" );
}


function checkValidArrDate(arrDate,deptDate){  
  if (Date.parse(arrDate.val()) >= Date.parse(deptDate.val())) {
    event.preventDefault();
    if(arrDate.attr("aria-invalid") === "false"){
      arrDate.attr( "aria-invalid", "true" );
      arrDate.after( "<span class='custom-alert' style='color: #f00;'>arrival date should less than departure date</span>" );
    }
  }
  else
    $('div.new_reg #departuredate input').attr( "aria-invalid", "false" );
}

      
         //tab click code
  jQuery(function($){ 
       $('div.new_reg #acharya_lookup input').css({'background-color' : '#eaeaea'});
       $('div.mod_reg #acharya_lookup input').css({'background-color' : '#eaeaea'});
       var acharya_lookup= $('div.new_reg #acharya_lookup input').val();
          if(acharya_lookup=='Yes')
          {
             $('div.new_reg #registration_type select option[value="Sevak"]').remove();
             $('div.new_reg #registration_type select option[value="Participant"]').remove();
             $('div.new_reg #registration_type select').html("<option value='Acharya' selected>Acharya</option>" );
             $('div.new_reg #registration_type option:not(:selected)').attr("readonly", true);
             $('div.new_reg #registration_type select').css({'background-color' : '#eaeaea'});
          }
         // alert($('#first_name_search').val());
          /*var serchname=$('#first_name_search').val();
          var searchnames=serchname.split("-");
          alert(serchnames[0]);*/
         // $('div.new_reg #first_name input').val($('#first_name_search').val());
          $('div.new_reg #first_name input').css({'background-color' : '#eaeaea'});
          $('div.new_reg #first_name input').attr("readonly", true);
     

          $("div.new_reg #need_Trans input").click(function(){
 
    if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "Yes"){
      jQuery("div.new_reg .trans_info").show();
      jQuery("div.new_reg .ownarreng").hide();    
      jQuery('div.new_reg #arrivaldate input').val('');
      jQuery('div.new_reg #arrivaltime input').val(''); 
      jQuery('div.new_reg #departuredate input').val(''); 
      jQuery('div.new_reg #departuretime input').val('');
    }
    else if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "No")
    { 
      jQuery("div.new_reg .ownarreng").show();
      jQuery("div.new_reg .trans_info").hide();
      jQuery('div.new_reg  .from_pune' ).attr("checked", false);
      jQuery('div.new_reg .from_sandeepany').attr("checked",  false);
      jQuery('div.new_reg  .to_pune' ).attr("checked", false);
      jQuery('div.new_reg .to_sandeepany').attr("checked",  false);

    }
});
           $("div.mod_reg #need_Trans input").click(function(){
 
    if($('div.mod_reg input:radio[name=need_Trans]:checked').val() == "Yes"){
      jQuery("div.mod_reg .trans_info").show();
      jQuery("div.mod_reg .ownarreng").hide();    
      jQuery('div.mod_reg #arrivaldate input').val('');
      jQuery('div.mod_reg #arrivaltime input').val(''); 
      jQuery('div.mod_reg #departuredate input').val(''); 
      jQuery('div.mod_reg #departuretime input').val('');
    }
    else if($('div.mod_reg input:radio[name=need_Trans]:checked').val() == "No")
    { 
      jQuery("div.mod_reg .ownarreng").show();
      jQuery("div.mod_reg .trans_info").hide();
      jQuery('div.mod_reg  .from_pune' ).attr("checked", false);
      jQuery('div.mod_reg .from_sandeepany').attr("checked",  false);
      jQuery('div.mod_reg  .to_pune' ).attr("checked", false);
      jQuery('div.mod_reg .to_sandeepany').attr("checked",  false);

    }
});



          $( ".wpcf7-form" ).submit(function( event ) {
            //travelDateNotNullValidation();
            //travelDateValidation();
           if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "No"){
            checkNull($('div.new_reg #arrivaldate input'));
            checkNull($('div.new_reg #departuredate input'));
            checkNull($('div.new_reg #arrivaltime input'));
            checkNull($('div.new_reg #departuretime input'));
            var arrDate = $('div.new_reg #arrivaldate input');
            var deptDate = $('div.new_reg #departuredate input');  
           checkValidDepartDate(arrDate,deptDate);
           checkValidArrDate(arrDate,deptDate);
           }
           else if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "Yes")
           {
             checkNullCheckbox($('div.new_reg input:radio[name=arrivalToCV]:checked'),$('div.new_reg .arrival_options'));
             checkNullCheckbox($('div.new_reg input:radio[name=departureFromCV]:checked'),$('div.new_reg .departure_options'));
           }

           if($('div.mod_reg input:radio[name=need_Trans]:checked').val() == "No"){
            checkNull($('div.mod_reg #arrivaldate input'));
            checkNull($('div.mod_reg #departuredate input'));
            checkNull($('div.mod_reg #arrivaltime input'));
            checkNull($('div.mod_reg #departuretime input'));
            var arrDate = $('div.mod_reg #arrivaldate input');
            var deptDate = $('div.mod_reg #departuredate input');  
           checkValidDepartDate(arrDate,deptDate);
           checkValidArrDate(arrDate,deptDate);
           }
           else if($('div.mod_reg input:radio[name=need_Trans]:checked').val() == "Yes")
           {
             checkNullCheckbox($('div.mod_reg input:radio[name=arrivalToCV]:checked'),$('div.mod_reg .arrival_options'));
             checkNullCheckbox($('div.mod_reg input:radio[name=departureFromCV]:checked'),$('div.mod_reg .departure_options'));
           }
     });

           $('.cat-item1').click(function()  // click on second tab
            {
              
                
              $(this).val('');
             $(".cat-item").removeClass("arrow_active");
             $(this).addClass("arrow_active");
             $(".new_reg").hide();
             $(".mod_reg").show();
             $("div.mod_reg input#first_name_search").hide();
             $("#search_name").show();
             $(".reg_message").hide();
             $("div.mod_reg #next_button").hide();
             $("div.mod_reg #travelling_details").show();
             $("div.mod_reg #backButton").hide();
             $("div.mod_reg .wpcf7-submit").hide();
           });
           $('.cat-item').click(function() //click on second tab
           {
           
              $(this).val('');
             
            $(".cat-item1").removeClass("arrow_active");
            $(this).addClass("arrow_active");
            $(".mod_reg").hide();
            $(".new_reg").show();
            $( "#first_name_search" ).show();
            $("#search_name").hide();
            $(".reg_message").hide();
            jQuery("div.new_reg .trans_info").hide();
            jQuery("div.new_reg .ownarreng").hide();
            $("div.new_reg #travelling_details").hide();
            $("div.new_reg #contact_details").show();

          });

          /* after modification mail click on link first second tab will open and display all data of that acharya*/
           var acharya_id='<?php echo $acharya_conf_id[0];?>';
           var acharya_name="<?php echo $acharya_conf_id[1];?>";
           var need="<?php echo $sqls[0]['need_transport'];?>";
           var spe_arr="<?php echo $sqls[0]['special_arrengment'];?>";
           var arrivalToCV="<?php echo $sqls[0]['arrivalFrom'];?>";
           var departureFromCV="<?php echo $sqls[0]['departureTo'];?>";
           var registration_type="<?php echo $sqls[0]['registration_type'];?>";
           
           $("div.mod_reg #modifyfinal").click(function(){

                      $('div.mod_reg .mod_status').val('true');
                      $('div.mod_reg .id').val(acharya_id); 
                      $('div.mod_reg .search_ach_name').val(acharya_name);      
                    });




           //alert(registration_type);
           if(acharya_id !='' && acharya_name!='')
           {
             $('.cat-item1').addClass("arrow_active");
             $(".new_reg").hide();
             $(".mod_reg").show();
             $("div.mod_reg input#first_name_search").hide();
             $("div.mod_reg #search_name").show();
             $("div.mod_reg #next_button").hide();
             $("div.mod_reg #backButton").hide();
             $("div.mod_reg #modifyfinal").show();
             $("div.mod_reg #final_submit").hide();
             $("div.mod_reg .wpcf7-submit").hide();
              $("div.mod_reg #travelling_details").show();
             
                     $("div.mod_reg #search_name").attr('readonly', true);
                     $("div.mod_reg #first_name input").attr('readonly', true);
                     $('div.mod_reg #your-email input').attr('readonly',true);
                     $('div.mod_reg #acharya_lookup input').attr('readonly',true);
                     $('div.mod_reg #search_name').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #first_name input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #your-email input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #search_name').val('<?php echo $sqls[0]['first_name'];?>');
                     $('div.mod_reg #acharya_lookup input').val('<?php echo $sqls[0]['acharya_lookup'];?>'); 
                     $('div.mod_reg #first_name input').val('<?php echo $sqls[0]['first_name'];?>'); 
                     $('div.mod_reg #selectg select').val('<?php echo $sqls[0]['prefix'];?>'); 
                     $('div.mod_reg #center input').val('<?php echo $sqls[0]['center'];?>'); 
                     $('div.mod_reg #your-email input').val('<?php echo $sqls[0]['email'];?>'); 
                     $('div.mod_reg #phone_number input').val('<?php echo $sqls[0]['contact'];?>'); 
                     $('div.mod_reg #address_line1 input').val('<?php echo $sqls[0]['address1'];?>'); 
                     $('div.mod_reg #address_line2 input').val('<?php echo $sqls[0]['address2'];?>'); 
                     $('div.mod_reg #city input').val('<?php echo $sqls[0]['city'];?>'); 
                     $('div.mod_reg #state input').val('<?php echo $sqls[0]['state'];?>'); 
                     $('div.mod_reg #donation_country select').val('<?php echo $sqls[0]['country'];?>'); 
                     $('div.mod_reg #pincode input').val('<?php echo $sqls[0]['pincode'];?>');
                     $('div.mod_reg #specialre textarea').val('<?php echo $sqls[0]['special_arrengment'];?>');
                     if(registration_type=='Acharya')
                     {
                      $('div.mod_reg #registration_type select').html("<option value='"+registration_type+"' selected>"+registration_type+"</option>" );
                      $('div.mod_reg #registration_type option:not(:selected)').attr("disabled", true);
                      $('div.mod_reg #registration_type select').css({'background-color' : '#eaeaea'});
                     }
                     else 
                      $('div.mod_reg #registration_type select').val('<?php echo $sqls[0]['registration_type'];?>');
                    if(spe_arr=="null")
                      {
                        $('div.mod_reg .special_arrengment').hide();
                      }
                      $('div.mod_reg #need_Trans radio option[value=' + need + ']').attr("checked", "checked");
                      if(need=="Yes")
                      {
                           // $('div.mod_reg  .first' ).attr("checked", "checked");
                        jQuery("div.mod_reg .trans_info").show();
                        jQuery("div.mod_reg .ownarreng").hide();
                          if(arrivalToCV=='chinmaya mauli pune')
                          {
                             //alert("from_pune");
                             $('div.mod_reg  .from_pune' ).attr("checked", "checked");
                          }
                          else if(arrivalToCV=='sandeepany sadhanalaya')
                          {
                             //alert("from_sandeepany");
                             $('div.mod_reg .from_sandeepany').attr("checked",  "checked");
                          }

                          if(departureFromCV=='chinmaya mauli pune')
                          {
                             //alert("from_pune");
                             $('div.mod_reg  .to_pune' ).attr("checked", "checked");
                          }
                          else if(departureFromCV=='sandeepany sadhanalaya')
                          {
                             //alert("from_sandeepany");
                             $('div.mod_reg .to_sandeepany').attr("checked",  "checked");
                          }
  
                      }
                      else if(need=="No")
                      {
                        jQuery("div.mod_reg .ownarreng").show();
                        jQuery("div.mod_reg .trans_info").hide();
                        $('div.mod_reg #arrivaldate input').val('<?php echo $sqls[0]['arrival_date'];?>');
                        $('div.mod_reg #arrivaltime input').val('<?php echo $sqls[0]['arrival_time'];?>');
                        $('div.mod_reg #departuredate input').val('<?php echo $sqls[0]['departure_date'];?>'); 
                        $('div.mod_reg #departuretime input').val('<?php echo $sqls[0]['departure_time'];?>'); 
                      }

 /* end of click on mail link first open second tab and display all data of that acharya*/
              
                      }
            else
             {
               $(".travelling_details").hide();
               $(".trans_info").hide();
               $(".ownarreng").hide();
               $(".tabs li:first").addClass("arrow_active");
               $(".mod_reg").hide();  //on   page load hide second tab content
               $("#search_name").hide(); //hide searchbar text on page load
          }
               
       });


  jQuery(function($){ 
              $( "#first_name_search").autocomplete({   //autocomplete for first search text
              source: function( request, response ) {
               abc=  $.getJSON( "<?php echo $file; ?>", {
                        term: $('#first_name_search').val()
                       },response);
                 },minLength:3,  
               }); 
               

                $( "#first_name_search" ).on('autocompletesearch',function (e, ui){ 
                     $('div.new_reg #selectg select').val(''); 
                     $('div.new_reg #center input').val(''); 
                     $('div.new_reg #your-email input').val(''); 
                     $('div.new_reg #phone_number input').val(''); 
                     $('div.new_reg #address_line1 input').val(''); 
                     $('div.new_reg #address_line2 input').val(''); 
                     $('div.new_reg #city input').val(''); 
                     $('div.new_reg #state input').val(''); 
                     $('div.new_reg #donation_country select').val(''); 
                     $('div.new_reg #pincode input').val(''); 
                     $('input').removeAttr('readonly');
                     $('div.new_reg #donation_country option:not(:selected)').attr("disabled", false);
                     $('div.new_reg #selectg option:not(:selected)').attr("disabled", false);
                     $('div.new_reg #selectg select').css({'background-color' : '#ffffff'});
                     $('div.new_reg #center input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #your-email input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #phone_number input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #address_line1 input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #address_line2 input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #city input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #state input').css({'background-color' : '#ffffff'});
                     $('div.new_reg #donation_country select').css({'background-color' : '#ffffff'});
                     $('div.new_reg #pincode input').css({'background-color' : '#ffffff'});   
                     $('div.new_reg .updatebutton').hide();
                     $('div.new_reg .uniqueregi').hide();
                     $('div.new_reg .addbutton').hide();
                   
               });

               $( "#first_name_search" ).on('autocompleteresponse',function (e, ui){ 

                  $('div.new_reg #first_name input').val($('#first_name_search').val());
                   $('div.new_reg #first_name input').attr("readonly", true);
                   $('div.new_reg #first_name input').css({'background-color' : '#eaeaea'});

                   if(ui.content== null) { 
                        $('div.new_reg .uniqueregi').hide();
                        $('.addbutton').show();
                        $('div.new_reg #registration_type select').css({'background-color' : '#ffffff'});
                        $('div.new_reg #acharya_lookup input').val('No');
                         $('div.new_reg #acharya_lookup input').attr('readonly',true);
                        $('div.new_reg #registration_type select option[value="Sevak"]').remove();
                        $('div.new_reg #registration_type select option[value="Participant"]').remove();
                         $('div.new_reg #registration_type select')
                           .html("<option>--</option>,<option value='Sevak' >Sevak</option>,<option value='Participant' >Participant</option>" );
                         
                     } else if(ui.content!= null)  
                      { 
                        $('.addbutton').hide();
                         $('div.new_reg #acharya_lookup input').attr('readonly',true);
                        $('div.new_reg #registration_type select option[value="Sevak"]').remove();
                        $('div.new_reg #registration_type select option[value="Participant"]').remove();
                         $('div.new_reg #registration_type select')
                           .html("<option value='Acharya' selected>Acharya</option>" );
                         $('div.new_reg #registration_type option:not(:selected)').attr("readonly", true);
                         $('div.new_reg #registration_type select').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #acharya_lookup input').val('Yes');
                         //alert( $('div.new_reg #acharya_lookup').val());
                        
                    }   
               });

              
        
            
                  $( "#first_name_search" ).on('autocompleteselect',function (e, ui){
                    selectedacharyaname=ui.item.label;
                    $.ajax({
                     type: 'GET',
                     url: '<?php echo $file1; ?>',
                     data: $('#first_name_search').val(selectedacharyaname),
                     success: function(data){
                     var obj = JSON.parse(data);
                    if(obj[0]=='registered')
                    {
                      $('div.new_reg .updatebutton').hide();
                      $('div.new_reg .uniqueregi').show();
                    }
                    else
                    {
                     $('div.new_reg .uniqueregi').hide();
                     $('div.new_reg #first_name input').val(obj[0]);
                     $('div.new_reg #selectg select').val(obj[1]); 
                     $('div.new_reg #center input').val(obj[2]); 
                     $('div.new_reg #your-email input').val(obj[12]); 
                     $('div.new_reg #phone_number input').val(obj[11]); 
                     $('div.new_reg #address_line1 input').val(obj[4]); 
                     $('div.new_reg #address_line2 input').val(obj[5]); 
                     $('div.new_reg #city input').val(obj[10]); 
                     $('div.new_reg #state input').val(obj[9]); 
                     $('div.new_reg #donation_country select').val(obj[8]); 
                     $('div.new_reg #pincode input').val(obj[7]); 
                     $('div.new_reg .updatebutton').show();
                    }
                         $('div.new_reg #first_name input').attr('readonly', true);
                         $('div.new_reg #selectg option:not(:selected)').attr('disabled', true);
                         $('div.new_reg #center input').attr('readonly', true);
                         $('div.new_reg #your-email input').attr('readonly', true);
                         $('div.new_reg #phone_number input').attr('readonly', true);
                         $('div.new_reg #address_line1 input').attr('readonly', true);
                         $('div.new_reg #address_line2 input').attr('readonly', true);  
                         $('div.new_reg #city input').attr('readonly', true);
                         $('div.new_reg #state input').attr('readonly', true);
                         $('div.new_reg #donation_country option:not(:selected)').attr("disabled", true);
                         $('div.new_reg #pincode input').attr('readonly', true);
                         $('div.new_reg #first_name input').css({'background-color' : '#eaeaea'}); 
                         $('div.new_reg #selectg select').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #center input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #your-email input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #phone_number input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #address_line1 input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #address_line2 input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #city input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #state input').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #donation_country select').css({'background-color' : '#eaeaea'});
                         $('div.new_reg #pincode input').css({'background-color' : '#eaeaea'});
                     }
                       });
                       });
                         $("div.new_reg .updatebutton").click(function(){
                         $('input').removeAttr('readonly');
                         $('div.new_reg #first_name input').attr('readonly', true);
                         $('div.new_reg #donation_country option:not(:selected)').attr("disabled", false);
                         $('div.new_reg #selectg option:not(:selected)').attr("disabled", false);
                         $('div.new_reg #selectg select').css({'background-color' : '#ffffff'});
                         $('div.new_reg #center input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #your-email input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #phone_number input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #address_line1 input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #address_line2 input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #city input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #state input').css({'background-color' : '#ffffff'});
                         $('div.new_reg #donation_country select').css({'background-color' : '#ffffff'});
                         $('div.new_reg #pincode input').css({'background-color' : '#ffffff'});    

            });
       
    



  if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "Yes"){
         jQuery("div.new_reg .trans_info").show();
         jQuery("div.new_reg .ownarreng").hide();
         $('div.new_reg  .from_pune' ).attr("checked", false);
         $('div.new_reg .from_sandeepany').attr("checked",  false);
         $('div.new_reg  .to_pune' ).attr("checked", false);
         $('div.new_reg .to_sandeepany').attr("checked",  false);
    }
    else if($('div.new_reg input:radio[name=need_Trans]:checked').val() == "No")
    { 
      jQuery("div.new_reg .ownarreng").show();
      jQuery("div.new_reg .trans_info").hide();
    }



$( "div.mod_reg input#search_name" ).autocomplete({  //autocomplete for second search text   
              source: function( request, response ) {
               abc=  $.getJSON( "<?php echo $file; ?>", {
                     search_name: $('div.mod_reg input#search_name').val()
                     },response);
                 },minLength:3,  
              });
 $( "div.mod_reg input#search_name" ).on('autocompleteresponse',function (e, ui){   
                   if(ui.content== null) { 
                     $(".cat-item1").removeClass("arrow_active");
                     $(".cat-item").addClass("arrow_active");
                     $(".mod_reg").hide();
                     $(".new_reg").show(1000);
                     $(".reg_message").show();
                     $( "#first_name_search" ).show();
                     $("#search_name").hide(); }
                   else{ $('.addbutton').hide(); }   
             });
$( "div.mod_reg input#search_name" ).on('autocompletesearch',function (e, ui){ 
                     $('div.mod_reg #first_name input').val('');
                     $('div.mod_reg #selectg select').val(''); 
                     $('div.mod_reg #center input').val(''); 
                     $('div.mod_reg #your-email input').val(''); 
                     $('div.mod_reg #phone_number input').val(''); 
                     $('div.mod_reg #address_line1 input').val(''); 
                     $('div.mod_reg #address_line2 input').val(''); 
                     $('div.mod_reg #city input').val(''); 
                     $('div.mod_reg #state input').val(''); 
                     $('div.mod_reg #donation_country select').val(''); 
                     $('div.mod_reg #pincode input').val(''); 
                     $('div.mod_reg #specialre textarea').val('');
                     $('div.mod_reg #arrivaldate input').val('');
                     $('div.mod_reg #arrivaltime input').val(''); 
                     $('div.mod_reg #departuredate input').val('');
                     $('div.mod_reg #departuretime input').val('');
                    
               });




  $( "div.mod_reg input#search_name" ).on('autocompleteselect',function (e, ui){
                    selectedacharyaname=ui.item.label;
                     $.ajax({
                     type: 'GET',
                     url: '<?php echo $file1; ?>',
                     data: $('div.mod_reg input#search_name').val(selectedacharyaname),
                     success: function(data){
                     var obj = JSON.parse(data);
                     $('div.mod_reg #first_name input').val(obj[0]);
                     $('div.mod_reg #selectg select').val(obj[1]); 
                     $('div.mod_reg #center input').val(obj[10]); 
                     $('div.mod_reg #your-email input').val(obj[9]); 
                     $('div.mod_reg #phone_number input').val(obj[8]); 
                     $('div.mod_reg #address_line1 input').val(obj[2]); 
                     $('div.mod_reg #address_line2 input').val(obj[3]); 
                     $('div.mod_reg #city input').val(obj[7]); 
                     $('div.mod_reg #state input').val(obj[6]); 
                     $('div.mod_reg #donation_country select').val(obj[5]); 
                     $('div.mod_reg #pincode input').val(obj[4]);
                     $('div.mod_reg #specialre textarea').val(obj[11]);
                      if(obj[11]=="null")
                      {
                        $('div.mod_reg .special_arrengment').hide();
                      }
                      
                      if(obj[12]=="null")
                      {
                       $('div.mod_reg .trans_info').hide();
                      }
                      if(obj[12]=="Yes")
                      {
                        jQuery("div.mod_reg .trans_info").show();
                        jQuery("div.mod_reg .ownarreng").hide();
                        if(obj[13]=="chinmaya mauli pune")
                          {
                             //alert("from_pune");
                             $('div.mod_reg  .from_pune' ).attr("checked", "checked");
                          }
                          else if(obj[13]=="sandeepany sadhanalaya")
                          {
                             //alert("from_sandeepany");
                             $('div.mod_reg .from_sandeepany').attr("checked",  "checked");
                          }

                          if(obj[14]=="chinmaya mauli pune")
                          {
                             //alert("from_pune");
                             $('div.mod_reg  .to_pune' ).attr("checked", "checked");
                          }
                          else if(obj[14]=="sandeepany sadhanalaya")
                          {
                             //alert("from_sandeepany");
                             $('div.mod_reg .to_sandeepany').attr("checked",  "checked");
                          }
                     
                      }
                      else  if(obj[12]=="No")
                      {
                        jQuery("div.mod_reg .ownarreng").show();
                        jQuery("div.mod_reg .trans_info").hide();
                        $('div.mod_reg #arrivaldate input').val(obj[15]);
                        $('div.mod_reg #arrivaltime input').val(obj[16]); 
                        $('div.mod_reg #departuredate input').val(obj[17]); 
                        $('div.mod_reg #departuretime input').val(obj[18]); 
                      }
                    // alert(obj[20]);
                      $('div.mod_reg #registration_type select').html("<option value='"+obj[20]+"' selected>"+obj[20]+"</option>" );
                      $('div.mod_reg #acharya_lookup input').val(obj[21]);
                     $('div.mod_reg #need_transport').hide();
                     $('div.mod_reg .modifybutton').show();
                     $('div.mod_reg #first_name input').attr('readonly', true);
                     $('div.mod_reg #selectg option:not(:selected)').attr('disabled', true);
                     //$('div.mod_reg #arrival_time_ap option:not(:selected)').attr('disabled', true);
                     //$('div.mod_reg #departure_time_ap option:not(:selected)').attr('disabled', true);
                     $('div.mod_reg #center input').attr('readonly', true);
                     $('div.mod_reg #your-email input').attr('readonly', true);
                     $('div.mod_reg #phone_number input').attr('readonly', true);
                     $('div.mod_reg #address_line1 input').attr('readonly', true);
                     $('div.mod_reg #address_line2 input').attr('readonly', true);
                     $('div.mod_reg #city input').attr('readonly', true);
                     $('div.mod_reg #state input').attr('readonly', true);
                     $('div.mod_reg #donation_country option:not(:selected)').attr('disabled', true);
                     $('div.mod_reg #registration_type option:not(:selected)').attr('disabled', true);
                     $('div.mod_reg #pincode input').attr('readonly', true);
                     $('div.mod_reg #specialre textarea').attr('readonly', true);
                     $('div.mod_reg #arrivaldate input').attr('readonly', true);
                     $('div.mod_reg #arrivaltime input').attr('readonly', true);
                     $('div.mod_reg #departuredate input').attr('readonly', true);
                     $('div.mod_reg #departuretime input').attr('readonly', true);

                         //$('#first_name').attr('readonly', false); 
                     $('div.mod_reg #first_name input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #selectg select').css({'background-color' : '#eaeaea'});
                    // $('div.mod_reg #arrival_time_ap select').css({'background-color' : '#eaeaea'});
                    // $('div.mod_reg #departure_time_ap select').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #center input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #your-email input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #phone_number input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #address_line1 input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #address_line2 input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #city input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #state input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #donation_country select').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #pincode input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #specialre textarea').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #arrivaldate input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #arrivaltime input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #departuredate input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #departuretime input').css({'background-color' : '#eaeaea'});
                     $('div.mod_reg #registration_type select').css({'background-color' : '#eaeaea'});
                     $("div.mod_reg #modifyb").click(function(){
                       // alert("hii");
                      $('div.mod_reg .status').val('true');
                      $('div.mod_reg .id').val(obj[19]);       
                    });
                  }
              });
              });

   });

  jQuery(document).ready(function(){
      jQuery("#next_button").click(function(){
      jQuery("#contact_details").hide(1000);
      jQuery(".travelling_details").show();
      });
       jQuery("#backButton").click(function(){
       jQuery(".travelling_details").hide(1000);
       jQuery(".contact_details").show(1000);
     });
});

  
</script>  
</html>
<?php
if (!$subsite)
get_footer();
?>
