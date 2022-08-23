<!-- Payment Order Form Email Working  -->
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST['data_submit'])) {
  $mail = new PHPMailer(true);
  $project_title = $_POST['project_title'];
  $brand_name = $_POST['brand_name'];
  $project_type = $_POST['project_type'];
  $service_price = $_POST['service_price'];
  $min_budget = $_POST['min_budget'];
  $max_budget = $_POST['max_budget'];
  $project_detail = $_POST['project_detail'];
  $client_name = $_POST['client_name'];
  $client_email = $_POST['client_email'];
  $client_phone = $_POST['client_phone'];
  $client_city = $_POST['client_city'];
  $client_state = $_POST['client_state'];
  $client_country = $_POST['client_country'];
  $client_additional = $_POST['client_additional'];
  // $orderFiles = $_POST['orderFiles'];
  $subject = 'Teck Team LLC Service Confirmation';
  $priceunit = 'USD';


  $fix_price = explode('$', $service_price);


  try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = "smtp.stackmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@teckteam.org';                     //SMTP username
    $mail->Password   = 'Ot19662c0';                               //SMTP passwo      //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom("info@teckteam.org", "Congratulations ! $client_name Thanks For Buy Our $project_type Services You Have To Pay Services Charges $service_price  For Completing Our Process");
    $mail->addAddress("info@teckteam.org", $client_name);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->subject = $subject;
    $mail->Body   = "<b>Project Title</b>:&nbsp;" . $project_title .  " <br/> <b>Brand Name / Company Name</b>:&nbsp;" . $brand_name . "<br/>" . "<b>Project Type</b>:&nbsp;" . $project_type . " <br/> <b>Service Price</b>:&nbsp;"
      . $service_price . "<br/>" .  "<b>Minimum Budget</b>:&nbsp;" . $min_budget . "<br/>" .  "<b>Maximum Budget</b>:&nbsp;" . $max_budget . "<br/>" .  "<b>Min Budget</b>:&nbsp;" . $client_name . " <br/> <b>Client Email</b>:&nbsp;" . $client_email . "<br/>" . "<b>Client Phone</b>:&nbsp;" . $client_phone . " <br/> <b>Client City</b>:&nbsp;"
      . $client_city . "<br/>" . "<b>Client State</b>:&nbsp;" . $client_state . "<br>" . "<b>Client Country</b>:&nbsp;" . $client_country . " <br/>" . "<b>Additional Note</b>:&nbsp;" . $client_additional . " <br/>" . "<b>Project Detail</b>:&nbsp;" . $project_detail . " <br/>";
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  try {
    //Server settings
if($fix_price[1] == 'custom'){
  
}
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = "smtp.stackmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@teckteam.org';                     //SMTP username
    $mail->Password   = 'Ot19662c0';                               //SMTP passwo      //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom("info@teckteam.org","Tech Team LLC");
    $mail->addAddress("$client_email", $client_name);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body   = "<b>Project Title</b>:&nbsp;" . $project_title .  " <br/> <b>Brand Name / Company Name</b>:&nbsp;" . $brand_name . "<br/>" . "<b>Project Type</b>:&nbsp;" . $project_type . " <br/> <b>Service Price</b>:&nbsp;"
      . $fix_price[1] . "<br/>" . "<b>Price UNIT</b>:&nbsp;" . $priceunit . "<br/>" .  "<b>Minimum Budget</b>:&nbsp;" . $min_budget . "<br/>" .  "<b>Maximum Budget</b>:&nbsp;" . $max_budget . "<br/>" .  "<b>Client Name</b>:&nbsp;" . $client_name . " <br/> <b>Client Email</b>:&nbsp;" . $client_email . "<br/>" . "<b>Client Phone</b>:&nbsp;" . $client_phone . " <br/> <b>Client City</b>:&nbsp;"
      . $client_city . "<br/>" . "<b>Client State</b>:&nbsp;" . $client_state . "<br>" . "<b>Client Country</b>:&nbsp;" . $client_country . " <br/>" . "<b>Additional Note</b>:&nbsp;" . $client_additional . " <br/>" . "<b>Project Detail</b>:&nbsp;" . $project_detail . " <br/>";
    $mail->send();
      $Payment_gateway_link = "https://teckteam.org/stripe-version-2/secure-pay-external.php?";
      $pUnit = base64_encode($priceunit);
      // Seperating Price from unit in text format
      $fix_price[1] = (float) $fix_price[1];
      if ($fix_price[1] == 0) {
        header("Location: ./?debug=Insecure Request 0 Price Che ckout Not Possible!");
      }
      $_POST['order_token'] = date('ymdhis');
      $oToken = base64_encode($_POST['order_token']);
      $pAmount = base64_encode($fix_price[1]);
      $oProduct = base64_encode('Digital Service');
      $Payment_link = "{$Payment_gateway_link}cevpr_havg={$pUnit}&cevpr_nzbhag={$pAmount}&cebqhpg_anzr={$oProduct}&gbxra_rkgreany={$oToken}";
      echo "<script> window.location.href = '$Payment_link'</script>";
    
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>