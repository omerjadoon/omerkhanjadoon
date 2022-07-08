<?php 
require_once './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$estimate = $_POST['estimate'];
$country = $_POST['country'];
$message = $_POST['message'];
if(isset($_POST['nda']))
{
$nda = $_POST['nda'];
}
else{
	$nda = "off";
}




//send email
$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";      // SMTP server
$mail->Port       = 587;                   // SMTP port
$mail->Username   = "omerkhanjadoons@gmail.com";  // username
$mail->Password   = "babag11223";            // password

$mail->SetFrom('omerkhanjadoons@gmail.com', $name);

$mail->Subject    = "Quotation Request From Client";

$mail->MsgHTML('Name'.$name.'<br> email'.$email.'phone'.$phone.'service'.$service.'estimate'.$estimate.'country'.$country.'message'.$message.'nda'.$nda);

$address = "omerjadoon1@gmail.com";
$mail->AddAddress($address, "Jadoon Technologies");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
   $return = array(
        'status' => 200,
        'text'=>'OK',
        'message' => "OK"
    );
    http_response_code(200);
    print_r(json_encode($return));
}




 ?>