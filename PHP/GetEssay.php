<?php
$con = mysqli_connect("localhost","yja3806", "wewe1220","yja3806");
mysqli_set_charset($con, 'utf8');
$result = mysqli_query($con, "SELECT * FROM MainEssay order by rand() limit 1");
$response = array();
	
while($row=mysqli_fetch_array($result)){
  array_push($response, array("Essay_no"=>$row[0],"Essay_name"=>$row[1],"Essay_content"=>$row[2],"Essay_writer"=>$row[3],"Essay_grade_avg"=>$row[4]));
}


header('Content-Type: application/json; charset=euc-kr');
$json = json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;

mysqli_close($con);

?>