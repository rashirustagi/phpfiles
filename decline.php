<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","project");
$sql="UPDATE leaves SET granted=-1 WHERE id=$id";
//$sql= "DELETE FROM leaves WHERE id=$id";
mysqli_query($con,$sql);
?>