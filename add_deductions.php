<?php
    require("db.php");
    
    @$id = $_POST['deduction_id'];
    @$healthinsurance = $_POST['healthinsurance'];
    @$garnishments = $_POST['garnishments'];
    @$nodeductions = $_POST['nodeductions'];
    @$fica = $_POST['fica'];
    @$loans = $_POST['loans'];

    $sql = mysqli_query($connection, "UPDATE deductions SET garnishments='$garnishments', nodeductions='$nodeductions', fica='$fica', loans='$loans', healthinsurance='$healthinsurance' WHERE deduction_id='1'");

    if($sql)
    {
        ?>
            <script>
                alert('Deductions updated!');
                window.location.href='home_deductions.php';
            </script>
        <?php 
    }
    else {
        echo "Something went wrong, Please try again!"; 
    }
?>
