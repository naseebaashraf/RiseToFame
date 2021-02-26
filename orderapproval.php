<?php
include '../connection.php';
$pid=$_GET['pid'];
$status=$_GET['status'];
$q="update tbl_order set status='$status' where product_id='$pid'";
$s= mysqli_query($conn, $q);
echo '<script>location.href="incomingorder.php"</script>';
?>

