<?php
session_start();
?>

<html>
<head>
	<title>Front page of my system</title>
	
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
      <style type="text/css">
       nav{
              height: 50px;
              padding: 1px;
              margin:0px;
              box-shadow: 0 10px 15px rgba(0,0,0,0.1);
       }
      </style>
</head>
<body>
   
       <nav class="navbar navbar-inverse">
       	<div class="container-fluid">
                     <div class="navbar-header">
                         <a class="navbar-brand active">Online Library Management System</a>
                    </div>

       	<ul class="nav navbar-nav">
       		<li><a href="index.php">HOME</a></li>
                     <li><a href="books.php">BOOKS</a></li>
                     <li><a href="feedback.php">FEEDBACK</a></li>
              </ul>
              <?php
                  if(isset($_SESSION['login_user']))
                  {
                    
                      ?>

                    <ul class="nav navbar-nav">
                      <li><a href="admin_profile.php">PROFILE</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                    <li><a href="student.php">STUDENT-INFORMATION</a></li>
                    <li><a href="fine.php">FINES</a></li>
                  </ul>
                 
                    <ul class="nav navbar-nav navbar-right">

                       <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span></a></li>
                      <li><a href="admin_profile.php">

                         <div style="color:white;margin:-5px">
                      <?php
                      echo "<img class='img-circle profile-img' height=30 width=30 padding=5px src='images/".$_SESSION['pic']." '>";
                      echo " ".$_SESSION['login_user'];
                      ?>
                    </div>
                  
                  </a></li>
                  
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    <?php

                  }
                  else
                    { ?>
              
              <ul class="nav navbar-nav navbar-right">
       		<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in">  LOGIN</span></a></li>
       		
                     <li><a href="admin_reg.php"><span class="glyphicon glyphicon-user">  SIGN UP</span></a></li>
              </ul>
              <?php
            }
            ?>


       	</div>
       </nav>
  

</body>
</html>