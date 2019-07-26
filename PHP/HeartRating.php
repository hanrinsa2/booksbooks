<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname_R"];
$Board_no=$_POST["Board_no_R"];

$statement= mysqli_prepare($con,"SELECT * FROM Recommend_BoardStory WHERE Member_nickname_R=? AND Board_no_R=? AND board_recommend=1 ");
mysqli_stmt_bind_param($statement,"ss",$Member_nickname,$Board_no);
mysqli_stmt_execute($statement);



$response=array();
$response["exist"]=false;

while(mysqli_stmt_fetch($statement)){
  $response["exist"]=true;
  $response["Member_nickname"]=$Member_nickname;
}

echo json_encode($response);


















?>
