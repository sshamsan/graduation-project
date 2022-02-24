<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Setting
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Setting.css">

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
            <li class="nav-item " id="myDIV">
                <a href="#" onclick="myFunction()"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./PatientData-Admin.html"><i class="fas fa-archive fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="./Calendarscreen.html"><i class="fas fa-calendar-alt fa-2x"></i></a>
            </li>
            <li class="nav-item">
                <a href="#"><i class="fas fa-bell fa-2x"></i></a>
            </li>
            <li class="nav-item active">
                <a href="#"><i class="fa-solid fa-gear fa-2x"></i></a>
            </li>
        </ul>
    </div>
    <!-- Rest of the screen -->
    <!-- Cointainer -->
    <div class="main">
        <div class="container d-flex flex-wrap justify-content-center">
            <h4 class="Font"><strong>Company User</strong></h4>
            <a class="d-flex align-items-right mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
              <div class="container">
                <!-- Button to Open the Modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    New User <i class="fas fa-plus"></i></button>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h3 class="modal-title"><strong>New User</strong></h3>
                    <button type="button" class="btn" data-dismiss="modal"><i
                            class="fas fa-close fa-2x"></i></button>
                    </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <h3>User Info</h3>
                        <form class="popupwindow">
                          <label><h4><strong>Employee name</strong></h4></label><br>
                          <input type="text" placeholder=""><br><br>
                          <label><h4><strong>Employee ID</strong></h4></label><br>
                          <input type="text" placeholder=""><br><br>
                          <label><h4><strong>Employee email</strong></h4></label><br>
                          <input type="text" placeholder=""><br><br>
                          <label><h4><strong>Employee role</strong></h4></label><br>
                          <select class="form-select" aria-label="Default select example">
                            <option value="1">Admin</option>
                            <option value="2">Front-desk Worker</option>
                            <option value="3">Therapist</option>
                        </select><br>
                        <label><h4><strong>Employee specialization</strong></h4></label><br>
                        <input type="text" placeholder=""><br><br>
                        
                        </form>
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary flex-grow-1"
                        data-dismiss="modal">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            </a>
          </div>
        <pre class="tab"><strong>      Name                Username                Role </strong></pre>
        <div class="Cointainer">
            <pre><h4>Mohammed A.           Mohammed123            Front-desk                        <button type="button" class="btn btn-danger "
                data-dismiss="modal"><strong>Remove</strong></button></pre></h4>

        </div>
        <div class="Cointainer">
            <pre><h4> Ali M.                  Ali123              Therapist                         <button type="button" class="btn btn-danger "
                data-dismiss="modal"><strong>Remove</strong></button></pre></h4>
                
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>