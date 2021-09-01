<?php
include "connection.php";
include"navbar.php";
?>

<html>
<head>
	<title>Request of book</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body
    {
      background-color: #dac1a0;
    }
        .srch{
          padding-left:1000px;

        }
        body {
  font-family: "Lato", sans-serif;
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
  </style>
</head>
<body>
	  <!--------sidebar------------------>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <div style="color:white;margin-left:50px;font-size:20px">
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
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
<br><br><br><br>
	
   
<?php
    if(isset($_SESSION['login_user']))
    {
      $q=mysqli_query($db,"SELECT * FROM `issue_book` WHERE username='$_SESSION[login_user]' and approve='' ; ");

      if(mysqli_num_rows($q)==0)
      {
        echo "There is no pending request";
      }
      else
      {
         echo "<table class='table table-bordered table-hover'>";
    echo"<tr style='background-color:#6db6b9e6;text-align:center'>";
       echo"<th style='text-align:center;'>"; echo "Book_ID"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Approve_Status"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Issue_Date"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Return_Date"; echo"</th>";
       
    echo "</tr>";
    while($row=mysqli_fetch_assoc($q))
    {
      echo"<tr style='text-align:center;'>";
           echo"<td>"; echo $row['bid']; echo"</td>";
           echo"<td>"; echo $row['approve']; echo"</td>";
           echo"<td>"; echo $row['issue_date']; echo"</td>";
           echo"<td>"; echo $row['return_date']; echo"</td>";
           
      echo "</tr>";
    }
    echo "</table>";
      }
    }
    else
    {
    	echo "<br><br><br>";
    	echo "<h1 style='margin:auto 250px'><b>";
    	echo "Please login first to see book request information";
    	echo"</h1>";
    }
    ?>

</body>
</html>