<!DOCTYPE html>
<html>
    <head>
        <title>
            Registr
        </title>
    </head>
    <body style="background-color:rgba( 71, 147, 227, 1);">
        <div id="wrapper">
            <div id="header">
                <h2>Admin Registration</h2>
            </div>
            <div>
                <form action="" method="post" autocomplete="off">

                <label>Admin name</label><br>
                <input type="text" name="admin_name" required><br><br>

                <label>Password</label><br>
                <input type="password" name="password" maxlength="8" required><br><br>

                <label>Hospital Id</label><br>
                <input type="number" name="hospital_id" maxlength="9" required><br><br>

                <button type="submit" name="asubmit">Submit</button>

              </form>
            </div>
        </div>
    </body>
</html>

<?php
include 'connection.php';

if(isset($_POST['asubmit']))
{
$name = $_POST['admin_name'];
$apass = $_POST['password'];
$id = $_POST['hospital_id'];

$selectquery = "select * from admin_login";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($name == $res['admin_name'] && $apass == $res['admin_pass'])
            {              
                $no = 1;                
            }
        }


if($no == 1)
{
    ?>
    <script>
    alert("Username and Password already prasent in Database");
    </script>
    <?php

}
else
{
    $insertquery = "insert into admin_login(admin_name,admin_pass,id) values('$name','$apass','$id')";
    $res = mysqli_query($con,$insertquery);
    if($res)
    {
        ?>
        <script type="text/javascript">
        alert("Registration successful");
        window.location.href = "admin_Login.php";
        </script>
        <?php
    }
}
}
?>