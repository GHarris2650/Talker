<?php
require ('db-conn.inc.php');
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Place directly inside Bootstrap container to keep the right structure of Bootstrap document
function phpShowSystemFeedback($feedback_id) {
  switch ($feedback_id) {

      case "804":
      $feedback_type="danger";
      $feedback_text="This email is already used!";
      break;
      
      case "806":
      $feedback_type="danger";
      $feedback_text="Your account has been already activated!";
      break;

      case "807":
      $feedback_type="danger";
      $feedback_text="Verification link is corrupted!";
      break;

      case "811":
      $feedback_type="success";
      $feedback_text="You account has been activated, you can sign in!";
      break;

      case "812":
      $feedback_type="warning";
      $feedback_text="Check your inbox and verify your email adddress!";
      break;

  }

  return [$feedback_type, $feedback_text];

}

function phpShowInputFeedback($feedback_id) {
	switch ($feedback_id) {
		case "801":
		$feedback_type="is-invalid";
		$feedback_text="This is not a valid email address";
		break;

		case "802":
		$feedback_type="is-invalid";
		$feedback_text="Password must be between 8 and 16 characters long, with at least one uppercase and lowercase character, one number and one special character (@, *, $ or #).";
		break;

		case "803":
		$feedback_type="is-invalid";
		$feedback_text="Passwords don't match";
		break;

		case "805":
		$feedback_type="is-invalid";
		$feedback_text="This email is not registered!";
		break;

		default:
		$feedback_type="is-invalid";
		$feedback_text="Unspecified error or warning";
		break;
    }

	return [$feedback_type, $feedback_text];
}


// Create, update or delete a record in the database
function phpModifyDB($db_query, $db_data) {
    global $connection;

    $statement = $connection->prepare($db_query);
    $statement->execute($db_data);
}


//Get the information from the database
function phpFetchDB($db_query, $db_data) {
      global $connection;

      $statement = $connection->prepare($db_query);
      $statement->execute($db_data);

      //setting the fetch mode and returning the result
      return $statement->fetch(PDO::FETCH_ASSOC);
}

function phpSendEmail($to, $subject, $content) {

  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //subclassing the SMTP class in earlier versions
  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
  );
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Set the SMTP port number
  $mail->Port = 587;
  //Set the encryption system to use tls
  $mail->SMTPSecure = 'tls';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "gharris289@gmail.com";
  //Password to use for SMTP authentication, your Gmail password comes here
  $mail->Password = SMTP_PSWD;
  //Set who the message is to be sent from
  $mail->setFrom('gharris289@gmail.com', 'Gary Harris');
  //Set who the message is to be sent to
  $mail->addAddress($to);
  //Set email format to HTML and add content
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body    = $content;
  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      $_SESSION["msgid"] = "812";
  }
} 

function phpShowEmailInputValue($user_email) {
  if ($user_email != "") {
    $content="value='" . $user_email . "'";
  }else{
    $content="";
  }
  return$content;
}

?>