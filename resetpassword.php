<div class="container text-center">
<div class="h2Content">
	Enter the code you received from the email we sent you
	
	<form method="post" action="resetpassword.php">
		<input type="text" name="usersupersecret" />
		<input type="hidden" name = "supersecret" value = "<?php echo $supersecret?>"/>
		<br />
		<input type="submit" value="Submit"/>
	</form>
	<?php
	if (isset($_POST['usersupersecret'])) {
        $usersupersecret = $_POST['usersupersecret'];
        echo "supersecret: " . $supersecret . "<br>";
        echo "usersupersecret: " . $usersupersecret . "<br>";
        if ($usersupersecret === $supersecret){
            echo "it worked!";
        }
	}
	
	?>
</div>
</div>
