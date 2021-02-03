<!DOCTYPE html>
<html>
<head>
    <title>
        forgot username
    </title>
</head>
<body style="background-color:rgba( 71, 147, 227, 1);">
    <div id="wrapper">
        <form action="" method="post" autocomplete="off">
        <h2>Forgot Adminname</h2><br>
        <label">Hospital Id</label><br>
        <input type="number" name="hid" maxlength="9" required><br><br>
        <label">Password</label><br>
        <input type="password" name="apass" maxlength="8" required><br><br>
        <button type="submit" name="submit2">Submit</button>
        </form>
    </div>
</body>
</html>


<?php

include 'connection.php';
if(isset($_POST['submit2']))
{
$aid = $_POST['hid'];
$pass = $_POST['apass'];

$selectquery = "select * from admin_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($aid == $res['id'] && $pass == $res['admin_pass'])
            {              
                $no = 1;                
            }
        }
    if($no==1)
    {     
        $squery="SELECT `admin_name` FROM `admin_login` WHERE id='$aid' AND admin_pass='$pass'"; 
        $res = mysqli_query($con,$squery);
        $msg = mysqli_fetch_array($res);
        $name = $msg['admin_name'];
        echo "<script type='text/javascript'>alert('Admin name: '+'$name');</script>"; 

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
        alert("Not match Hospital ID or password");
        </script>
        <?php

    }

}
