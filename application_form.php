<!DOCTYPE html>
<html>
    <head>
   
        <title>
            Appointment Form
        </title>
    </head>
    <body style="background-color:rgba( 71, 147, 227, 1);">
        <div>
           <h2>Appointment Form</h2> 
            <div id="wrapper">
            <form action="" method="post" autocomplete="off">
                <label>Patient Name:</label>
                <input type="text" name ="patient_name" placeholder="Full Name" required><br><br>

	            <label>Age:</label>
                <input type="text" name ="age" maxlength="2" pattern="[0-9]{2}" placeholder="Patient Age" required><br><br>

	            <label>Location:</label>
                <input type="text" name="location" placeholder="Location" required><br><br>

                <label>Appointment Time:</label>
                <input type="time" name ="time" required><br>
	            <span style="color:red;font-size:small;">(Plase select the time between 10AM to 5PM)</span><br><br>

	            <label>Mobile No</label>
                <input type="text" name="country code"  value="+91" size="2" readonly/> 
                <input type="text" name="mobile_no" pattern="[0-9]{10}" placeholder="Mobile No" minlength="10" maxlength="10" required><br><br>

                <button type="submit" name = "fsubmit">Submit</button>
            </form>
        </div>
    </body>
</html>

<?php
include 'connection.php';

if(isset($_POST['fsubmit']))
{
$patientname = $_POST['patient_name'];
$age = $_POST['age'];
$loc = $_POST['location'];
$time = $_POST['time'];
$mobile_no = $_POST['mobile_no'];

$insertquery = "insert into forms(patient_name,age,location,appointment_time,mobile_no) 
values('$patientname','$age','$loc','$time','$mobile_no')";

$res = mysqli_query($con,$insertquery);

if($res)
{
        ?>
        <script type="text/javascript">
        alert("Your appointment is scheduled");
        window.location.href = "home.php";
        </script>
        <?php
}
else
{
    ?>
    <script>
    alert("Plase Try Again");
    </script>
    <?php
}
}

?>