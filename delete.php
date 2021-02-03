<?php
include 'connection.php';
$id = $_GET['did'];
$deltequery = "delete from forms where id='$id'";
$query = mysqli_query($con,$deltequery);
?>
<script type="text/javascript">
alert("One record deleted");
window.location.href = "display.php";
</script>
<?php

?>