<?php 
$sResults="";
if(!isset($title))
{
	$title = 'Specification By Example';
	$keywords = "test, testing, acceptance, specification, example, contact";
	$description = "A simple page on specification by example that uses the bootstrap " .
			"framework, a google calendar and a contact form";
	$project = 'Specification By Example';
	include('_layout.php');
	return;
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// then we actually need to send the email

	// Include the Mail package
	set_include_path("../../libs" . PATH_SEPARATOR . get_include_path());
	require "Mail.php";

	// Identify the sender, recipient, mail subject, and body
	$sender    = "your gmail account";
	$recipient = $sender;
	$subject   = $_POST["subject"];
	$body      = "Message from " . $_POST["email"] . "\n" . $_POST["message"];

	// Identify the mail server, username, password, and port
	$server   = "ssl://smtp.gmail.com";
	$username = $sender;
	$password = "your gmail password";

	// Set up the mail headers
	$headers = array(
			"From"    => $sender,
			"To"      => $recipient,
			"Subject" => $subject
	);

	// Configure the mailer mechanism
	$smtp = Mail::factory("smtp",
			array(
					"host"     => $server,
					"username" => $username,
					"password" => $password,
					"auth"     => true,
					"port"     => 465
			)
	);

	// Send the message
	$mail = $smtp->send($recipient, $headers, $body);

	if (PEAR::isError($mail)) {
		$sResults = $mail->getMessage();
	}
	else {
		$sResults = "thank-you for your inquiry";
	}
}



?>
<form class="form-horizontal" action="" method="post">
	<fieldset>
		<legend>Contact Me For a Workshop</legend>
		<div class="control-group">
			<label class="control-label" for="input01">Your Email</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="email">
				<p class="help-block">Please enter an email that we can respond to
					you at.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input02">Subject</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input02" name="subject" />
				<p class="help-block">Please enter a short description of your
					inquiry.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="textarea">Message</label>
			<div class="controls">
				<textarea class="input-xlarge" id="textarea" rows="10"
					name="message"></textarea>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button class="btn">Cancel</button>
		</div>
		<div class="alert alert-info id="results">
			<?php echo $sResults ?>
		</div>
	</fieldset>
</form>
<!-- See more at: http://www.w3resource.com/twitter-bootstrap/forms-tutorial.php#sthash.H1VjCbN9.dpuf -->
