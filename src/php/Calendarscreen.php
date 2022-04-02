<?php
require("../../config.php");
$sql = "SELECT Therapist_Name,Appointment_Date FROM appointment";
$result = mysqli_query($con,$sql); 
$myArray = array();
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
} 
else 
{
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calendar</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--../plugins/fontawesome-free/css/all.min.css-->
    <link rel="stylesheet" href="../css/main.css">
    <!--../plugins/fullcalendar/main.css-->
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!--../dist/css/adminlte.min.css-->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/CalendarTest.css">
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>
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
                    <li><button class="dropdown-item" type="submit"><?php session_destroy(); ?><a href="../../index.php">Log out</a></button></li>
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
            <a href="Homescreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
        </li>
        <li class="nav-item active">
            <a href="./PatientFile-admin.php"><i class="fas fa-archive fa-2x"></i></a>
        </li>
        <li class="nav-item">
            <a href="Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
        </li>
        <li class="nav-item">
            <a href="#"><i class="fas fa-bell fa-2x"></i></a>
        </li>
        <?php if($_SESSION['log1']=='Admin'){?>
        <li class="nav-item">
            <a href="Settings.php"><i class="fas fa-gear fa-2x"></i></a>
        </li>
        <?php } ?>
      </ul>
    </div>
    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div class="wrapper">
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- <div class="col-md-3"> -->
                    <div class="sticky-top mb-3">

                          <div id="external-events">
                          </div>
                        
                    </div>
                  <!-- </div> -->
                  <!-- /.col -->
                  <div class="col-md-9">
                    <div class="card card-primary">
                      <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
          </div>
          <!-- ./wrapper -->
          <!-- jQuery -->
          <script src="../js/jquery.min.js"></script>
          <!--../plugins/jquery/jquery.min.js-->
          <!-- Bootstrap -->
          <script src="../js/bootstrap.bundle.min.js"></script>
          <!--../plugins/bootstrap/js/bootstrap.bundle.min.js-->
          <!-- jQuery UI -->
          <script src="../js/jquery-ui.min.js"></script>
          <!--../plugins/jquery-ui/jquery-ui.min.js-->
          <!-- AdminLTE App -->
          <script src="../js/adminlte.min.js"></script>
          <!--../dist/js/adminlte.min.js-->
          <!-- fullCalendar 2.2.5 -->
          <script src="../js/moment.min.js"></script>
          <!--../plugins/moment/moment.min.js-->
          <script src="../js/main.js"></script>
          <!--../plugins/fullcalendar/main.js-->
          <!-- AdminLTE for demo purposes -->
          <script src="../js/demo.js"></script>
          <!--"../dist/js/demo.js"-->
          <!-- Page specific script -->
          <script>
            $(function () {
        
              /* initialize the external events
               -----------------------------------------------------------------*/
              function ini_events(ele) {
                ele.each(function () {
        
                  // create an Event Object (https://fullcalendar.io/docs/event-object)
                  // it doesn't need to have a start or end
                  var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                  }
        
                  // store the Event Object in the DOM element so we can get to it later
                  $(this).data('eventObject', eventObject)
        
                  // make the event draggable using jQuery UI
                  $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                  })
        
                })
              }
        
              ini_events($('#external-events div.external-event'))
        
              /* initialize the calendar
               -----------------------------------------------------------------*/
              //Date for the calendar events (dummy data)
              var date = new Date()
              var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
        
              var Calendar = FullCalendar.Calendar;
              var Draggable = FullCalendar.Draggable;
        
              var containerEl = document.getElementById('external-events');
              var checkbox = document.getElementById('drop-remove');
              var calendarEl = document.getElementById('calendar');
        
              // initialize the external events
              // -----------------------------------------------------------------
        
              new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function (eventEl) {
                  return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                  };
                }
              });
        
              var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events:  <?php echo json_encode($myArray); ?>,
                eventClick: 
                function(calEvent) {

    Swal.fire({
  title: 'Edit Appointmnet',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Save`,
  denyButtonText: `Don't save`,
  html: '<input name ="patient" class="form-control" type="text" placeholder="Patient" value ="test" disabled><br/>'+
  '<input name ="therapist" class="form-control" type="text" placeholder="Therapist" value ="test" disabled><br/>'+
  '<input name="date" class="form-control" type="date" placeholder="Date"  ><br/>'+
  '<input name="time" class="form-control" type="time" min="08:00" max="17:00"placeholder="Time"  >'
  
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
          
      }
  ,
                editable: true,
              });
        
              calendar.render();
              
            })
          </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>
</html>
