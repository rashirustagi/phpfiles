<?php
$nameErr = $emailErr = $genderErr = $aidErr =$passErr= "";
$name = $email = $gender = $pass = $aid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "enter Name";
  } else {
    $name = $_POST["name"];
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "enter Email";
  } else {
    $email = $_POST["email"];
  }
    
  if (empty($_POST["aid"])) {
    $aidErr	= "enter aid";
  } else {
    $aid = $_POST["aid"];
  }

  if (empty($_POST["gen"])) {
    $genderErr = "enter Gender";
  } else {
    $gender = $_POST["gen"];
  }
  if (empty($_POST["pass"])) {
    $passErr = "enter password";
  } else {
    $pass= $_POST["pass"];
  }
}
$con= mysqli_connect("localhost","root","","project");
if(!$con)
{ echo "connection failed".mysqli_connect_error();
}
mysqli_query($con, "INSERT INTO admin VALUES($aid,'$name','$pass','$gender','$email')"); 
?>
<?php
if(isset($_POST['submit']))
	header('location:grant_leaves.php');
?>
<html>
<title></title>
<style>
.error {color: #FF0000;}
</style>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<img class="back" src="image/about_us.jpg" style="width:100%;height:100%;">
<h1 class="top"><center>THE NORTHCAP UNIVERSITY</center></h1>
<div class="main_box">
<img class="ncu" src="image/ncu.jpg" height="250" width="400" >
<div class="box">
<h2 class="inside">LEAVE RECORDS</h2>
<ul>
<li><a href="cover.php">EMPLOYEE</a><li>
<li><a href="adlogin.php">ADMIN</a></li>
</ul>
</div>
</div>
<div style="background-color:#f2f2f2" class="sidebox">
<h2 class="inside" style=" margin:0 0 10px 0"> ADMIN REGISTER </h1>
<form method="post" action="" >
<input type="text" name="aid" placeholder="enter id">
<span class="error">*<?php echo $aidErr;?></span>
<input type="text" name="name" placeholder="enter full name">
<span class="error">* <?php echo $nameErr;?></span>
<input type="password" name="pass" placeholder="enter password">
<span class="error">* <?php echo $passErr;?></span>
<label>GENDER </label><input type="radio" name="gen" value="male"> male
<input type="radio" name="gen" value="female">female
<span class="error">* <?php echo $genderErr;?></span>
<input type="email" name="email" placeholder="enter email">
<span class="error">* <?php echo $emailErr;?></span>
<center><input type="submit" value=" SUMBIT" name="submit"></center>
</div>
</body>
</html>


