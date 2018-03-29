

<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	function redirect(x)
	{	
		window.location="grant.php?id="+x;
	}
	function decline(x)
	{
		window.location="decline.php?id="+x;
	}
</script>	
<body>
<img class="back" src="image/about_us.jpg" style="width:100%;height:100%;">
<h1 class="top"><center>THE NORTHCAP UNIVERSITY</center></h1>
<div class="fullbox">
<h2 class="inside">LEAVE RECORDS</h2>
<table style=' margin:0 0 0 40px'>
<tr align="center"><td width="50px"><b>EID</b></td>
<td width="100px"><b>DATE</b></td>
<td width="100px" align="center"><b>LEAVE<br> TYPE</b></td>
<td><b>NO. OF<br>DAYS</b></td></tr>
<form method="post" id="frm" action="" >
<?php
$con=mysqli_connect("localhost","root","","project");
//echo"<table style=' margin:0 0 0 170px'>";
$sql="SELECT * FROM leaves";
$data=mysqli_query($con,$sql);
$i=0;
while(mysqli_num_rows($data)>$i)
{
	$r=mysqli_fetch_array($data);

	if($r[5]==0)
	{	
		echo"<tr align='center'><td><b>$r[1]</b></td>";
		echo"<td><b>$r[2]</b></td>";
		echo"<td align='center'><b>$r[3]</b></td>";
		echo"<td align='center'><b>$r[4]</b></td>";
		echo"<td><input type='button' value='GRANT' onclick='redirect(".$r[0].")' href=''></td>";
		echo"<td><input type='button'style='background-color:#DC143C;' value='DECLINE' onclick='decline(".$r[0].")' href=''></td></tr>";
		//onclick="grant(\''.$r[0].'\',\''.$r[1].'\')"
	}
	$i++;
}
?>
</div>
</body>
</html>
<?php
/*if(isset($_POST['somevar']))
{
    $id= $_POST['eid'];
	echo $id;
}*/
?>