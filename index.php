<?php
  include("auth.php"); 
  include("add_employee.php");
?>

<?php

$connection = mysqli_connect('localhost', 'root', '', 'payroll_s');

if (!$connection)
{
  die("Database Connection Failed" . mysqli_connect_error());
}

  $query  = mysqli_query($connection,"SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $healthinsurance= $row['healthinsurance'];
    $garnishments= $row['garnishments'];
    $nodeductions= $row['nodeductions'];
    $fica = $row['fica'];
    $loans= $row['loans'];

    $total        = $healthinsurance + $garnishments + $nodeductions + $fica + $loans;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>Payroll System</title>

    <script>
      
      
    </script>


    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <link href="assets/css/search.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          
          <b>Payroll System</b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><button class="btn btn-danger" style="border-radius: 0%;"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['username']; ?></button></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified" style="border-radius:0%">
            <li><a href="home_employee.php">Employee Section <span class="label label-primary"><?php include 'total_count.php'?></span></a></li>
            <li><a href="home_deductions.php">Manage Deductions</a></li>
            <li><a href="home_salary.php">Payroll Section</a></li>
          </ul>
        </nav>
      </div><br>

      
      <div class="jumbotron">
        <h1>Payroll System</h1>
        <img src="assets/img.png" alt="Payroll Img">
        
        
      </div>
        
      </footer>


      
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h4 align="center">You are currently logged in as <b><?php echo $_SESSION['username']; ?></b></h4>
      
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
              <br>
              <div align="center">
                <a href="updatepassword.html" class="btn btn-block btn-danger">Change Password</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>