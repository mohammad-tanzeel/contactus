<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "phpmailer/phpmailer.php";
//if (isset($_FILES['attachment1']['name'])) {
//		if (0 < $_FILES['attachment1']['error']) {
//			echo '<span style="color:red;">Error during file upload ' . $_FILES['attachment1']['error'] . '</span>';
//		} else {
//			if (file_exists('uploads/' . $_FILES['attachment1']['name'])) {
//				echo '<span style="color:red;">File already exists at uploads/' . $_FILES['attachment1']['name'] . '</span>';
//			} else {
//				move_uploaded_file($_FILES['attachment1']['tmp_name'], 'uploads/' . $_FILES['attachment1']['name']);
//				
//                                echo '<span style="color:green;">File successfully uploaded to uploads/' . $_FILES['attachment1']['name'] . '</span>';
//			}
//		}
//	} else {
//		echo '<span style="color:red;">Please choose a file</span>';
//	}
//	echo nl2br("\n");




$body  ='<html><body>';
$body .='<table>';
$body .='<tr><td>Name : </td><td>Tanzeel</td></tr>';
$body .='<tr><td>Company Name : </td><td>Tanzeel</td></tr>';
$body .='<tr><td>Address : </td><td>Jamia Okhla</td></tr>';
$body .='<tr><td>Email ID : </td><td>tanzeel.tech@gmail.com</td></tr>';
$body .='<tr><td>Phone Number : </td><td>998877122</td></tr>';
$body .='<tr><td>Requirement : </td><td>Enquiry</td></tr>';
$body .='</table>';
$body .='</body></html>';
$attachment = array('C:\xampp\htdocs\tanzeel\GW\images\u-seal-1.jpg', 'C:\xampp\htdocs\tanzeel\GW\images\u-seal-2.jpg');
sendEmail($body, $attachment);

function sendEmail($body, $attachment){
 
        
$mail = new PHPMailer(true);
$mail->IsSMTP();

// enables SMTP debug information
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'tanzeel.tech@gmail.com';

// your gmail password
$mail->Password = 'rnf@1234';

// add a subject on send the email
$mail->Subject = ' Enquiry Email for GoodWill ';

// Sender email address and name
$mail->SetFrom('tanzeel.tech@gmail.com', 'Tanzeel');

// reciever address, person you want to send
$mail->AddAddress('tanzeel.tech@gmail.com');


// add message body
$mail->MsgHTML($body);

// add attachment if any
if(!empty($attachment)){
    foreach($attachment as $file){
     $mail->AddAttachment($file);
    }
}
//$mail->AddAttachment('C:\xampp\htdocs\tanzeel\GW\images\u-seal-1.jpg');
//$mail->AddAttachment('C:\xampp\htdocs\tanzeel\GW\images\u-seal-2.jpg');

try {
    $mail->Send();
    $msg = "Mail send successfully";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
echo $msg;

}