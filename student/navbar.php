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

  $r=mysqli_query($db,"SELECT COUNT(status) as total FROM message where status='no' and username='$_SESSION[login_user]' and sender='admin';");
  $c=mysqli_fetch_assoc($r);

                    ?>
                    <ul class="nav navbar-nav">
                      <li><a href="student_profile.php">PROFILE</a></li>
                         <li><a href="fine.php">FINE</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span><span class="badge bg-green"><?php echo $c['total']?> </span></a></li>
                        <li><a href="profile.php">
                         <div style="color:white;margin:-5px">
                      <?php
                      echo "<img class='img-circle profile_img' height=30 width=30 padding=5px src='images/".$_SESSION['pic']." '>";
                      echo " ".$_SESSION['login_user'];
                      ?>
                    </div >
                  </a></li>
                    <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    <?php
                  }
                  else
                    { ?>
              
              <ul class="nav navbar-nav navbar-right">
       		<li><a href="user_login.php"><span class="glyphicon glyphicon-log-in">  LOGIN</span></a></li>
       		
                     <li><a href="user_reg.php"><span class="glyphicon glyphicon-user">  SIGN UP</span></a></li>
              </ul>
              <?php
            }
            ?>
       </div>
       </nav>
       <?php
       if(isset($_SESSION['login_user']))
       {
       
        $day=0;
         $exp='<p style="color:yellow;background-color:red;">EXPIRED</p>';
        $x= mysqli_query($db,"SELECT return_date from issue_book where username='$_SESSION[login_user]' and approve='$exp';");
        while($row=mysqli_fetch_assoc($x))
        {
                $d=strtotime($row['return_date']);
                $c=strtotime(date ("Y-m-d"));
               $diff=$c-$d;
               if($diff>=0)
                {
                  $day=$day+floor($diff/(60*60*24)); 
                  
                }
        }
        $_SESSION['fine']=$day*5;
       }
        ?>

</body>
</html>