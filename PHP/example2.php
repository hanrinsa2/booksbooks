<?php
$con = mysqli_connect("localhost","yja3806", "wewe1220","yja3806");

$result = mysqli_query($con, "SELECT * FROM MainStory");
$response = array();
	
while($row=mysqli_fetch_array($result)){
  array_push($response, array("Story_no"=>$row[0],"Story_name"=>$row[1],"Story_content"=>$row[2],"Story_writer"=>$row[3],"Story_grade_avg"=>$row[4]));
}

header('Content-Type: application/json; charset=utf8');
$json = json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;

mysqli_close($con);

?>