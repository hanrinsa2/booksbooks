<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];
$Story_no=$_POST["Story_no"];
$Board_detail_no=$_POST["Board_detail_no"];

$query="SELECT * FROM Recommend_BoardStory WHERE Member_nickname_R='$Member_nickname' AND Board_no_R='$Board_detail_no' AND board_recommend=1";
$result=mysqli_query($con,$query);

$response=array();
$response["success"]=false;
$counter=mysqli_num_rows($result);

if($counter==1)
{
  $response["success"]=false;
  $query="DELETE FROM Recommend_BoardStory WHERE Member_nickname_R='$Member_nickname' AND Board_no_R='$Board_detail_no' AND board_recommend=1";
  $result=mysqli_query($con,$query);
 
}
if($counter==0)
{
  $response["success"]=true;
  $query="INSERT INTO Recommend_BoardStory(Member_nickname_R,Board_no_R,board_recommend) VALUES('$Member_nickname','$Board_detail_no',1)";
  $result=mysqli_query($con,$query);
  
}

$query="SELECT COUNT(*) FROM Recommend_BoardStory WHERE Board_no_R='$Board_detail_no'";
$result=mysqli_query($con,$query);
$count=mysqli_fetch_row($result);

$query="UPDATE BoardStory SET Board_recommend_count='$count[0]' WHERE Board_no='$Board_detail_no'";
$result=mysqli_query($con,$query);

echo json_encode($response);


















?>
