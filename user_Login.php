<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="background-color:rgba( 71, 147, 227, 1);">
<div id="wrapper">
    <div id="header">
        <h1 style="background-color: darkgray; text-align: center;">User Login</h1>
    </div>
    <div>
        <form action="" method="post" autocomplete="off">

        <span id="massage" style="color:red;font-size: 15px;"></span><br>

        <label>User Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" maxlength="8";required><br><br>

        <button type="submit" name="submit">Login</button><br><br>

        <a href="uforgot_choise.php" name="user_forgot_link">Forgot Username/Password</a>
        <p>Or</p>
        <a href="user_registration_form.php" name="user_new_link">New User</a>
        </form>
    </div>
</div>
</header>
</body>
</html>

<?php
include 'connection.php';


if(isset($_POST['submit']))
{
$name = $_POST['name'];
$pass = $_POST['password'];

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
       header("Location: application_form.php");
        exit();
    }
    else
    {

        ?>
        <script>
        document.getElementById("massage").innerHTML="Note: Wrong Username or Password";
        </script>
        <?php
        
    }

}

?>