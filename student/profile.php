<?php
include "connection.php";
include "navbar.php";
?>

<html>
<head>
	<title>student profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 400px;
			margin: 0px auto;
			color:white;
			
		}
	</style>
</head>
<body style="background-color:#05351a;">
	<div class="container">
		 <form action="" method="post">
		 	<button class="btn btn-default" style="float:right;width:70px" name="submit1">Edit</button>
		 </form>
	     <div class="wrapper">
         <?php
         $q=mysqli_query($db,"SELECT * FROM user_reg Where username='$_SESSION[login_user]';");
         ?>
         <h2 style="text-align: center">My Profile</h2>
         <?php 
         $row=mysqli_fetch_assoc($q);
         echo "<div style='text-align:center'>
         <img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']." '></div>";
         ?>
         <div style="text-align: center;"><b>Welcome</b>
         <h4>
         	<?php
         	echo $_SESSION['login_user'];
         	?>
         </h4>
     </div>
     <?php
     echo "<b>";
        echo "<table class='table table-bordered' style='color:white'>";
         echo "<tr>";
          echo "<td>";
            echo "<b>First Name: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['first_name'];
           echo"</td>";

           echo "</tr>";


           
         echo "<tr>";
          echo "<td>";
            echo "<b>Lirst Name: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['last_name'];
           echo"</td>";

           echo "</tr>";


           
         echo "<tr>";
          echo "<td>";
            echo "<b>Username: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['username'];
           echo"</td>";

           echo "</tr>";

           
         echo "<tr>";
          echo "<td>";
            echo "<b>User_id: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['user_id'];
           echo"</td>";

           echo "</tr>";

           
         echo "<tr>";
          echo "<td>";
            echo "<b>Email: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['Email'];
           echo"</td>";

           echo "</tr>";

           
         echo "<tr>";
          echo "<td>";
            echo "<b>Password: </b>";
          echo "</td>";
          echo "<td>";
            echo  $row['Password'];
           echo"</td>";

           echo "</tr>";


           echo "</table>";
           echo"</b>";

     ?>
	   </div>
			
	</div>

</body>
</html>