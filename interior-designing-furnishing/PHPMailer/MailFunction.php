<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail1 = new PHPMailer;
$email=$_POST['email'];

$phone=$_POST['phone'];
$name=$_POST['name'];
$type=$_POST['option'];
$comment=$_POST['comment'];
$hidden=$_POST['hidden'];


// echo $email;
// echo $phone;
// echo $name; 
// echo $type; die;
// $comment=$_POST['comment'];
// name phone email option
//$emailadmin="nkscoder@gmail.com";

  $emailadmin="hello@interiopro.com";
  
$subject = "Contact Us - Interio Pro";

// $email=$_POST['email'];

$Usersubject="Thank You for Contacting Interio Pro - Pro Designing & Pro Furnish Company, Delhi -NCR";
$messageUsers=file_get_contents('template.html');
$message ='<html>
<body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br>Phone:-'.$phone.'<br>Type :-'.$type.'<br>Address :-'.$email. '</div>
</body>
</html>';

 if($comment){
 $message ='<html>
 <body>
<div id="abcd" style="text-align:justify;font-size:18px;"> Name:-'.$name.'<br>Email:-'.$email.'<br>Phone:-'.$phone.'<br>Message :-'.$comment. '</div>
</body>
 </html>';

 }
if($hidden){
 $message ='<html>
 <body>
<div id="abcd" style="text-align:justify;font-size:18px;">Email:-'.$email.'<br>Phone:-'.$phone.'</div>
</body>
 </html>';

 }
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sub5.mail.dreamhost.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hello@interiopro.com';                 // SMTP username
$mail->Password = 'qazplmq1w2e3r4';                       // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
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
// $mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
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
  // echo "<pre/>";
  //   print_r($mail1);die;
// $mail1->SMTPDebug = 2;

   
if($mail1->send())
 {
      if($mail->send()){

      	 header("location: ../thank-you.html");
 
       // echo "<p class='success'>Thanks for contacting us. We will contact you Interio Pro!</p>";
    }else{
    	 header("location: ../thank-you.html");
    	 // header("location: /index.php?msg=Some  error Occurred");
 
     // echo "<p class='success'>Thanks for contacting us. We will contact you Interio Pro!</p>";
 }


} else
 {
   header("location: ../index.html?msg=Some  error Occurred");

   // echo  $mail1->ErrorInfo;


 }
