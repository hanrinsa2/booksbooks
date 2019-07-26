<?php

$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];

$statement= mysqli_prepare($con,"SELECT * FROM Member WHERE Member_nickname=?");
mysqli_stmt_bind_param($statement,"s",$Member_nickname);
mysqli_stmt_execute($statement);
//mysqli_store_result($statement);
//mysqli_stmt_bind_result($statement, $Member_nickname);

$response=array();
$response["success"]=true;

while (mysqli_stmt_fetch($statement)) {
  $response["success"]=false;
  $response["Member_nickname"]=$Member_nickname;
}

echo json_encode($response);





?>
