<?php
$con = mysqli_connect("localhost","yja3806", "wewe1220","yja3806");
mysqli_set_charset($con, 'utf8');
$result = mysqli_query($con, "SELECT * FROM MainPoem order by rand() limit 1");
$response = array();
	
while($row=mysqli_fetch_array($result)){
  array_push($response, array("Poem_no"=>$row[0],"Poem_name"=>$row[1],"Poem_content"=>$row[2],"Poem_writer"=>$row[3],"Poem_grade_avg"=>$row[4]));
}


header('Content-Type: application/json; charset=euc-kr');
$json = json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $json;

mysqli_close($con);

?>