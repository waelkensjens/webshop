<?php
include("includes/header.php");
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'C:\wamp64\www\Webshop\vendor/autoload.php';




$code = uniqid(true);

$reset= new Resetpassword();
if(isset($_POST['submit'])) {
    if ($reset) {
        $reset->user_mail = $_POST['user_mail'];
        $reset->code = $code;
        $reset->save();
    }


    $emailto = trim($_POST['user_mail']);
    Resetpassword::verify_mail($emailto);
    if ($emailto){




    $mail = Resetpassword::verify_mail($emailto);

    if ($mail) {
// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'gamerzpluswebshop@gmail.com';                     // SMTP username
            $mail->Password = 'aC0C6573o3HJ';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('gamerzpluswebshop@gmail.com', 'GamerzPlus');
            $mail->addAddress($emailto, 'Joe User');     // Add a recipient

            $mail->addReplyTo('gamerzpluswebshop@gmail.com', 'Information');


            // Attachments
            /*   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
               $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

            // Content
            $link = "http://localhost/webshop/admin/resetpassword.php?code=$code";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Your password reset link';
            $mail->Body = "<h1>You're receiving this email because you requested a password reset for your Account.</h1>
                            <p>If you did not request this change, you can safely ignore this email.\r\nTo choose a new password and complete your request, please follow the link below:</p>
                            <a href='$link'>link</a>
                            <p><b>NOTE:</b> U can only use this link once to update ur password</p>";
            /*  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}
}
  ?>

<!--include("includes/header.php");

$the_message = '';

if(isset($_POST['submit'])) {
    $user_mail = trim($_POST['user_mail']);




$mail_found = User::reset_pass($user_mail);

if ($mail_found){

    $to      =  trim($_POST['user_mail']);
    $subject = 'Reset Password';
// The message
    $message = " If you did not request this change, you can safely ignore this email.\r\nTo choose a new password and complete your request, please follow the link below:\r\nLink \r\n If it is not clickable, please copy and paste the URL into your browser's address bar.";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");
    $headers =  'From: waelkens.jens@gmail.com' . "\r\n" .
                'Reply-To: waelkens.jens@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
// Send
    mail($to, $subject, $message, $headers);
}

}-->


		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center"> Reset Password </h3>
				</div>

				<div class="panel-body">
					<form method="post" action="#" role="form" class="text-center">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>
						<div class="form-group m-b-0">
							<div class="input-group">
								<input name="user_mail" type="email" class="form-control" placeholder="Enter Email" required="">
								<span class="input-group-btn">
									<button type="submit" name="submit" class="btn btn-pink w-sm waves-effect waves-light" >
                                        Reset
									</button> 
								</span>
							</div>
						</div>

					</form>
				</div>
			</div>
			

		</div>
<?php
include("includes/footer.php");



?>