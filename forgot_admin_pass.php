<!DOCTYPE html>
<html>
    <head>
        <title>
            Forgot password
        </title>
    </head>
    <body style="background-color:rgba( 71, 147, 227, 1);">
        <div id="wrapper">
            <form action="" method="post" autocomplete="off">

            <h2>Forgot Password</h2><br>

            <label>Admin name</label><br>
            <input type="text" name="aname" required><br><br>

            <label>Hospital Id</label><br>
            <input type="number" name="hid" maxlength="9" required><br><br>

            <button type="submit" name="submit4">Submit</button>
        </form>
        </div>
    </body>
</html>


<?php

include 'connection.php';
if(isset($_POST['submit4']))
{
$name = $_POST['aname'];
$hid = $_POST['hid'];

$selectquery = "select * from admin_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($name == $res['admin_name'] && $hid == $res['id'])
            {              
                $no = 1;                
            }
        }
    if($no==1)
    {     
        $squery="SELECT `admin_pass` FROM `admin_login` WHERE admin_name='$name' AND id='$hid'"; 
        $res = mysqli_query($con,$squery);
        $msg = mysqli_fetch_array($res);
        $pass = $msg['admin_pass'];
        echo "<script type='text/javascript'>alert('Password: '+'$pass');</script>";
                ?>
                <script type="text/javascript">
                window.location.href = "admin_Login.php";
                </script>
                <?php
    }
    else
    {
        ?>
        <script>
        alert("Not match Username or Hospital ID");
        </script>
        <?php

    }

}
