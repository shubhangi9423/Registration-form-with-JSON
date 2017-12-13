<?php 
/**
  * Template Name: Acharya Confernce Confirmation
  *
  * This is the template that displays all pages by default.
  * Please note that this is the WordPress construct of pages
  * and that other 'pages' on your WordPress site will use a
  * different template.
  * */

session_start();
$eventId=$_SESSION['donationEvent']['event_id'];
$amount=$_SESSION['donationEvent']['amount'];
$paymethod=$_SESSION['donation']['payment_method'];
$country=$_SESSION['donation']['country'];
$ccmtTrxId= $_SESSION['donationEvent']['donation_id'];
//$customValues= $_SESSION['postCustomValues'];
$reg_post_id= $_SESSION['reg_post_id'];
$special_arrengment=$_SESSION['acharyaConfernceData']['special_arrengment'];
$need_transport=$_SESSION['acharyaConfernceData']['need_transport'];
$arrivalToCV=$_SESSION['acharyaConfernceData']['arrivalFrom'];
$departureFromCV=$_SESSION['acharyaConfernceData']['departureTo'];
$arrivaldate=$_SESSION['acharyaConfernceData']['arrival_date'];
$arrivaltime=$_SESSION['acharyaConfernceData']['arrival_time'];
$departuredate=$_SESSION['acharyaConfernceData']['departure_date'];
$departuretime=$_SESSION['acharyaConfernceData']['departure_time'];
$status=$_SESSION['modifydata']['modify_status'];
write_log('xxxxxxxx'.$status);
$mod_status=$_SESSION['updateData']['mod_status'];
$updated_id=$_SESSION['updateData']['updated_id'];
//$email=$_SESSION['modifydata']['email'];
$url=$_SESSION['modifydata']['url'];
//Process Payments
$prefix=$_SESSION['donation']['prefix'];

  get_header();

  ?>
  <style type="">
div#ribbon-main {
    width: 800px;
}
.ribbon-front {
   
  margin-left: 10px;
   
}

