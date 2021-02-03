<!DOCTYPE html>
<html>
    <head>
        <title>
            forgot password
        </title>
    </head>
    <body style="background-color:rgba( 71, 147, 227, 1);">
        <div id="wrapper">
            <form action="" method="post" autocomplete="off">
            <h2>Forgot Password</h2><br>

            <label>Username</label><br>
            <input type="text" name="uname" required><br><br>
            
            <label>Gmail</label><br>
            <input type="email" name="uemail" required><br><br>
            
            <button type="submit" name="submit1">Submit</button>
            </form>
        </div>
    </body>
</html>

<?php

include 'connection.php';
if(isset($_POST['submit1']))
{
$em = $_POST['uemail'];
$name = $_POST['uname'];

$selectquery = "select * from user_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($em == $res['email'] && $name == $res['user_name'])
            {              
                $no = 1;                
            }
        }
    if($no==1)
    {     
        $squery="SELECT `user_pass` FROM `user_login` WHERE email='$em' AND user_name='$name'"; 
        $res = mysqli_query($con,$squery);
        $msg = mysqli_fetch_array($res);
        $name = $msg['user_pass'];
        echo "<script type='text/javascript'>alert('Password: '+'$name');</script>"; 

        ?>
        <script type="text/javascript">
        window.location.href = "user_Login.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
        alert("Not match enail or Username");
        </script>
        <?php

    }

}