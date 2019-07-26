<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];
$Member_password=$_POST["Member_password"];

$statement= mysqli_prepare($con,"SELECT * FROM Member WHERE Member_nickname=? AND Member_password=? ");
mysqli_stmt_bind_param($statement,"ss",$Member_nickname,$Member_password);
mysqli_stmt_execute($statement);

//mysqli_store_result($statement);
//mysqli_stmt_bind_result($statement, $Member_nickname);

$response=array();
$response["success"]=false;
//while
while(mysqli_stmt_fetch($statement)){
  $response["success"]=true;
  $response["Member_nickname"]=$Member_nickname;
}

echo json_encode($response);


















?>