</style>
  <?php
  if($status!='')
  {
      
      ?>
      <style>
      .msg {
           font-family: 'Open Sans', arial, serif;
           padding-top: 80px;
           padding-bottom: 80px;
           }          
      </style>
      <div id="primary">
      <div class ="logo-ribbon">
                        <div id="ribbon-main" style="margin-top: 30px;">
                                <div class="ribbon-front">
                                        <img alt="" src="/wp-content/uploads/2012/09/ribbonfront.png">
                                </div>
                                <div class="ribbon" style="font-size: 16px;">
                                        
                                  <h2 class="topic" style="align:center">Acharya Conference <?php echo 'Confirmation'; ?> </h2> 

                                </div>
                                <div class="ribbon-back"><img alt="" src="/wp-content/uploads/2012/09/ribbonback.png" /></div>
                        </div>
                </div>
                <div style="margin-left:50px;margin-right: 30px;">
                  
  <div class="msg"> An update link has been send to your email id <a href="#" target="_blank"><?php echo $_SESSION['modifydata']['email'];?> </a>. <br />
    Please check your email and use the web link provided to update your information.
    <?php 

                       $templateName="template_verification.html";
                       write_log('xxxxxxxx$url'.$url);
                       notifyUser($templateName,'NOT_PAID',$reg_post_id);
 
   ?></div>
</div>
</div>
           
      <?php    
  }
  else
  {
?>

<?php
     if($_SESSION['validation_error']!=''){

  ?>
   <style>
      .msg {
           font-family: 'Open Sans', arial, serif;
           padding-top: 80px;
           padding-bottom: 80px;
           }          
      </style>
 <div id="primary">
   <div class = "logo-ribbon">
                        <div id="ribbon-main" style="margin-top: 30px;">
                                <div class="ribbon-front">
                                        <img alt="" src="/wp-content/uploads/2012/09/ribbonfront.png">
                                </div>
                                <div class="ribbon" style="font-size: 16px;">
                                        
                                  <h2 class="topic" style="align:center">Acharya Conference <?php echo 'Confirmation'; ?> </h2> 

                                </div>
                                <div class="ribbon-back"><img alt="" src="/wp-content/uploads/2012/09/ribbonback.png" /></div>
                        </div>
                </div>
                <div style="margin-left:50px;margin-right: 30px;">
                  
  <div class="msg"> Processing Failed. <?php echo $_SESSION['validation_error']; ?> </div>
</div>
</div>

  <?php 
      }
    else{
  ?>

<style>
.name
{
  width:30%;
}

.msg
{
  font-family: 'Open Sans', arial, serif;
}

.name1 {
    padding-left: 59px;
    margin-top: -19px;
}
.name2 {
    padding-left: 172px;
    margin-top: -19px;
}
.name3 {
    padding-left: 224px;
    margin-top: -19px;
}
.name4 {
    padding-left: 274px;
    margin-top: -19px;
}
.name5 {
   padding-left: 96px;
    margin-top: -19px;
}
.name6 {
   padding-left: 125px;
    margin-top: -19px;
}

.donationid {
    margin-top: -19px;
    padding-left: 135px;
}

.eventname {
    margin-top: -20px;
    padding-left: 106px;
}
.details {
  width:30%;
}

h1.details {
 font-size: 20px;
 height: 30px;
}

.amount{
  padding-left: 140px;
  margin-top: -19px;
}

h2.topic {
  margin-left: 75px;
}

input.pay {
  color: white;
  background-color: #145782;
  padding: 17px 18px 18px 23px;
  border-radius: 20px;
  margin-bottom: 11px;
}
.failMsg {
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
  color: red;
}
.successMsg {
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
}
.wallpaper {
  background-color: #fff;
  width: 997px;
  display: inline-block;
  max-height: 225px;
}
.address > strong { font-size:15px; font-weight: 600; }
.name8 {
  padding-left: 101px;
  margin-top: -19px;
}
.name9 {
  padding-left: 101px;
  margin-top: -19px;
}
.name10 {
    padding-left: 130px;
    margin-top: -19px;
}
.msg{color: #b80909;}
</style>
<div id="primary">
   <div class = "logo-ribbon">
                        <div id="ribbon-main" style="margin-top: 30px;">
                                <div class="ribbon-front">
                                        <img alt="" src="/wp-content/uploads/2012/09/ribbonfront.png">
                                </div>
                                <div class="ribbon" style="font-size: 16px;">
                                        
                                  <h2 class="topic" style="align:center">Acharya Conference <?php echo 'Confirmation' ?> </h2> 

                                </div>
                                <div class="ribbon-back"><img alt="" src="/wp-content/uploads/2012/09/ribbonback.png"></div>
                        </div>
                </div>
                <div style="margin-left:50px;margin-right: 30px;">
               <?php if(($_SESSION['acharyaConfernceData']['registration_type']=='Sevak') || ($_SESSION['acharyaConfernceData']['registration_type']=='Participant'))
               {
               ?>
                  <div class="msg">
         
          Your registration is <b>not confirmed</b>. You will be notified by CCMT if your registration is accepted. Please wait for the confirmation before you make any travel arrangements. 
                 </div>
             <?php 
               }
            ?>

  <br />
  <h1 class="details" ><b>Your Details : </b></h1>
  <h1>
   <div> 
    <div class="donation"><strong>Registration No : </strong></div>

    <div class="donationid"><?php if($mod_status!=''){ echo $updated_id;} else{ echo $_SESSION['donationEvent']['donation_id']; } ?></div><br />
  </div>
  
  
 
  <div> 
    <div class="name"><strong>Name : </strong></div>
    <div class="name1"><?php   if($prefix!='Other') { echo $prefix.' ';  }?><?php echo $_SESSION['donation']['first_name'];  ?></div><br />
  </div>
   <lable><strong>Address : </strong></lable><br /> <?php echo $_SESSION['donation']['address1'];?><br />
  <div class="ad"><?php echo $_SESSION['donation']['address2'];?><?php if($_SESSION['donation']['address2']!=''){?>,<?php } ?><?php echo $_SESSION['donation']['city'];?><br />
     <?php echo $_SESSION['donation']['state'];?>,<?php echo $_SESSION['donation']['country'];?>,<br />
     <?php echo $_SESSION['donation']['pincode'];?></div><br />
    <strong>Email : </strong> <?php echo $_SESSION['donation']['email'];?><br /><br />
    <strong>Contact No : </strong>  <?php echo $_SESSION['donation']['contact'];?><br /><br />
    <strong>Centre Name : </strong>  <?php echo $_SESSION['donation']['center'];?><br /><br />
    <?php if($_SESSION['acharyaConfernceData']['registration_type']!=''){ ?>
    <strong>Registration Type : </strong>  <?php echo $_SESSION['acharyaConfernceData']['registration_type'];?><br /><br />
    <?php } ?>
  </h1>
  <h1 class="details" ><b>Travelling Details : </b></h1>
  <?php  if($special_arrengment){?>
   <div> 
    <div class="name"><strong> Special Requirements : </strong></div>
    <div class="name2"><?php  echo $special_arrengment;  ?></div><br />
  </div>
  <?php  } if($need_transport!=''){?>
  <?php  if($arrivalToCV=='chinmaya mauli pune'){?>
   <div> 
    <div class="name"><strong> Arrival to Chinmaya Vibhooti : </strong></div>
    <div class="name3"><?php echo "Bus from Chinmaya Maauli, Pune departing on 28th Feb 9 A.M.";?></div><br />
  </div>
  <?php }
  else if($arrivalToCV=='sandeepany sadhanalaya'){ ?>
  <div> 
    <div class="name"><strong> Arrival to Chinmaya Vibhooti : </strong></div>
    <div class="name3"><?php  echo "Bus from Sandeepany Sadhanalaya to Chinmaya Vibhooti departing on 28th Feb 7 A.M.";  ?></div><br />
  </div>
  <?php } ?>
  <?php if($departureFromCV=='chinmaya mauli pune'){?>
  <div> 
    <div class="name"><strong> Departure from Chinmaya Vibhooti : </strong></div>
    <div class="name4"><?php  echo "Bus to Chinmaya Maauli, Pune departing on 4th March 2 P.M.";  ?></div><br />
  </div>
  <?php  } else if($departureFromCV=='sandeepany sadhanalaya'){?>
  <div> 
    <div class="name"><strong> Departure from Chinmaya Vibhooti : </strong></div>
    <div class="name4"><?php  echo "Bus from  Chinmaya Vibhooti to Sandeepany Sadhanalaya departing on 4th March 2 P.M.";  ?></div><br />
  </div>
  <?php } }?>
   <?php  if($arrivaldate){?>
   <div> 
    <div class="name"><strong> Arrival Date : </strong></div>
    <div class="name8"><?php  echo $arrivaldate;  ?></div><br />
  </div>
  <div> 
    <div class="name"><strong> Arrival Time : </strong></div>
    <div class="name9"><?php  echo $arrivaltime;  ?></div><br />
  </div>
   <div> 
    <div class="name"><strong> Departure Date : </strong></div>
    <div class="name10"><?php  echo $departuredate;  ?></div><br />
  </div>
  <div> 
    <div class="name"><strong> Departure Time : </strong></div>
    <div class="name10"><?php  echo $departuretime;  ?></div><br />
  </div>
  <?php  } ?> 
  <br />
   <div><p>
<?php 
  if( !isset($_POST["submit"]) ) { 
    if(!isset($_SESSION['sql_failed'])) {
      $templateName= get_post_meta( $reg_post_id, 'gcmw_email_template', true );
            notifyUser($templateName,'NOT_PAID',$reg_post_id);
      ?> 
     Thank you for registering for Worldwide Acharya's Conference a confirmation mail has been sent to your email.
      
<?php } else{ ?>
<div style="background-color: yellow;width: 60%;"><?PHP echo $_SESSION['sql_failed']; ?></div>
   <?PHP } ?>
 </p><br /> 
<?php
}
?>
</div>
</div> 
</div>
<?php
}
}
get_footer();
function notifyUser($templateName,$paymentStatus,$reg_post_id){
  write_log('xxxxxxxemailid'.print_r( $_SESSION['modifydata'],true));
                
  if( $_SESSION['donation']['email']== "")
    $to_address= $_SESSION['modifydata']['email'];
  else 
    $to_address=$_SESSION['donation']['email'];
 if(($_SESSION['acharyaConfernceData']['registration_type']=='Sevak') || ($_SESSION['acharyaConfernceData']['registration_type']=='Participant'))
  {
         $subject= "Worldwide Acharya's Conference Registration (Not Confirmed)";
   }
   else
   {
        $subject="Worldwide Acharya's Conference Registration";
   }

     $mailData= array(
      'to_address' => $to_address,
      'replyto_address' => get_post_meta( $reg_post_id, 'gcmw_replyto_address', true ),
      'cc_address' => get_post_meta( $reg_post_id, 'gcmw_cc_address', true ),
      'bcc_address' => get_post_meta( $reg_post_id, 'gcmw_bcc_address', true ),
      'subject' => $subject
    );
      //write_log('shubhangi$url'.$_SESSION['modifydata']['url']);
      $email=get_post_meta( $reg_post_id, 'gcmw_subject', true );
     write_log('xxxxxxxxxxshubhangi'.print_r($_SESSION['modifydata'],true));
      if($_SESSION['modifydata']['url']!='' ){
          $template_data= array_merge($_SESSION['modifydata']);
          //write_log('shubhangi$urlmerge'.$_SESSION['modifydata']['url']);
      } else{
        $template_data= array_merge(
        $_SESSION['donation'],
        $_SESSION['donationEvent'],
        $_SESSION['acharyaConfernceData']
      );
    }

    if($_SESSION['updateData']['mod_status']!='')
    {  
        $template_data= array_merge($template_data,$_SESSION['updateData']);
    }
    
    
    $template_data['logo_image'] = get_post_meta( $reg_post_id, 'gcmw_logo_image', true );
    $template_data['banner_image'] = get_post_meta( $reg_post_id, 'gcmw_banner_image', true );
    $template_data['event_title'] = get_the_title($_SESSION['donationEvent']['event_id']);
    
     //getTemplateData($template_data);
  
    sendMail($templateName,$template_data,$mailData);
    session_destroy();
  } 

?>