
 <?php
    include "connection.php";
    include "navbar.php";
?>


<html>
<head>
	<title>Admin login</title>
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
.box2{
  height:550px;
  width:500px;
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
 
       <header>
              <section>
                     <div class="login_img">
                     <br>
                            <div class="box2">
                                   <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
                                   <h1 style="text-align: center;font-size: 25px">Admin Registration Form</h1><br>
                                   <form  action="" method="post">
                                      <div class="login">
                                          <input style="margin:auto 25px;color:black;"type="text" name="first_name" placeholder="First Name" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="text" name="last_name" placeholder="Last name" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="text" name="username" placeholder="Username" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="text" name="date_of_birth" placeholder="Date_Of_birth" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="text" name="Email" placeholder="Email" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="Password" name="Password" placeholder="Password" required=""><br><br>
                                          <input style="margin:auto 110px;color:red; height:25px;width:100px;" type="submit" name="submit"value="Submit">
                                      </div> 
                                   </form>
                                   <p style="color: white; padding-left: 90px;">
          
                                         Already have an account?<a style="color:yellow;" href="admin_login.php">Login</a>
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
              $sql="SELECT username from admin_reg";
              $res=mysqli_query($db,$sql);
              while($row=mysqli_fetch_assoc($res))
              {
                if($row['username']==$_POST['username'])
                {
                  $count=$count+1;
                }
              }


             if($count==0)
            {
              mysqli_query($db,"INSERT INTO `admin_reg` VALUES('$_POST[first_name]', '$_POST[last_name]', '$_POST[username]', '$_POST[date_of_birth]', '$_POST[Email]', '$_POST[Password]','p.jpg');");


        ?>
          <script type="text/javascript">
            alert("Registration successful");
          </script>
       <?php
     }
          else
          {
                ?>
        <script type="text/javascript">
          alert("the username already exist");
        </script>
       <?php
          }

          }


       ?>

</body>
</html>