<?php
include 'varibles.php';
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = " INSERT INTO `u787994640_care`.`projections_sample` (`revenue`) VALUES ('40')
";
$email ="s12@yahoo.com";
//$resultss = $conn->query($sql);
$sth = "SELECT Temperture FROM(SELECT * FROM patient_records WHERE Patient_email ='$email'  ORDER BY Date DESC  LIMIT 12) X  ORDER BY Date ASC";
$resultss = $conn->query($sth);

//if ($resultss=mysqli_query($conn,$sth))
$rows = array();
$rows['name'] = 'temp';
while($r = $resultss->fetch_assoc()) {
   // $rows['data'][] = $r['revenue'];
     $rows['data'][] = $r['Temperture'];
}
$result = array();
array_push($result,$rows);
//array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);


?>