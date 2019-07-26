<?php
$con=mysqli_connect("localhost","yja3806","wewe1220","yja3806");

$Member_nickname=$_POST["Member_nickname"];
$Poem_no=$_POST["Poem_no"];
$Poem_grade=$_POST["Poem_grade"];

$query="SELECT * FROM Grade_MainPoem WHERE Member_nickname_GP='$Member_nickname' AND Poem_no_GP='$Poem_no'";
$result=mysqli_query($con,$query);

$response=array();
$response["success"]=false;
$counter=mysqli_num_rows($result);

if($counter==1)
{
  $response["success"]=false;
  $query="UPDATE Grade_MainPoem SET Poem_grade='$Poem_grade' WHERE Member_nickname_GP='$Member_nickname' AND Poem_no_GP='$Poem_no'";
  $result=mysqli_query($con,$query);
  
}
if($counter==0)
{
  $response["success"]=true;
  $query="INSERT INTO Grade_MainPoem(Member_nickname_GP,Poem_no_GP,Poem_grade) VALUES('$Member_nickname','$Poem_no','$Poem_grade')";
  $result=mysqli_query($con,$query);
  
}

$query="SELECT AVG(Poem_grade) FROM Grade_MainPoem WHERE Poem_no_GP='$Poem_no'";
$result=mysqli_query($con,$query);
$avg=mysqli_fetch_row($result);

$query="UPDATE MainPoem SET Poem_grade_avg='$avg[0]' WHERE Poem_no='$Poem_no'";
$result=mysqli_query($con,$query);

echo json_encode($response);


















?>
