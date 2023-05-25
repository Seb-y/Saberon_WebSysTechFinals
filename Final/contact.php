<?php
	
	$name = $_POST['name'];
	$message = $_POST['message'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, message, email) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $message, $email);
		$execval = $stmt->execute();
        echo "Message Sent Successfully.";
		header ("Location: contact.html");
		$stmt->close();
		$conn->close();
	}
?>