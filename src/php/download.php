<?php
require_once ("../../config.php");
if(isset($_GET['id'] ,$_GET['date']))
{
// if id is set then get the file with the id from database
$id    = $_GET['id'];
$date =$_GET['date'];
$result = mysqli_query($con,"SELECT name, type, size, content FROM upload WHERE File_number = '$id' AND uploaded_date ='$date'");
list($name, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");

if($type=='application/pdf'){
    header("Content-Disposition: attachment; filename=$name.pdf");
}
if($type=='application/octet-stream'){
    header("Content-Disposition: attachment; filename=$name.docx");
}
else{
    header("Content-Disposition: attachment; filename=$name");
}
echo $content;


exit;
}
?>