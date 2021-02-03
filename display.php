
<html>
<head>
<style>
.center {
  margin: 0;
  position: absolute;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

#btn{
    background-color:rgba( 71, 147, 227, 1);
}
</style>
<?php include 'link.php'; ?>
<script>
function Print()
{
    window.print();
}
</script>
<link rel="stylesheet" href="table.css">
</head>
<body style="background-color:rgba( 71, 147, 227, 1);">
<h2>PATIENT APPOINTMENT</h2>
<p style="text-align:center;"><a href="home.php">Logout</a></p><br>

<div class="center">
<button type="button" id="btn" class="center" onclick="Print();">Print</button><br>
</div>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Sr.No.</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Location</th>
            <th>Appointment Time</th>
            <th>Mobile No</th>
            <th colspan="2">Operation</th>
        </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';

            $selectquery = "select * from forms";
            $query = mysqli_query($con,$selectquery);
            $nums = mysqli_num_rows($query);

            while($res = mysqli_fetch_array($query))
            {
                ?>
                <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['patient_name']; ?></td>
                <td><?php echo $res['age']; ?></td>
                <td><?php echo $res['location']; ?></td>
                <td><?php echo $res['appointment_time']; ?></td>
                <td><?php echo $res['mobile_no']; ?></td>
                <td title="UPDATE"><a href="update.php?id=<?php echo $res['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td title="DELETE"><a href="delete.php?did=<?php echo $res['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></td>
                </tr>

                <?php
            }
            ?>
        <tbody>
    </table>
</div>
</body>
</html>
