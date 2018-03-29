<?php
session_start();
?>
<?php
if(isset($_POST['submit']))
{
$id=$_POST['eid'];
$pass=$_POST['pass'];
$_SESSION["eid"] = $id;
//$_SESSION["epassword"] = $pass;
$con=mysqli_connect("localhost","root","","project");
$sql="SELECT * FROM records where eid=$id and password='$pass'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	header('location:takeleaves.php');
}
else
{echo "wrong username or password";
}

}

?>

<html>
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
<h2 class="inside" style=" margin:0 0 10px 0"> EMPLOYEE LOGIN </h1>
<form method="post" action="" >
<input type="text" name="eid" placeholder="enter id">
<input type="password" name="pass" placeholder="enter password">
<input type="submit" value=" SUMBIT" name="submit">
<a href="eregister.php"><input type="button"  value="REGISTER"></a>
</div>
</body>
</html>

