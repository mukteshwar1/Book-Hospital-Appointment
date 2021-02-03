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
            <?php
            include 'connection.php';

            $ids = $_GET['id'];

            $showquery = "select * from forms where id = $ids";
            $showdata = mysqli_query($con,$showquery);

            $arrdata = mysqli_fetch_array($showdata);


            if(isset($_POST['fsubmit']))
            {
            $idupdate = $_GET['id'];
            $patientname = $_POST['patient_name'];
            $age = $_POST['age'];
            $loc = $_POST['location'];
            $time = $_POST['time'];
            $mobile_no = $_POST['mobile_no'];


            $query = "update forms set id = '$idupdate',
            patient_name = '$patientname',age = '$age',
            location= '$loc',appointment_time='$time',mobile_no='$mobile_no' where id = '$idupdate'";

            $res = mysqli_query($con,$query);
            $no=0;
            if($res)
            {
                ?>
                <script type="text/javascript">
                alert("Data Update Successfully");
                window.location.href = "display.php";
                </script>
                <?php
                
            }
            else
            {
                ?>
                <script type="text/javascript">
                alert("Try Again");
                window.location.href = "update.php";
                </script>
                <?php
            }
            
            }
            ?>


                <label>Patient Name:</label>
                <input type="text" name ="patient_name" placeholder="Full Name" value = "<?php echo $arrdata['patient_name']; ?>" required><br><br>

	            <label>Age:</label>
                <input type="text" name ="age" maxlength="2" value = "<?php echo $arrdata['age']; ?>" pattern="[0-9]{2}" placeholder="Patient Age" required><br><br>

	            <label>Location:</label>
                <input type="text" name="location" placeholder="Location" value = "<?php echo $arrdata['location']; ?>" required><br><br>

                <label>Appointment Time:</label>
                <input type="time" name ="time" value = "<?php echo $arrdata['appointment_time']; ?>" required><br>
	            <span style="color:red;font-size:small;">(Plase select the time between 10AM to 5PM)</span><br><br>

	            <label>Mobile No</label>
                <input type="text" name="country code"  value="+91" size="2" readonly/> 
                <input type="text" name="mobile_no" value = "<?php echo $arrdata['mobile_no']; ?>" pattern="[0-9]{10}" placeholder="Mobile No" maxlength="10" required><br><br>

                <button type="submit" name = "fsubmit">Update</button>
            </form>
        </div>
    </body>
</html>

