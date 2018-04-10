<div class="container text-center">
<div class="h2Content">
	Enter your email address
	<?php
	$supersecret = rand(); ?>
	<form method="post" action="forgotpassword">
		<input type="text" name="emailaddress" />
		<br />
		<input type="hidden" name="supersecret" value = "<?php echo $supersecret?>"/>
		
		<input type="submit" value="Submit"/>
	</form>
	<form method="post" action="resetpassword">
		<input type="hidden" name="supersecret" value = $supersecret/>
	</form>
	
	<?php
	if (isset($_POST['emailaddress'])) {
            $emailaddress = $_POST['emailaddress'];
            $msg = "Use this code to reset your password:\n". $supersecret ."\nClick this link to reset your password:\nhttps://www.cs.colostate.edu/~whiteaj/ct310/index.php/florida/resetpassword/". $supersecret;
            mail($emailaddress, "CT310 Project 2 Website Password Reset", $msg);
        header('Location: recieveemail.php');
        } 
	
	?>
</div>
</div>
