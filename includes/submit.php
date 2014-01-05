<?php
  if(isset($_POST["fname"]))
  {
    $el = [];
    $num = [];
    $pass = false;
    $to = "siakag@gmail.com";
    $subject = "Customer Contacted You!";

    $first_name = htmlspecialchars($_POST['fname']); $el[] = ucwords($first_name);
    $last_name = htmlspecialchars($_POST['lname']); $el[] = ucwords($last_name);
    $pnumber0 = htmlspecialchars($_POST['pnumber0']); $el[] = $pnumber0; $num[] = $pnumber0;
    $pnumber1 = htmlspecialchars($_POST['pnumber1']); $el[] = $pnumber1; $num[] = $pnumber1;
    $pnumber2 = htmlspecialchars($_POST['pnumber2']); $el[] = $pnumber2; $num[] = $pnumber2;
    $email = htmlspecialchars($_POST['email']); $el[] = $email;
    $body = htmlspecialchars($_POST['message']); $el[] = $body;

$message = <<<MESSAGE
From: $first_name $last_name <br>
Phone Number: $pnumber0 - $pnumber1 - $pnumber2 <br>
Email: $email <br>
$body
MESSAGE;

    if( validNums($num) && validStrings($el) )
    {
      buildMail($to, $email, $subject, $message);
      echo "Thank you for contacting me! You will soon recieve a confirmation response!";
    }
    else
    {
      echo "Sorry, there was an error submitting the form. Please try again.";
    }
  }
  else
  {
    echo "Sorry, there was an error submitting the form. Please try again.";
  }

  function validStrings($strArr)
  {
    foreach($strArr as $s)
    {
      $str = trim($s);
      if( empty($str) || (! isset($str)) || is_null($str) )
      {
        return false;
      }
    }
    return true;
  }


  function validNums($numArr)
  {
    foreach($numArr as $n)
    {
      if( ! is_numeric($n) )
      {
        return false;
      }
    }
    return true;
  }


  function buildMail($to, $from, $subject, $message)
  {
    require_once 'mail/phpMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
    $mail->Port = 587;
    $mail->Username = '**********@gmail.com';                            // SMTP username
    $mail->Password = '**********';                           // SMTP password
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    // $mail->SMTPDebug = 1;                        // Add debug info

    $mail->From = $from;
    $mail->FromName = "Robin's Desk";
    $mail->addAddress($to, "Robin's Desk");  // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('admin@donotreply.com', "Robin's Desk");
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->send()) {
       echo 'Message could not be sent. ';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       exit;
    }
    // echo 'Message has been sent';
  }
?>