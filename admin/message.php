<?php
include "connection.php";
include "navbar.php";
?>

<html>
<head>
	<title>Admin message box</title>
</head>
<style type="text/css">
		.left_box
		{
			height:670px;
			width:350px;
			float:left;
			background-color:#8ecdd2;
			margin-top:-20px;
		}
		.left_box2
		{
			height:670px;
			width:250px;
			background-color:#537890;
			float:right;
			border-radius: 20px;
			margin-right:30px;
		}
		.left_box input
{
	width:150px;
	height: 50px;
    background-color:#537890;
    padding:10px;
    margin:10px;
    border-radius:10px;
}
		.list
		{
			height:670px;
			width:280px;
			background-color:#537890;
			float:right;
			color:white;
			padding:10px;
			border-radius: 20px;
			overflow-y:scroll;
			overflow-x:hidden;


		}
		.right_box
		{
             height:670px;
			width:1000px;
			float:left;
			background-color: #8ecdd2;
			margin-left:350px;
			margin-top:-670px;
			padding:10px;
		}
		.right_box2
		{
             height:670px;
			width:900px;
			float:left;
			background-color:#537890;
			border-radius: 20px;
			margin-top:-10px;
			color:white;
			padding:20px;
		}
		tr:hover
		{
			background-color: #1e3f54;
			cursor:pointer;
		}
		.form-control
		{
			height:47px;
			width:78%;
		}
		.msg{
			height:450px;
		     background-color: black;
			overflow: scroll;
		}
		.btn-info
		{
			background-color: #02c5b6;
		}
		.chat
		{ 
			display:flex;
			flex-flow:row wrap;
			padding-left: 120px;

		 }
		 .chat1
		{ 
			display:flex;
			flex-flow:row wrap;
			padding-left: 250px;

		 }
		 .user .chatbox
		 {
		 	height:50px;
		 	width:500px;
		 	padding:13px 10px;
		 	background-color:#821b69;
		 	color:white;
		 	border-radius:10px;
		 	padding-left:20px;
		 	
		 }
		 .admin .chatbox
		 {
		 	height:50px;
		 	width:500px;
		 	padding:13px 10px;
		 	color:white;
		 	background-color: #423471;
		 	border-radius:10px;
		 	order:-1;
		 	
		 }
	</style>
<body style="width: 1348px; height: 595px;">
<?php
  $sql1=mysqli_query($db,"SELECT user_reg.pic,message.username FROM user_reg INNER JOIN message ON user_reg.username=message.username group by username ORDER BY status ;");
?>
<!-----------------------Left box-------------------->
<div class="left_box">
  <div class="left_box2">
    
    <div class="list">
    	 <div style="color:black;">
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="uname">
        <button type="submit" name="submit" class="btn btn-default">SHOW</button>
      </form>
  </div>
      <?php
        echo "<table id='table' class='table' >";
        while ($res1=mysqli_fetch_assoc($sql1)) 
        {
          echo "<tr>";
            echo "<td width=65>"; echo "<img class='img-circle profile_img' height=60 width=60 src='images/".$res1['pic']."'>";  echo "</td>";

            echo "<td style='padding-top:30px;color:black'>"; echo $res1['username']; echo "</td>";

          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</div>
<!-----------------------Right box-------------------->
<div class="right_box">
  <div class="right_box2">
    <?php
    /*--------------if submit is pressed-----------*/
      if(isset($_POST['submit']))
      {
        $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]' ;");
        mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]' ;");

        if($_POST['username'] != ''){$_SESSION['username']=$_POST['username'];}

      ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;color:black;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
  <!---------show message----------->
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg">
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat1 admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
     
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
       
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left;color:black;background-color: yellow;"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>
      <?php
      }
     /*--------------if submit is not pressed-----------*/
     else
     {
      if($_SESSION['username']=='')
      {
        ?>
          <img style="margin: 100px 80px; border-radius: 50%;" src="images/tenor.gif" alt="animated">
        <?php
      }
      else
      {
        if(isset($_POST['submit1']))
        {
          mysqli_query($db,"INSERT into `library`.`message` VALUES ('', '$_SESSION[username]','$_POST[message]','no','admin');");

          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        else
        {
          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        ?>
        <div style="height: 70px; width: 100%; text-align: center; color:black; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg">&nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>

        <?php

      }
     }
    ?>
  </div>
</div>

<script>
  var table = document.getElementById('table'),eIndex;
  for(var i=0; i< table.rows.length; i++)
  {
    table.rows[i].onclick =function()
    {
      rIndex = this.rowIndex;
      document.getElementById("uname").value = this.cells[1].innerHTML;
    }
  }
</script>
</body>
</html>