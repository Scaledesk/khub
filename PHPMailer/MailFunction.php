<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail1 = new PHPMailer;
/*$email=$_POST['email'];*/

$phone=$_POST['phone'];
$name=$_POST['name'];
$c_subject=$_POST['subject'];
$comment=$_POST['comment'];

 //$emailadmin="nkscoder@gmail.com";

  $emailadmin="hello@interiopro.com";
  
$subject = "Contact Us - Interio Pro";

$email=$_POST['email'];

$Usersubject="Thank You for Interio Pro";
$messageUsers=file_get_contents('template.html');
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br>Phone:-'.$phone.'<br>Company :-'.$c_subject.'<br>Address :-'.$comment. '</div>
</body>
</html>';

if($email){
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br>Email:-'.$email.'<br>Phone:-'.$phone.'<br>Company :-'.$c_subject.'<br>Address :-'.$comment. '</div>
</body>
</html>';

}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hello@interiopro.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                       // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;// TCP port to connect to
$mail->IsHTML(true);
$mail->setFrom('hello@interiopro.com', 'Interio Pro');
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('hello@interiopro.com', 'noreply');

$mail1->isSMTP();                                      // Set mailer to use SMTP
$mail1->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail1->SMTPAuth = true;                               // Enable SMTP authentication
$mail1->Username = 'hello@interiopro.com';                 // SMTP username
$mail1->Password = 'qazplmq1w2e3r4';                           // SMTP password
//$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail1->Port = 587;// TCP port to connect to
$mail1->IsHTML(true);
$mail1->setFrom('hello@interiopro.com', 'Interio Pro');

/*if($_FILES['fileToUpload']){*/

/*}*/

$mail->addAddress($email, $name);     // Add a recipient


$mail1->addAddress($emailadmin);     // Add a recipient

$mail->Subject = $Usersubject;
$mail->Body    = $messageUsers;


$mail1->Subject = $subject;
$mail1->Body    = $message;
/*    echo "<pre/>";
    print_r($mail1);die;
*/

  




   
if($mail1->send())
 {
      if($mail->send()){
       echo "<p class='success'>Thanks for contacting us. We will contact you Interio Pro!</p>";
    }else{ echo "<p class='success'>Thanks for contacting us. We will contact you Interio Pro!</p>";}


} else {
   
   
      echo "<p class='error'>Some error occurred!</p>";

      }
