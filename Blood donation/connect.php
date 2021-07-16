
<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db=mysqli_select_db($connection,'assign10q3');
    if($connection->connect_error)
    {
		echo "$connection->connect_error";
		die("Connection Failed : ". $connection->connect_error);
    }
    else
    {
      
        if(isset($_POST["submit"]))
        {
            echo "<table width = '500' align = 'center'>";
            echo "<tr><b>";
		        echo "<th>BloodCamp</th>";
		        echo "<th>NAME</th>";
		        echo "<th>Blood_Type</th>";
		        echo "<th>ADDRESS</th>";
		        echo "<th>CTIY</th>";
	          echo "</b></tr>";

            echo "<br/>";
          if(!empty($_POST["city"]))
          {
            foreach($_POST["city"] as $city)
            {
              echo "<p>".$city."</p>";
              $sql="select donar.donationCamp as CAMP,donar.name as NAME,donar.bloodtype as BLOOD,donar.address as ADDRESS, blooddonationcamp.cities as CITIES  from blooddonationcamp,donar where blooddonationcamp.donationCamp=donar.donationCamp and blooddonationcamp.cities='$city'  ";
              $result=$connection->query($sql);

              while($row = $result->fetch_assoc())
              {
                echo "<tr>";
                echo "<td>". $row["CAMP"]."</td>";
                echo "<td>". $row["NAME"]."</td>";
                echo "<td>". $row["BLOOD"]."</td>";
                echo "<td>". $row["ADDRESS"]."</td>";
                echo "<td>". $row["CITIES"]."</td>";

		            echo "</tr>";
              }
            }
          }
          else
          {
            echo "Please select the city/cities";
          }
        }
  } 

?>


<!--  -->
<!--  -->