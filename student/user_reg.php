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
  <script src="sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<style type="text/css">
 
  .login_img{
  height: 800px;
  width:1361px;
  margin-top:0px;
  margin:-60px auto;
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
   
 
  <!--
  <div class="dropdown">
       <nav>
        <div class="logo">
        <img  src="logo.png">
        <h4 style="color:white;">Online Libaray Management System</h4>
       </div>

        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Login</a>
            <ul>
            <li><a href="admin_login.php">Admin login</a></li>
            <li><a href="user_login.php">User login</a></li>
            </ul>
          </li>
          <li><a href="#">Registration</a>
            <ul>
              <li><a href="admin_reg.php">Admin registration</a></li>
              <li><a href="user_reg.php">User registration</a></li>
            </ul>
          </li>
            <li><a href="books.php">Books</a></li>
          <li><a href="#">Feedback</a></li>

        </ul>
       </nav>
     -->
       <header>
              <section>
                     <div class="login_img">
                     <br>
                            <div class="box2">
                                   <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
                                   <h1 style="text-align: center;font-size: 25px">User Registration Form</h1><br>
                                   <form  action="" method="post">
                                      <div class="login">
                                          <input style="margin:auto 25px;color:black;"type="text" name="first_name" placeholder="First Name" required=""><br><br>
                                           <input style="margin:auto 25px;color:black;"type="text" name="last_name" placeholder="Last name" required=""><br><br>
                                           <input style="margin:auto 25px;color:black;"type="text" name="username" placeholder="Username" required=""><br><br>
                                    
                                          <input style="margin:auto 25px;color:black;"type="text" name="user_id" placeholder="User_id" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="text" name="Email" placeholder="Email" required=""><br><br>
                                          <input style="margin:auto 25px;color:black;"type="Password" name="Password" placeholder="Password" required=""><br><br>
                                          <input style="margin:auto 110px;color:green; height:25px;width:100px;" type="submit" name="submit"value="Submit">
                                      </div> 
                                   </form>
                                   <p style="color: white; padding-left: 90px;">
          
                                         Already have an account?<a style="color:white;" href="user_login.php">Login</a>
                                   </p>
                            </div>
                     </div>
              </section>
      
       <?php

        if(isset($_POST['submit']))
        {
              $count=0;
              $sql="SELECT username from user_reg";
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
              mysqli_query($db,"INSERT INTO `user_reg` VALUES('$_POST[first_name]', '$_POST[last_name]', '$_POST[username]', '$_POST[user_id]', '$_POST[Email]', '$_POST[Password]','p.jpg');");


        ?>
          <script type="text/javascript" >
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
</header>
</body>
</html>