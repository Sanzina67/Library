 <?php
    include "connection.php";
          include "navbar.php";
      
?>

<html>
<head>
	<title>Front page of my system</title>
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
 
  .login_img{
  height: 700px;
  width:1361px;
  margin-top:0px;
  margin:-20px auto;
  background-image: url(images/login.jpg);
}
.box1{
  height:450px;
  width:450px;
  margin:70px auto;
  background-color: #17202a;
  color:white;
  opacity: .7;
  padding:20px;
}
form .login{
  margin:auto 50px;
}
input{
  height: 25px;
  width:300px;
  
}
</style>
  </head>
<body>
 <div class="dropdown">
      <header>
              <section>
                     <div class="login_img">
                     <br>
                            <div class="box1">
                                   <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
                                   <h1 style="text-align: center;font-size: 25px">User Login Form</h1><br>
                                   <form  action="" method="post">
                                          <br>
                                      <div class="login">
                                          <input style="color:black;" type="text" name="Username" placeholder="Username" required=""><br><br>
                                          <input style="color:black;" type="Password" name="Password" placeholder="Password" required=""><br><br>
                                          <input style="margin:auto 90px; height:25px;width:100px;color:green" type="submit" name="submit"value="Login">
                                      </div> 
                                   </form>
                                   <p style="color: white; padding-left: 20px;">
                                          <br><br>
                                          <a style="color:yellow;" href="student_update_password.php">Forgot Password?</a> &nbsp &nbsp &nbsp
                                          New to this website?<a style="color:yellow;" href="user_reg.php">sign Up</a>
                                   </p>
                            </div>
                     </div>
              
      
</section>
</header>
</div>
<?php
 
  if(isset($_POST['submit']))
  {
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `user_reg` WHERE username='$_POST[Username]' && Password='$_POST[Password]';");
       $row=mysqli_fetch_assoc($res);
    $count=mysqli_num_rows($res);


    if($count==0)
    {
      ?>
      <script type="text/javascript">
        alert("The username & password doesn't match!");
      </script>
      <?php
    }
    else
    {
      $_SESSION['login_user']=$_POST['Username'];
       $_SESSION['pic']=$row['pic'];
      ?>
      <script type="text/javascript">
       window.location="index.php";
      </script>
      <?php
    }
  }

?>

</body>
</html>