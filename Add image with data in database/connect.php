<?php
    //database connection
    $connection = mysqli_connect("localhost", "root", "");
    $db=mysqli_select_db($connection,'assign10q1');

    if(isset($_POST['upload']))
        {
            $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $name=$_POST['name'];
            $price=$_POST['price'];
            $desc=$_POST['desc'];

            $query="INSERT INTO `cupcake`( `Name`,`Image`,`Price`,`Description`) VALUES ('$name','$file','$price','$desc') ";
            $query_run=mysqli_query($connection,$query);

            if($query_run)
            {
                echo '<script type="text/javascript">alert("Data uploaded")</script>';
            }
            else{
                echo '<script type="text/javascript">alert("Data Not uploaded")</script>';
            }
        }
?>