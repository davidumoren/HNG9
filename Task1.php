<?php

$con = mysqli_connect('localhost','root','','api_data');
if ($con){
	$sql = "select * from data";
	$result = mysqli_query($con, $sql);
	if($result){
		header("content-type: JSON");
		$i=0;
		while($row = mysqli_fetch_assoc($result)){
		
			$response[$i]['SlackUsername']  = $row['SlackUsername'];
			$response[$i]['name']  = $row['name'];


			
			if($row['backend'] == 1){
				$response[$i]['backend'] = "true";
			}
			else{
				$response[$i]['backend'] = "false";
			}
			
			// $response[$i]['backend'];
			
			$response[$i]['age']  = $row['age'];
			$response[$i]['bio']  = $row['Bio'];
			$i++;
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}