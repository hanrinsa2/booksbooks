<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];
$Essay_no=$_POST["Essay_no"];
$Essay_grade=$_POST["Essay_grade"];

$query="SELECT * FROM Grade_MainEssay WHERE Member_nickname_GE='$Member_nickname' AND Essay_no_GE='$Essay_no'";
$result=mysqli_query($con,$query);

$response=array();
$response["success"]=false;
$counter=mysqli_num_rows($result);

if($counter==1)
{
  $response["success"]=false;
  $query="UPDATE Grade_MainEssay SET Essay_grade='$Essay_grade' WHERE Member_nickname_GE='$Member_nickname' AND Essay_no_GE='$Essay_no'";
  $result=mysqli_query($con,$query);
  
}
if($counter==0)
{
  $response["success"]=true;
  $query="INSERT INTO Grade_MainEssay(Member_nickname_GE,Essay_no_GE,Essay_grade) VALUES('$Member_nickname','$Essay_no','$Essay_grade')";
  $result=mysqli_query($con,$query);
  
}

$query="SELECT AVG(Essay_grade) FROM Grade_MainEssay WHERE Essay_no_GE='$Essay_no'";
$result=mysqli_query($con,$query);
$avg=mysqli_fetch_row($result);

$query="UPDATE MainEssay SET Essay_grade_avg='$avg[0]' WHERE Essay_no='$Essay_no'";
$result=mysqli_query($con,$query);

echo json_encode($response);


















?>
