<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];
$Story_no=$_POST["Story_no"];
$Story_grade=$_POST["Story_grade"];

$query="SELECT * FROM Grade_MainStory WHERE Member_nickname_GS='$Member_nickname' AND Story_no_GS='$Story_no'";
$result=mysqli_query($con,$query);

$response=array();
$response["success"]=false;
$counter=mysqli_num_rows($result);

if($counter==1)
{
  $response["success"]=false;
  $query="UPDATE Grade_MainStory SET Story_grade='$Story_grade' WHERE Member_nickname_GS='$Member_nickname' AND Story_no_GS='$Story_no'";
  $result=mysqli_query($con,$query);
  
}
if($counter==0)
{
  $response["success"]=true;
  $query="INSERT INTO Grade_MainStory(Member_nickname_GS,Story_no_GS,Story_grade) VALUES('$Member_nickname','$Story_no','$Story_grade')";
  $result=mysqli_query($con,$query);
  
}

$query="SELECT AVG(Story_grade) FROM Grade_MainStory WHERE Story_no_GS='$Story_no'";
$result=mysqli_query($con,$query);
$avg=mysqli_fetch_row($result);

$query="UPDATE MainStory SET Story_grade_avg='$avg[0]' WHERE Story_no='$Story_no'";
$result=mysqli_query($con,$query);

echo json_encode($response);


















?>
