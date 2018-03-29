<?php
$id=$_GET['id'];
//$con=mysqli_connect("localhost","root","","project");
//$sql="SELECT * FROM `leaves` WHERE `id`=".$id;
//$data=mysqli_query($con,$sql);
//$r=mysqli_fetch_array($data);
//print_r($r);
$con=mysqli_connect("localhost","root","","project");
$s='20';
$a=strtotime("1 January");
$a=$s.date("y-m-d", $a);
$b=strtotime("30 June");
$b=$s. date("y-m-d", $b);
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
echo $e;
echo $f;
$sql="SELECT * FROM leaves where id=$id";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	$r=mysqli_fetch_array($data);
	$eid=$r[1];
	$startdate=$r[2];
	$leave=$r[3];
	$days=$r[4];
}
echo $id;
echo $eid;
echo $leave;
echo $startdate;
$sql1="SELECT * FROM records WHERE eid=$eid";
$data1=mysqli_query($con,$sql1);
if(mysqli_num_rows($data1)>0)
{
	$r=mysqli_fetch_array($data1);
	if($leave=='EL')
	{	
		$total=$r[5]-$days;
		//echo $total;
		$sql2="UPDATE records SET el=$total WHERE eid=$eid";
		mysqli_query($con,$sql2);	
	}
	if($leave=='CL')
	{   
		if ($startdate>=$a && $startdate<=$b)
		{	$total=$r[6]-$days;
			$sql2="UPDATE records SET cl1=$total WHERE eid=$eid";
			mysqli_query($con,$sql2);	
		}
	
		else if(($startdate>=$c && $startdate<=$d))
			{	$total=$r[7]-$days;
				$sql2="UPDATE records SET cl2=$total WHERE eid=$eid";
				mysqli_query($con,$sql2);	
			}
	}
	if($leave=='SCL')
	{    echo"hello";
		if (($e<=$startdate) && ($f>=$startdate))
		{	echo 1;
			$total=$r[8]-$days;
			echo $total;
			$sql2="UPDATE records SET scl1=$total WHERE eid=$eid";
			mysqli_query($con,$sql2);	
		}
		else if($g<=$startdate && $startdate<=$h) 
			{	
				$total=$r[9]-$days;
				echo $total;
				$sql2="UPDATE records SET scl2=$total WHERE eid=$eid";
				mysqli_query($con,$sql2);	
			}
	}
	if($leave=='LWP')
	{
		$sql2="UPDATE records SET lwp=$days WHERE eid=$eid";
		mysqli_query($con,$sql2);	
	}
	//$sql3="UPDATE leaves SET granted=1 WHERE eid=$eid and date='$startdate'";
	$sql3="UPDATE leaves SET granted=1 WHERE id=$id";
	mysqli_query($con,$sql3);	
	
}
?>