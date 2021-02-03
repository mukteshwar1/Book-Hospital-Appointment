<!DOCTYPE html>
<html>
    <head>
        <title>
            Register
        </title>
    </head>
    <body style="background-color:rgba( 71, 147, 227, 1);">
        <div id="wrapper">
            <div id="header">
                <h2>User Registration</h2>
            </div>
            <div>
                <form action="" method="post" autocomplete="off">

                <label>Username</label><br>
                <input type="text" name="user_name" required><br><br>

                <label>Password</label><br>
                <input type="password" name="password" maxlength="8" required><br><br>

                <label>Email Address</label><br>
                <input type="email" name="email" required><br><br>

                <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$name = $_POST['user_name'];
$pass = $_POST['password'];
$email = $_POST['email'];

$selectquery = "select * from user_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($name == $res['user_name'] && $pass == $res['user_pass'])
            {              
                $no = 1;                
            }
        }
    if($no==1)
    {     
        ?>
        <script>
        alert("Wrong Credentials");
        </script>
        <?php
    
    }
    else
    {
        $qy = "insert into user_login(user_name,user_pass,email) values ('$name','$pass','$email')";
        $msg = mysqli_query($con,$qy);
        if($msg)
        {
        ?>
        <script type="text/javascript">
        alert("Registration successful");
        window.location.href = "user_Login.php";
        </script>
        <?php
        }

    }

}
