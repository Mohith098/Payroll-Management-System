<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");

  $sql = mysqli_query($connection, "SELECT * FROM deductions WHERE deduction_id='1'");
while($row = mysqli_fetch_array($sql))
  {
    $healthinsurance = $row['healthinsurance'];
    $garnishments = $row['garnishments'];
    $others = $row['nodeductions'];
    $fica = $row['fica'];
    $loans = $row['loans'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
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
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
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
            <li class="active">
              <a href="home_employee.php">Employee Section <span class="label label-primary"><?php include 'total_count.php'?></span></a>
            </li>
            <li>
              <a href="home_deductions.php">Manage Deductions</a>
            </li>
            <li>
              <a href="home_salary.php">Payroll Section</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

      <?php
        $id = $_REQUEST['emp_id'];
        $query = "SELECT * FROM employee WHERE emp_id='".$id."'";
        $result = mysqli_query($connection, $query) or die ( mysqli_error($connection));
        
        while ($row = mysqli_fetch_assoc($result))
        
        {

          ?>

              <form class="form-horizontal" action="update_employee.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Firstname  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Lastname  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Gender  :</label>
                    <div class="col-sm-4">
                    <select name="gender" class="form-control" required>
                      <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Contact  :</label>
                    <div class="col-sm-4">
                      <input type="number" name="contact" class="form-control" value="<?php echo $row['contact'];?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Email  :</label>
                    <div class="col-sm-4">
                      <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Address  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Employee Type  :</label>
                    <div class="col-sm-4">
                      <select name="emp_type" class="form-control" required>
                        <option value="<?php echo $row['emp_type'];?>"><?php echo $row['emp_type'];?></option>
                        <option value="Job Order">Job Order</option>
                        <option value="Regular">Regular</option>
                        <option value="Casual">Casual</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Department  :</label>
                    <div class="col-sm-4">
                      <select name="division" class="form-control" placeholder="Division" required>
                        <option value="<?php echo $row['division'];?>"><?php echo $row['division'];?></option>
                        <option value="Admin">Admin</option>
                        <option value="Human Resource">Human Resource</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Engineering">Engineering</option>
                        <option value="MIS">MIS</option>
                        <option value="Supply">Supply</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Control">Control</option>
                      </select>
                    </div>
                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" style="border-raidus:0%;" value="Make Changes" class="btn btn-danger">
                      <a href="home_employee.php" style="border-raidus:0%;" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
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