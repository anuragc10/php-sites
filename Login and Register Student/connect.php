<?php
    $name=$_POST['name'];
    $enroll=$_POST['enroll'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];

    //database connection
    $conn = new mysqli("localhost", "root", "","assign9q1");

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into student(name, enrollno, address, email, gender, password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissss", $name, $enroll, $address, $email, $gender, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
    header('Location:http://localhost/project1/login.html');
		$stmt->close();
		$conn->close();
    }


?>
