<?php
require("../../config.php");
//load.php

$data = array();

$query = "SELECT * FROM appointment";

$stmt = $con->prepare($query);
$stmt->execute();

$resultSet = $stmt->get_result();
$datas = $resultSet->fetch_all(MYSQLI_ASSOC);


// $statement = $con->prepare($query);

// $statement->execute();

// //grab a result set
// $resultSet = $statement->get_result();

// $result = $resultSet->fetchAll();
//$data[] = array('title','start','Appointment_Date');

foreach($datas as $row)
{
 $data[] = array(
  'title'   => $row['Appointment_ID'],
  'start'   => $row['Therapist_Name'],
  'Appointment_Date'   => $row['Appointment_Date']
  //'end'   => $row["end_event"]
 );
}

//echo json_encode($data);
//echo json_encode($data , JSON_FORCE_OBJECT);
$personJSON=json_encode($data);
echo $personJSON;
echo json_last_error_msg(); // Print out the error if any
die(); // halt the script
?>

