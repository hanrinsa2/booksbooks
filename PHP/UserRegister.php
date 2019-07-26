<?php

$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");


$Member_nickname=$_POST["Member_nickname"];
$Member_password=$_POST["Member_password"];
$Member_name=$_POST["Member_name"];



$statement=mysqli_prepare($con,"INSERT INTO Member VALUES(?,?,?)");
mysqli_stmt_bind_param($statement,"sss",$Member_nickname,$Member_password,$Member_name);
mysqli_stmt_execute($statement);

$response=array();
$response["success"]=true;
echo json_encode($response);





?>
