

<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");

  $connection = mysqli_connect('localhost', 'root', '', 'payroll_s');

  if (!$connection)
  {
    die("Database Connection Failed" . mysqli_connect_error());
  }

  $select_db = mysqli_select_db($connection, 'payroll_s');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_connect_error());
  }

  $query  = mysqli_query($connection, "SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $healthinsurance   = $row['healthinsurance'];
    $garnishments          = $row['garnishments'];
    $nodeductions         = $row['nodeductions'];
    $fica         = $row['fica'];
    $loans        = $row['loans'];

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
        <b><a href="index.php" style="text-decoration:none; color:#3fb1d4;"><img src="assets/img.png" alt="lg" width="28px;"> Payroll System</a></b>
            <a data-toggle="modal" style="text-decoration:none; color:#3fb1d4;" href="#colins" class="pull-right"><b><button class="btn btn-danger" style="border-radius: 0%;"><i class="fas fa-sign-out-alt"></i> Exit</button></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified" style="border-radius:0%">
            <li>
              <a href="home_employee.php">Employee Section <span class="label label-primary"><?php include 'total_count.php'?></span></a>
            </li>
            <li class="active">
              <a data-toggle="modal" href="#deductions">Manage Deductions</a>
            </li>
            <li>
              <a href="home_salary.php">Payroll Section</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

              <form class="form-horizontal" action="#" name="form">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th><p align="center">Health Insurance:</p></th>
                      <th><p align="center">Garnishments:</p></th>
                      
                      <th><p align="center">FICA:</p></th>
                      <th><p align="center">Loans:</p></th>
                    </tr>
                    
                  </thead>

                  <tbody>
                    <tr>
                      <td align="center"><?php echo $healthinsurance; ?>.00</td>
                      <td align="center"> <?php echo $garnishments; ?>.00</td>
                      
                      <td align="center"><?php echo $fica; ?>.00</td>
                      <td align="center"><?php echo $loans; ?>.00</td>
                    </tr>
                  </tbody>
                </table>

               


                <br>

                <div class="form-group">
                  <h4><label class="col-lg-12 control-label">Total Deductions : <?php echo $total; ?>.00</label></h4>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label"><button type="button" data-toggle="modal" data-target="#deductions" class="btn btn-danger" style="border-radius:0%"> <i class="fa fa-edit"></i> Update Deduction Details</button></label>
                </div>
              </form>

      
      <div class="modal fade" id="deductions" role="dialog">
        <div class="modal-dialog">
        
          
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Payroll Deduction List</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_deductions.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Health Insurance</label>
                  <div class="col-sm-8">
                    <input type="text" name="healthinsurance" class="form-control" required="required" value="<?php echo $healthinsurance; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Garnishments</label>
                  <div class="col-sm-8">
                    <input type="text" name="garnishments" class="form-control" value="<?php echo $garnishments; ?>" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">FICA</label>
                  <div class="col-sm-8">
                    <input type="text" name="fica" class="form-control" value="<?php echo $fica; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Loans</label>
                  <div class="col-sm-8">
                    <input type="text" name="loans" class="form-control" value="<?php echo $loans; ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-primary" style="border-radius:0%" value="Make Changes">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
        
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
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