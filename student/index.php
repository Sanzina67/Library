<?php
session_start();
?>

<html>
<head>
	<title>Front page of my system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<div class="dropdown">
       <nav>
       	<div class="logo">
       	<img  src="logo.png">
       	<h3 style="color:white;padding-left:50px;">Online Libaray Management System</h3>
       </div>
       <?php
       if( isset($_SESSION['login_user']))
       {
            ?>
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="logout.php">Log out</a></li>
                  <li><a href="user_reg.php">Sign Up</a>
                    
                  </li>
            <li><a href="books.php">Books</a></li>
                  <li><a href="feedback.php">Feedback</a></li>

            </ul>
            <?php
       }

          else
       {
            ?>

       	<ul>
       		<li><a href="index.php">Home</a></li>
       		<li><a href="user_login.php">Login</a>
       		  
       		</li>
       		<li><a href="user_reg.php">Sign Up</a>
       		  
       		</li>
            <li><a href="books.php">Books</a></li>
       		<li><a href="feedback.php">Feedback</a></li>

       	</ul>
            <?php
      }

       
      
       ?>
 </nav>
       <header>
       	<section>
       		<br><br><br><br>
       		<div class="box">
       			<br><br>
       		<h1 style="text-align: center; font-size:35px;">Welcome To The Libaray</h1><br>
       		<h1 style="text-align: center; font-size:25px;">Opens at: 09:00 AM</h1>
       		<h1 style="text-align: center; font-size:25px;">Close at: 8:00 PM</h1><br>

            </div>
       	</section>
       	
       </header>


	</div>
       <?php
          include "footer.php";
       ?>

</body>
</html>