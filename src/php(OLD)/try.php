 <!-- <?php  
// PHP function to demonstrate the use of array_search()  
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
        
        $slots[] = $intStart->format("H:i");
        
    }
    
    return $slots; // creates array of appointment slots
}

function Search($search_value, $array_name)  
{  
// using the array_search() function to find specific array value  
    return(array_search($search_value, $array_name));  
}  
//defining the array  
 //create slots
 $timeslots = timeslots($duration, $cleanup, $start, $end);
 print_r($timeslots); 
 $pieces = implode("-", $timeslots); 
 print_r($pieces); 
// $timeslotsONE= timeslotsONE($duration, $cleanup, $start, $end);
$arrayarray_name = array("Reema", "Dilip", "Anirudh", "Aniket", "Rohit");  
$search_value = "14:40PM-10:00PM";  
$see=substr($search_value,0,5);
print_r ($see ." is at position ");  
//will return the position of search value in the array  
print_r(Search($see, $timeslots));  
?> 


<form>
    <input type="file" onchange="this.form.submit()" /> 
</form>  -->
