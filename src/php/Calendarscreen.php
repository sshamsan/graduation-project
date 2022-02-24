<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Calendar
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href='../css/Calendarscreen.css'>

    <!-- <script>
        function myFunction() {
            var element = document.getElementById("myDIV");
            if (element.classList.contains("active")) {
                element.classList.remove("active")
            } else {
                element.classList.add("active");
            }

        }
    </script> -->


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
            <li class="nav-item" id="myDIV">
                <a href="./Homescreen.php" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./PatientFile-Admin.php"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="./Calendarscreen.php"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
        </ul>

    </div>


    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">

        <div class="cointainer">


            <!-- CALENDAR START -->

            <div class="calendar">

                <div class="col leftCol">
                    <div class="content">
                        <h1 class="date">Tuesday<span>February 16th</span></h1>
                        <!-- <div class="notes">
                            <p>
                                <input type="text" value="" placeholder="new note"/>
                                <a href="#" title="Add note" class="addNote animate">+</a>
                            </p>
                            <ul class="noteList">
                                <li>Headbutt a lion<a href="#" title="Remove note" class="removeNote animate">x</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
    
                <div class="col rightCol">
                    <div class="content">
                        <h2 class="year">2022</h2>
                        <ul class="months">
                            <li><a href="#" title="Jan" data-value="1">Jan</a></li>
                            <li><a href="#" title="Feb" data-value="2" class="selected">Feb</a></li>
                            <li><a href="#" title="Mar" data-value="3">Mar</a></li>
                            <li><a href="#" title="Apr" data-value="4">Apr</a></li>
                            <li><a href="#" title="May" data-value="5">May</a></li>
                            <li><a href="#" title="Jun" data-value="6">Jun</a></li>
                            <li><a href="#" title="Jul" data-value="7">Jul</a></li>
                            <li><a href="#" title="Aug" data-value="8">Aug</a></li>
                            <li><a href="#" title="Sep" data-value="9">Sep</a></li>
                            <li><a href="#" title="Oct" data-value="10">Oct</a></li>
                            <li><a href="#" title="Nov" data-value="11">Nov</a></li>
                            <li><a href="#" title="Dec" data-value="12">Dec</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="weekday">
                            <li><a href="#" title="Mon" data-value="1">Mon</a></li>
                            <li><a href="#" title="Tue" data-value="2">Tue</a></li>
                            <li><a href="#" title="Wed" data-value="3">Wed</a></li>
                            <li><a href="#" title="Thu" data-value="4">Thu</a></li>
                            <li><a href="#" title="Fri" data-value="5">Fri</a></li>
                            <li><a href="#" title="Say" data-value="6">Sat</a></li>
                            <li><a href="#" title="Sun" data-value="7">Sun</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="days">
                            <script>
                                for( var _i = 1; _i <= 31; _i += 1 ){
                                    var _addClass = '';
                                    if( _i === 12 ){ _addClass = ' class="selected"'; }
                                    
                                    switch( _i ){
                                        case 8:
                                        case 10:
                                        case 27:
                                            _addClass = ' class="event"';
                                        break;
                                    }
    
                                    document.write( '<li><a href="#" title="'+_i+'" data-value="'+_i+'"'+_addClass+'>'+_i+'</a></li>' );
                                }
                            </script>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
    
                <div class="clearfix"></div>
    
            </div>
            <!-- CALENDAR END -->

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>