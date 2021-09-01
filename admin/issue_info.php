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
        .form-coontrol
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
  padding:10px;
  background-color:black;
  opacity: .8;
  color:white;
}
.scroll
{
	width:100%;
	height:500px;
	overflow:auto;
}
th,td
{
	width:10%;
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
  <div class="h"><a href="issue_info.php">Issue information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
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
<br><br>
<div class="container">
	<h2 style="text-align:center">Information Of Borrowed Book</h2><br><br>
	<?php
     $c=0;
	if(isset($_SESSION['login_user']))
	{
	   $sql="SELECT user_reg.username,user_id,books.bid,name,authors,edition,issue_date,return_date from user_reg inner join issue_book ON user_reg.username=issue_book.username inner join books ON books.bid=issue_book.bid WHERE issue_book.approve='YES' ORDER BY `issue_book`.`return_date` ASC  ";
	   $res=mysqli_query($db,$sql);

	   echo "<table class='table table-bordered ' style='width:100%;'>";
    echo"<tr style='background-color:#6db6b9e6;text-align:center'>";
       echo"<th style='text-align:center;'>"; echo "Username"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "User_ID"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "BOOK_ID"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Book_Name"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Author_Name"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Edition"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Issue_date"; echo"</th>";
        echo"<th style='text-align:center;'>"; echo "Return_date"; echo"</th>";
       
    echo "</tr>";
    echo"</table>";
     echo "<div class='scroll'>";
      echo "<table class='table table-bordered '>";
    while($row=mysqli_fetch_assoc($res))
    {
    	$d=date("Y-m-d");
    	if($d> $row['return_date'])
    	{
    		$c=$c+1;
    		 $var='<p style="color:yellow;background-color:red;">Expired</p>';
    		mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return_date` ='$row[return_date]' and  approve ='YES' limit $c;");
    		
    	}
      echo"<tr style='text-align:center;color:white'>";
           echo"<td>"; echo $row['username']; echo"</td>";
           echo"<td>"; echo $row['user_id']; echo"</td>";
            echo"<td>"; echo $row['bid']; echo"</td>";
           echo"<td>"; echo $row['name']; echo"</td>";
           echo"<td>"; echo $row['authors']; echo"</td>";
            echo"<td>"; echo $row['edition']; echo"</td>";
             echo"<td>"; echo $row['issue_date']; echo"</td>";
               echo"<td>"; echo $row['return_date']; echo"</td>";
           
      echo "</tr>";
    }
    echo "</table>";
}
else
{
	?>
	<h2 style="text-align:center;color:yellow">You need to log in first</h2><br><br>
	<?php
}
?>
	</div>
</body>
</html>