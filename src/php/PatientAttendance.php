<?php
require("../../config.php");
$name="";
$date="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
       Patients attendance
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"><!--assets/css/bootstrap.min.css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"><!--assets/css/font-awesome.min.css-->
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css"><!--assets/css/select2.min.css-->
    <link rel="stylesheet" type="text/css" href="../css/style.css"><!--assets/css/style.css-->

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href='../css/PatientAttendance.css'>

</head>

<body>

    <header class="header">
        <div class="header-right">
            <div class="dropdown">
                <!-- User Info -->
                <div class="user-info d-flex flex-row dropdown-toggle" type="button" id="dropdownMenu2"
                    data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <h5 class="user-info" style="color: azure;">Username</h5>
                    <i class="fa fa-user user-info" style="color: azure;"></i>
                </div>
                <!-- Drop down menu -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><button class="dropdown-item" type="button">Log out</button></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Navigation Bar part in Screen -->
    <div class="sidenav">
        <ul class="nav flex-column">
            <!-- LOGO -->
            <li class="nav-item logo">
                <img class="logo" src="../images/logo.png" alt="Jish logo">
            </li>

            <!-- NAVIGATION BAR BUTTONS -->
            <li class="nav-item " id="myDIV">
                <a href="#" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item ">
                <a href="./PatientData-Admin.html"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.html"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
            <li class="nav-item ">
                <a href="#"><i class="fa fa-gear fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="#"><i class="fa-solid fa-clipboard-user fa-2x"></i></a>
            </li>
        </ul>
    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Attendance Sheet</h4>
                    </div>
                </div>
                <div class="row filter-row">
                
                    <div class="col-sm-6 col-md-3">
                    <form method="post">
                        <div class="form-group form-focus select-focus">
                            
                            <label class="focus-label">Select Therapist</label><br>
                            <select name="therapist" class="select floating" onchange="getTherapist(this)">
                                <option>-</option>
                                <?php
                            $result = mysqli_query($con,"SELECT * FROM employee WHERE role ='Therapist'");
                            // $row = mysqli_fetch_array($result);
                            while($row = mysqli_fetch_array($result)) {       
                            ?>
                                <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                                <!-- <option>Therapist2</option>
                                <option>Therapist3</option> -->
                            <?php
                             }
                            ?>
                            </select>
                            <script type="text/javascript">
                            function getTherapist(dropdown)
                            {
                                
                                var option_value = dropdown.options[dropdown.selectedIndex].value;
                                var option_text = dropdown.options[dropdown.selectedIndex].text;
                                // alert('The option value is "' + option_value + '"\nand the text is "' + option_text + '"');
                            }
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Select Month</label><br>
                            <input type="date" name="date">
                            <!-- <select name="month" class="select floating">
                                <option>-</option>
                                <option value=1>Jan</option>
                                <option value=2>Feb</option>
                                <option value=3>Mar</option>
                                <option value=4>Apr</option>
                                <option value=5>May</option>
                                <option value=6>Jun</option>
                                <option value=7>Jul</option>
                                <option value=8>Aug</option>
                                <option value=9>Sep</option>
                                <option value=10>Oct</option>
                                <option value=11>Nov</option>
                                <option value=12>Dec</option>
                            </select> -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Select Year</label><br>
                            <select name="year" class="select floating">
                                <option>-</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                    <button  class="btn btn-primary" name="searchTherapist" type="submit"> Search </button>        
                    </div>
                </div>
                 </form>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Therapist</th>
                                        <th>Confirm</th>
                                        <th>No-show</th>
                                        <th>Cancelled</th>
                                     </tr>
                                </thead>
                                <?php
                                    if (isset($_POST['searchTherapist'])) {
                                        $name = $_POST['therapist'];
                                        $date = $_POST['date'];
                                    }
                                    
                                    $result = mysqli_query($con,"SELECT * FROM appointment WHERE Therapist_Name ='$name' and Appointment_Date = '$date' and status='Confirmed'");
                                    $rows1=mysqli_num_rows ($result);   
                                    $result = mysqli_query($con,"SELECT * FROM appointment WHERE Therapist_Name ='$name' and Appointment_Date = '$date' and status='No_Show'");
                                    $rows2=mysqli_num_rows ($result);   
                                    $result = mysqli_query($con,"SELECT * FROM appointment WHERE Therapist_Name ='$name' and Appointment_Date = '$date' and status='Cancelled'");
                                    $rows3=mysqli_num_rows ($result);   
                                        ?>
                                <tbody>
                                    <tr>
                                        <td><h2><?= $name ?></h2></td>
                                        <td><h2><?= $rows1 ?></h2></td>
                                        <td><h2><?= $rows2 ?></h2></td>
                                        <td><h2><?= $rows3 ?></h2></td></tr>
                                    <!-- <tr>
                                        <td><h2>Therapist2</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td>
                                     </tr>
                                    <tr>
                                        <td><h2>Therapist3</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h2>Therapist4</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td></tr>
                                    <tr>
                                        <td><h2>Therapist5</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td></tr>
                                    <tr>
                                        <td><h2>Therapist6</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td> 
                                    </tr>
                                    <tr>
                                        <td><h2>Therapist7</h2></td>
                                        <td><h2>10</h2></td>
                                        <td><h2>5</h2></td>
                                        <td><h2>2</h2></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td><h6>Total</h6></td>
                                        <td><h6>70</h6></td>
                                        <td><h6>35</h6></td>
                                        <td><h6>14</h6></td>
                                    </tr> -->
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title"></h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Patient</th>
                                                <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $records = mysqli_query($con,"SELECT file_number FROM appointment where Therapist_Name ='$name' and Appointment_Date = '$date' and status='Confirmed'");
                                        while ($row = mysqli_fetch_array($records)){
                                        $file=$row['file_number'];
                                        $patient = mysqli_fetch_array(mysqli_query($con,"SELECT name FROM patient where file_number =$file"));
                                        ?>
                                            <tr class="table-success">
                                                <td><?= $row['file_number'] ?></td>
                                                <td><?=$patient['name']?></td>
                                                <td>Confirm</td>
                                            
                                            </tr>
                                            <?php } 
                                            $records = mysqli_query($con,"SELECT file_number FROM appointment where Therapist_Name ='$name' and Appointment_Date = '$date' and status='No_Show'");
                                            while ($row = mysqli_fetch_array($records)){
                                            $file=$row['file_number'];
                                            $patient = mysqli_fetch_array(mysqli_query($con,"SELECT name FROM patient where file_number =$file"));
                                            
                                            ?>
                                            <tr class="table-secondary">
                                                <td><?= $row['file_number'] ?></td>
                                                <td><?=$patient['name']?></td>
                                                <td>No-Show</td>
                                            </tr>
                                            <?php } 
                                            $records = mysqli_query($con,"SELECT file_number FROM appointment where Therapist_Name ='$name' and Appointment_Date = '$date' and status='Cancelled'");
                                            while ($row = mysqli_fetch_array($records)){
                                            $file=$row['file_number'];
                                            $patient = mysqli_fetch_array(mysqli_query($con,"SELECT name FROM patient where file_number =$file"));
                                            
                                            ?>
                                            <tr class="table-danger">
                                                <td><?= $row['file_number'] ?></td>
                                                <td><?=$patient['name']?></td>
                                                <td>Cancelled</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                </div>
        <div class="sidebar-overlay" data-reff=""></div>
        <script src="../js/jquery-3.2.1.min.js"></script><!--assets/js/jquery-3.2.1.min.js-->
        <script src="../js/popper.min.js"></script><!--assets/js/popper.min.js-->
        <script src="../js/bootstrap.min.js"></script><!--assets/js/bootstrap.min.js-->
        <script src="../js/jquery.slimscroll.js"></script><!--assets/js/jquery.slimscroll.js-->
        <script src="../js/select2.min.js"></script><!--assets/js/select2.min.js-->
        <script src="../js/app.js"></script><!--assets/js/app.js-->
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>