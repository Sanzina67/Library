<?php
include "connection.php";
include"navbar.php";
?>

<html>
<head>
	<title>Request of book</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">

        .srch{
          padding-left:850px;

        }
        .form-control
        {
          width:300px;
          height:40px;
          background-color: black;
        }
        body {
          background-color: #dac1a0; 

  font-family: "Lato", sans-serif;
  transition: background-color .5s;

}

.sidenav {
  height: 100%;
  width: 0;
  margin-top:50px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
  margin-left:30px;
}

.h:hover{
      color:white;
      height: 50px;
      width:300px;
      background-color:  #218648;
}
.container
{
  height:500px;
  width:700px;
  padding:10px;
  background-color:black;
  opacity: .8;
  color:white;
}
 .approve
{
  margin-left:200px;
  
}

  </style>

</head>
<body>
	  <!--------sidebar------------------>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <div style="color:black;margin-left:50px;font-size:20px">
                      <?php
                      if(isset($_SESSION['login_user']))
                     {
                      echo "<img class='img-circle profile-img' height=120 width=120 padding=5px src='images/".$_SESSION['pic']." '>";
                      echo"</br>";
                      echo "Welcome  ".$_SESSION['login_user'];
                     }
                      ?>
                    </div ><br><br>
<div class="h"> <a href="books.php"> Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue information</a>
    <div class="h"><a href="expired.php">Expired List</a></div>
</div>
</div>
<span style="font-size:30px;cursor:pointer;color:black" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<div class="container">
  
  <h3 style="text-align:center;">Approve Request</h3><br><br>
  <form class="approve" method="post" ation="">
    <input class="form-control"type="text" name="approve" placeholder="Approve or Not" required=""><br>
    <input class="form-control" type="text" name="issue_date" placeholder="Issue_Date YYYY-MM-DD" required=""><br>
    <input class="form-control" type="text" name="return_date" placeholder="Return_Date YYYY-MM-DD" required=""><br>
    <button  style="margin:auto 100px;color:black" class="btn btn-default" type="submit" name="submit">Approve</button>
    
  </form>
</div>
<?php
if(isset($_POST['submit']))
{
  mysqli_query($db,"UPDATE issue_book set approve='$_POST[approve]',issue_date='$_POST[issue_date]',return_date='$_POST[return_date]' WHERE username='$_SESSION[username]'and bid='$_SESSION[bid]';");

  mysqli_query($db,"UPDATE books set quantity=quantity-1 where bid='$_SESSION[bid]';");

  $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['quantity']==0)
    {
      mysqli_query($db,"UPDATE books set status='Not Available' where bid='$_SESSION[bid]';");
    }
  
  else{


  ?>
  <script type="text/javascript">
    alert("Updated Sucessfully");
    window.location="request.php";
  </script>
  <?php
}
}

}




?>
  
</body>
</html>