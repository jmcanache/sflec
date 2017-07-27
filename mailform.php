<?php
if (!empty($_REQUEST['email']) and !empty($_REQUEST['name']) and !empty($_REQUEST['category']) and !empty($_REQUEST['subject'])  and !empty($_REQUEST['message']))
//if "email" is filled out, send email
{
	//send email
	$headers = "From: " . strip_tags($_REQUEST['email']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_REQUEST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email = $_REQUEST['email'] ;
	$subject = $_REQUEST['name'] ;
	$message = "<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<div style='margin-bottom: 50px; text-align: center;'><p style='font-size:18px;color:grey;'>You have a new message</p></div>
				<div style='margin-bottom: 10px;color:grey;text-align: center;'><p><strong>Name</strong> " . $_REQUEST['name']  . "</p></div>
				<div style='margin-bottom: 10px;color:grey;text-align: center;'><p><strong>Email:</strong> " . $_REQUEST['email']  . "</p></div>
				<div style='margin-bottom: 10px;color:grey;text-align: center;'><p><strong>Category:</strong> " . $_REQUEST['category']  . "</p></div>
				<div style='margin-bottom: 50px;color:grey;text-align: center;'><p><strong>Subject:</strong> " . $_REQUEST['subject']  . "</p></div>
				<div style='margin-bottom: 50px;color:grey;text-align: center;'><p><strong>Message:</strong> " . $_REQUEST['message']  . "</p></div>

				</body>
				</html>
				";
	
	if (mail("canache39@gmail.com", $subject, $message, $headers)){
		$result = true;
		echo json_encode($result);
	}else{
		$result = false;
		echo json_encode($result);
	}
}
else{
	$result = 'false';
	echo json_encode($result);
	}
?>