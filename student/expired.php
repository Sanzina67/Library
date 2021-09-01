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
  height:700px;
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
    <div style="float:left;padding:25px">
      <form method="post" action=" ">
      <button  name="submit1" type="submit" class="btn btn-default" style="background-color:#06861a;color:yellow">RETURNED</button>&nbsp&nbsp
  <button name="submit2" type="submit" class="btn btn-default" style="background-color:red;color:yellow">EXPIRED</button>
</form>
    </div>
 
  <?php
  if(isset($_SESSION['login_user']))
  {
        ?>
        <div style="color:yellow;padding-top:20px;float:right">
        <?php
      $var=0;
         $result=mysqli_query($db,"SELECT * FROM `fine` where username='$_SESSION[login_user]' and status='not paid';");
         while($r=mysqli_fetch_assoc($result))
         {

          $var=$var+$r['fine'];
         }
         $var2=$var+$_SESSION['fine'];
         ?>


    
      <h2>Your fine is:
        <?php
        echo $var2." tk";
        ?>
      </h2>
    </div>

<br><br><br>
  <h2 style="text-align:center">Expired / Returned Book List</h2><br><br>
  <?php
       $ret='<p style="color:yellow;background-color:green;">RETURNED</p>';
       $exp='<p style="color:yellow;background-color:red;">EXPIRED</p>';
        if(isset($_POST['submit1']))
      {
     $sql="SELECT user_reg.username,user_id,books.bid,name,authors,status,edition,approve,issue_date,return_date from user_reg inner join issue_book ON user_reg.username=issue_book.username inner join books ON books.bid=issue_book.bid WHERE issue_book.approve ='$ret' and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return_date` DESC ";
     $res=mysqli_query($db,$sql);
       }
      else if(isset($_POST['submit2']))
    {
     $sql="SELECT user_reg.username,user_id,books.bid,name,authors,status,edition,approve,issue_date,return_date from user_reg inner join issue_book ON user_reg.username=issue_book.username inner join books ON books.bid=issue_book.bid WHERE issue_book.approve ='$exp' and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return_date` DESC  ";
     $res=mysqli_query($db,$sql);
   }
    else
    {
     $sql="SELECT user_reg.username,user_id,books.bid,name,authors,status,edition,approve,issue_date,return_date from user_reg inner join issue_book ON user_reg.username=issue_book.username inner join books ON books.bid=issue_book.bid WHERE issue_book.approve !='' and issue_book.approve !='YES'and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return_date` DESC  ";
     $res=mysqli_query($db,$sql);
   }

     echo "<table class='table table-bordered ' style='width:100%;'>";
    echo"<tr style='background-color:#6db6b9e6;text-align:center'>";
       echo"<th style='text-align:center;'>"; echo "Username"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "User_ID"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "BOOK_ID"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Book_Name"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Author_Name"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Edition"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Status"; echo"</th>";
       echo"<th style='text-align:center;'>"; echo "Issue_date"; echo"</th>";
        echo"<th style='text-align:center;'>"; echo "Return_date"; echo"</th>";
       
    echo "</tr>";
    echo"</table>";
     echo "<div class='scroll'>";
      echo "<table class='table table-bordered '>";
    while($row=mysqli_fetch_assoc($res))
    {
      echo"<tr style='text-align:center;color:white'>";
           echo"<td>"; echo $row['username']; echo"</td>";
           echo"<td>"; echo $row['user_id']; echo"</td>";
            echo"<td>"; echo $row['bid']; echo"</td>";
           echo"<td>"; echo $row['name']; echo"</td>";
           echo"<td>"; echo $row['authors']; echo"</td>";
            echo"<td>"; echo $row['edition']; echo"</td>";
              echo"<td>"; echo $row['approve']; echo"</td>";
             echo"<td>"; echo $row['issue_date']; echo"</td>";
               echo"<td>"; echo $row['return_date']; echo"</td>";
           
      echo "</tr>";
    }
    echo "</table>";
}
else
{
  ?>
  <h2 style="text-align:center;color:yellow;padding:150px;">You need to log in first</h2><br><br>
  <?php
}
?>
  </div>
  </div>
</body>
</html> 