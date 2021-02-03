<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="background-color:rgba( 71, 147, 227, 1);">
<div id="wrapper">
    <div id="header">
        <h1 style="background-color: darkgray; text-align: center;">Admin Login</h1>
    </div>
    <div>
        <form action="" method="post" autocomplete="off">

        <span id="massage" style="color:red;font-size: 15px;"></span><br>
        
        <label>Admin Name:</label><br>
        <input type="text" name="admin_name" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="admin_password" maxlength="8" required><br><br>

        <a href="aforgot_choise.php" id="admin_new_link">Forgot Admin name/Password</a><br><br>

        <button type="submit" name="submit">Login</button><br>
        <p>Or</p>
        <a href="admin_registration_form.php" name="admin_new_link">New Admin</a><br>
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
$name = $_POST['admin_name'];
$pass = $_POST['admin_password'];

$selectquery = "select * from admin_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($name == $res['admin_name'] && $pass == $res['admin_pass'])
            {
                $no = 1;
            }
        }
    if($no==1)
    {
        header("Location: display.php");
    }
    else
    {
            ?>
            <script>
            document.getElementById("massage").innerHTML="Note: Wrong Adminname or Password";
            </script>
            <?php
    }

}

?>