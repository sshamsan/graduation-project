<?php
require_once ("../../config.php");

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
    print_r($checkArr); 
    //$AppStart = $timeslot[1];

// output the available appointments
     if (isset($_POST['Appointment'])) { 
     $Date = $_POST['date'];
     $emp_id = '103';
     $records = mysqli_query($con,"SELECT * from appointment where Appointment_date = '$Date' AND employee_id = '$emp_id'");
         while ($row = mysqli_fetch_array($records)){
             $Time=$row['Appointment_Time'];
             $booked=array_search($Time,$checkArr);//provide the value
             echo $booked;
             unset($timeslots[$booked]);//provide the key not the value ///// its always deleting the first index!!
             print_r($timeslots);
         }
     }

 // insert appoitnment into db
 if (isset($_POST['Book'])) {
    $Patient = $_POST['patient'];
    $Therapist =$_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];
    $Type = $_POST['type'];
    $Payment_Status = 'unpaid';
    //$file_num = '111';
    $emp_id = '103';
    $res;
    print_r( $_POST['time']);

    // // checks if appointment is available or not 
    $stmt = $con->prepare("SELECT * from appointment where Appointment_date = '$Date' AND employee_id = '$emp_id' AND  Appointment_Time = '$Time'");
    //$stmt->bind_param($Date, $emp_id,$Time);// takes the input date and sends it to the database
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            echo  
            ' <script> alert("Already Booked"); </script>';
            //$msg = "<div class='alert alert-danger'></div>";

        }else{
            $res = mysqli_query($con, "INSERT INTO appointment (Therapist_Name , Payment_Status, Appointment_Time, Appointment_Date, file_number,employee_id)
            VALUES ('$Therapist','$Payment_Status','$Time','$Date','$Patient','$emp_id')");
            unset($timeslots[array_search($Time,$timeslots)]);
        }
    }
}



// if(isset($_GET['date'])){
//     $date = $_GET['date'];
//     $stmt = $con->prepare("SELECT * from appointment where Appointment_date = ?");
//     $stmt->bind_param('s', $date);
//     $bookings = array();
//     if($stmt->execute()){
//         $result = $stmt->get_result();
//         if($result->num_rows>0){
//             while($row = $result->fetch_assoc()){
//                 $bookings[] = $row['timeslot'];
//             }
//             $stmt->close();
//         }
//     }
// }

/// i think this is more advanced or something for now comment..
// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $timeslot = $_POST['timeslot'];
//     $stmt = $con->prepare("select * from bookings where date = ? AND timeslot=?");
//     $stmt->bind_param('ss', $date, $timeslot);
//     if($stmt->execute()){
//         $result = $stmt->get_result();
//         if($result->num_rows>0){
//             $msg = "<div class='alert alert-danger'>Already Booked</div>";
//         }else{
//             $stmt = $con->prepare("INSERT INTO bookings (name, timeslot, email, date) VALUES (?,?,?,?)");
//             $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
//             $stmt->execute();
//             $msg = "<div class='alert alert-success'>Booking Successfull</div>";
//             $bookings[] = $timeslot;
//             $stmt->close();
//             $con->close();
//         }
//     }
// }
?>

<html>
<body>
        <!-- New Appointment Modal -->
    <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <div class="modal" id="newAppt">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Appointment</h4>
                                <button type="button" class="btn" data-dismiss="modal"><i
                                        class="fas fa-close fa-2x"></i></button>
                            </div>
                            <div class="modal-body">
                                <form class="popupwindow d-flex flex-column" method="POST">
                                    <select name="patient" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected hidden>Choose Patient</option>
                                    <?php
                                        $records = mysqli_query($con,"SELECT Name, File_Number FROM patient");
                                        while ($row = mysqli_fetch_array($records)){
                                            echo "<option value=\"". $row['File_Number'] ."\">". $row['File_Number'] ."</option>"; 
                                        }
                                    ?>
                                    </select>    
                                <!-- <input name ="patient" class="form-control" type="text" placeholder="Patient"> -->
                                    <select name="therapist" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected hidden>Choose Therapist</option>
                                    <?php
                                        $records = mysqli_query($con,"SELECT Name FROM employee WHERE Role = 'Therapist' ");
                                        while ($row = mysqli_fetch_array($records)){
                                            echo "<option value=\"". $row['Name'] ."\">". $row['Name'] ."</option>"; 
                                        }
                                    ?>
                                    </select>
                                    <input name="date" class="form-control" type="date" placeholder="Date">
                                    <div class="modal-footer d-flex">
                                            <button name ="Appointment" type="submit" class="btn btn-primary flex-grow-1"
                                            >Save</button>
                                        
                                    </div>
                                </form>
                            </div>

                            <form class="popupwindow d-flex flex-column" method="POST">
                                    <select name="time" class="form-select" aria-label="Default select example">
                                            <option value="" disabled selected hidden>Choose appointment time</option>
                                                <?php
                                                        foreach($timeslots as $ts){ 
                                                            echo "<option value=\"". $ts ."\">". $ts ."</option>"; 
                                                        }
                                                // print_r( $_POST['patient']);
                                                // //create slots
                                                //     $timeslots = timeslots($duration, $cleanup, $start, $end);
                                                //     if (isset($_POST['Appointment'])) {   
                                                //     $Date = $_POST['date'];
                                                //     $emp_id = '103';
                                                    
                                                //     $records = mysqli_query($con,"SELECT * from appointment where Appointment_date = '$Date' AND employee_id = '$emp_id'");
                                                //         while ($row = mysqli_fetch_array($records)){
                                                //            // print_r($row['Appointment_Time']);
                                                            
                                                //             $Time=$row['Appointment_Time'];
                                                //             print(array_search($Time,$timeslots));
                                                //             unset($timeslots[array_search($Time,$timeslots)]);
                                                           
                                                //         }
                                                //         foreach($timeslots as $ts){ 
                                                //             echo "<option value=\"". $ts ."\">". $ts ."</option>"; 
                                                //         }
                                                //     }
                                                                                              
                                                ?>
                                    </select> 
                                    <select name="type" class="form-select" aria-label="Default select example">
                                        <option value="" disabled selected hidden>Choose Appointment Type</option>
                                        <option value="DX">DX (Diagnosis Session)</option>
                                        <option value="TX">TX (Treatment Session)</option>
                                    </select>
                                    <div class="modal-footer d-flex">
                                       
                                            <button name ="Book" type="submit" class="btn btn-primary flex-grow-1"
                                            >Book</button>
                                        
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

</body>     

</html>

