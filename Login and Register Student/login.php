<?php
    $email=$_POST['email'];
    $password=$_POST['password'];

    //database connection
    $conn = new mysqli("localhost", "root", "","assign9q1");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $stmt=$conn->prepare("select * from student where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data=$stmt_result->fetch_assoc();
            if($data['password']==$password){
                echo "<h2>Login Successfully</h2>";
                
            }
            else{
                echo "<h2>Invalid Email or password</h2>";
            }
        }
        else{
            echo "<h2>Invalid Email or password</h2>";
        }
    }
?>