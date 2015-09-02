<?php
	if(isset($_POST['email'])) { 
    // CHANGE THE TWO LINES BELOW
		$email_to = "tom.luan@deakin.edu.au";
     
		$email_subject = "Contact Us Form!";
     
     
		function died($error) {
			// your error code can go here
			echo "We are very sorry, but there were error(s) found with the form you submitted. ";
			echo "These errors appear below.<br /><br />";
			echo $error."<br /><br />";
			echo "Please go back and fix these errors.<br /><br />";
			die();
		}
     
		// validation expected data exists
		if(!isset($_POST['first_name']) ||
			!isset($_POST['last_name']) ||
			!isset($_POST['email']) ||
			!isset($_POST['telephone']) ||
			!isset($_POST['comments'])) {
			died('We are sorry, but there appears to be a problem with the form you submitted.');       
		}
     
		$first_name = $_POST['first_name']; // required
		$last_name = $_POST['last_name']; // required
		$email_from = $_POST['email']; // required
		$telephone = $_POST['telephone']; // not required
		$comments = $_POST['comments']; // required
     
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp,$email_from)) {
			$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		}
		$string_exp = "/^[A-Za-z .'-]+$/";
		if(!preg_match($string_exp,$first_name)) {
			$error_message .= 'The First Name you entered does not appear to be valid.<br />';
		}
		if(!preg_match($string_exp,$last_name)) {
			$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
		}
		if(strlen($comments) < 2) {
			$error_message .= 'The Comments you entered do not appear to be valid.<br />';
		}
		if(strlen($error_message) > 0) {
			died($error_message);
		}
		$email_message = "Form details below.\n\n";
     
		function clean_string($string) {
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}	
     
		$email_message .= "First Name: ".clean_string($first_name)."\n";
		$email_message .= "Last Name: ".clean_string($last_name)."\n";
		$email_message .= "Email: ".clean_string($email_from)."\n";
		$email_message .= "Telephone: ".clean_string($telephone)."\n";
		$email_message .= "Comments: ".clean_string($comments)."\n";
     
     
		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
		<title>Fratelli Pizza e Pasta</title>
		<link rel="stylesheet" href="themes/mytheme.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>		
	</head>
	<body>
		<div data-role = "page" id = "homepage" data-theme = "c">
			<div data-role = "header">
				<h1>Fratelli Pizza e Pasta</h1>
			</div>
			<div data-role = "content" class = "content">
				<h1>Thank you!</h1>
				<p>Thank you for contacting us.<br />
				We will get back to you as soon as possible.<br />
				Please click <a href = "assignment1.html">here</a> to go back to the home page.
			</div>
			<div data-role = "footer">
				<h1><a href = "assignment1.html#developerpage">&copy; Travis Dennington</a></h1>
			</div>
		</div>
	</body>
</html>
<?php
	}
	die();
?>
