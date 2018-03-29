<?php
session_start();
?>

<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
th {
    border: 1px solid black;
	background-color: #80CCFF;
	
}
table, td {
    border: 1px solid black;
	
}

table {
    border-collapse: collapse;
    width: 80%;
}

th {
    height: 50px;
}
</style>
<body>
<img class="back" src="image/about_us.jpg" style="width:100%;height:100%;">
<h1 class="top"><center>THE NORTHCAP UNIVERSITY</center></h1>
<div class="fullbox">
<h2 class="inside">LEAVE RECORDS</h2>
<table style=' margin:20px 0 0 80px'>
<tr align="center"><th width="80px"><b>EID</b></th>
<th><b>DATE</b></th>
<th><b>TYPE OF LEAVE</b></th>
<th><b>NO. OF DAYS</b></th></tr>
<form method="post" action="" >
<?php
$con=mysqli_connect("localhost","root","","project");
$eid=$_SESSION['eid'];
$sql="SELECT * FROM leaves where eid=$eid";
$data=mysqli_query($con,$sql);
$i=0;
while(mysqli_num_rows($data)>$i)
{
	$r=mysqli_fetch_array($data);
	if($r[5]==1)
	{	
		echo"<tr align='center'><td><b>$r[1]</b></td>";
		echo"<td><b>$r[2]</b></td>";
		echo"<td><b>$r[3]</b></td>";
		echo"<td><b>$r[4]</b></td></tr>";
	}
	$i++;
}
?>
</div>
</body>
</html>