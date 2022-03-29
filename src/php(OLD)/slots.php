<?php
//database parameters
$host = "localhost";
$username = "root";
$password = " ";
$databasename = "jishtest";

$mysqli = mysqli_connect($host,$username,"",$databasename ) or die(mysqli_error());

$duration = 50;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}

if(isset($_POST['submit'])){
    $name = 'lu';
    $email = 'll';
    $timeslot = $_POST['submit'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, email, date) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $stmt->close();
            $mysqli->close();
        }
    }
}

?>

<html>
<form method="post">
<div class="row">
   <div class="col-md-12">
       <?php echo(isset($msg))?$msg:""; ?>
   </div>
    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
        foreach($timeslots as $ts){
    ?>
    <div class="col-md-2">
        <div class="form-group">
           <button class="btn btn-success book" name="submit" <?php echo $ts; ?>"><?php echo $ts; ?></button>
<script> 
if($date<date('Y-m-d')){
    $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
}else{
     $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
}         
</script>
        </div>
    </div>
    <?php } ?>
</div>
</form>

</html>