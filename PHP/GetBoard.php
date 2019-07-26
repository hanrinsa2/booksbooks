<?php
$con = mysqli_connect("localhost","yja3806", "wewe1220","yja3806");
mysqli_set_charset($con, 'utf8');
$result = mysqli_query($con, "SELECT * FROM BoardStory");
$response = array();
	
while($row=mysqli_fetch_array($result)){
  array_push($response, array("Board_no"=>$row[0],"Board_category_no"=>$row[1],"Board_name"=>$row[2],"Board_content"=>$row[3],"Board_writer_nickname"=>$row[4],"Board_date"=>$row[5],"Board_recommend_count"=>$row[6]));
}


header('Content-Type: application/json; charset=euc-kr');
$json = json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;

mysqli_close($con);

?>