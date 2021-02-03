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
        <h2>Forgot Username</h2><br>
        <label>Email</label><br>
        <input type="email" name="uemail" required><br><br>
        <label>Password</label><br>
        <input type="password" name="upass" maxlength="8" required><br><br>
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
$pass = $_POST['upass'];

$selectquery = "select * from user_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($em == $res['email'] && $pass == $res['user_pass'])
            {              
                $no = 1;                
            }
        }
    if($no==1)
    {     
        $squery="SELECT `user_name` FROM `user_login` WHERE email='$em' AND user_pass='$pass'"; 
        $res = mysqli_query($con,$squery);
        $msg = mysqli_fetch_array($res);
        $name = $msg['user_name'];
        echo "<script type='text/javascript'>alert('Username: '+'$name');</script>";
        
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
        alert("Not match enail or password");
        </script>
        <?php

    }

}
