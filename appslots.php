<?php

$duration = 50;
$cleanup = 0;
$start = "08:00";
$end = "17:00";


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
        //$slots[] = $intStart->format("H:iA");
        
    }
    
    return $slots; // creates array of appointment slots
}

//create slots
$timeslots = timeslots($duration, $cleanup, $start, $end);
$checkArr = array();

//create check array 
foreach($timeslots as $t){
$t=substr($t,0,5);
$t=strtotime($t);
$t=date("h:i:s",$t);
array_push($checkArr,$t) ;
}
?>