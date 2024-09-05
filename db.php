<?php
	$connection = mysqli_connect('localhost', 'root', '', 'payroll_s');

	if (!$connection)
	{
		die("Database Connection Failed" . mysqli_connect_error());
	}
?>
