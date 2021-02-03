<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'happoint';

$con = mysqli_connect($server,$username,$password,$db);


//connection to database check
if($con)
{
   ?>
    <script>

    </script>
   <?php
}
else
{
    ?>
    <script>
    alert("Not Connected");
    </script>
   <?php
}
?>