<?php
session_start();
?>
<?php
if(isset($_POST['submit']))
{$leave = $_POST["leave"];
$days = $_POST['days'];
$startdate=$_POST['date'];
$eid=$_SESSION['eid'];
//$startdate = strtotime($startdate);
//$startdate= date("d-m-y", $startdate);
//$startdate=strtotime($dates);
//$startdate= date("y-m-d", $sdate);
//$s=date("y-m-d", $startdate);
$s='20';
$enddate = strtotime("31 December");
$a=strtotime("1 January, 2017");
$a= $s.date("y-m-d", $a);
$b=strtotime("30 June, 2017");
$b= $s.date("y-m-d", $b);
$c=strtotime("1 July");
$c= $s.date("y-m-d", $c);
$d=strtotime("31 December");
$d= $s.date("y-m-d", $d);
$e=strtotime("24 July");
$e= $s.date("y-m-d", $e);
$f=strtotime("20 December");
$f= $s.date("y-m-d", $f);
$g=strtotime("4 January");
$g= $s.date("y-m-d", $g);
$h=strtotime("20 May");
$h= $s.date("y-m-d", $h);

$con=mysqli_connect("localhost","root","","project");
$sql="SELECT * FROM records WHERE eid=$eid";
$data=mysqli_query($con,$sql);
 if(mysqli_num_rows($data)>0)
{
	$r=mysqli_fetch_array($data);
	if($leave=="EL")
	{	
		$lel=$r[5]-$days;
		if($lel<0)
		{	echo"invalid request";
	        
		}
	    else
		{ // echo $startdate;
	    mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
	
		}
	}
	if($leave=="CL")
	{	
		if ($startdate>=$a && $startdate<=$b)
		{	
			$lcl=$r[6]-$days;
			if($lcl<0)
			{	echo"invalid request";
			}
			else
			{	 //echo $startdate;
				 //echo $eid;
				 //echo $leave;
				 //echo $days;
				mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
			}
		}
		
		else if($startdate >=$c && $startdate<=$d)
				{$lcl=$r[7]-$days;
				if($lcl<0)
				{	echo"invalid request";
				}
			     else
				{	echo $startdate;
					mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
					
				}
				}
	}					
		
	if($leave=="SCL")
	{	
		if ($e<=$startdate && $startdate<=$f)
			{	$lscl=$r[8]-$days;
				if($lscl<0)
				{	echo"invalid request";
				
				}
				else
				{	
					mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
					
				}
			}
		else if($g<=$startdate && $startdate<=$h) 
		{
			$lscl=$r[9]-$days;
	
				if($lscl<0)
				{	echo"invalid request";
				
				}
				else
				{	
					mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
					
				}
		}		
			
	}
	if($leave=="LWP")
	{	
			mysqli_query($con,"INSERT INTO leaves (eid,startdate,type,days,granted) VALUES ($eid,'$startdate','$leave',$days,0)");
	}
}
}	
?>
<?php
if(isset($_POST['submit1']))
{header('location:employee.php');
}
?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
</style>
<body>
<img class="back" src="image/about_us.jpg" style="width:100%;height:100%;">
<h1 class="top"><center>THE NORTHCAP UNIVERSITY</center></h1>
<div class="fullbox">
<h2 class="inside">LEAVE RECORDS</h2>
<form method="post" action="" >
<table width="70%" border="0" align="center">
<tr align="center">
<td>
ENTER DATE</td><td><input type="date" name="date"></td>
</tr>
<tr align="center">
<td>SELECT LEAVE</td>
<td>
<select name="leave">
<option>-----select-----</option>
<option>EL</option>
<option>CL</option>
<option>SCL</option>
<option>LWP</option>
</select>
</td>
</tr>
<tr>
<br>
</tr>
<tr align="center">
<td>
ENTER DAYS</td><td><input type="text" name="days"></td></tr>
<tr align="center">
<td>
<input type="submit" name="submit" value="SUBMIT"></td><td>
<input type="submit" name="submit1" value="SHOW LEAVES"></td>
</tr>
</table>
</div>
</body>
</html>