<?php
session_start();
include '../connection.php';
$email=$_SESSION['email'];
$pid=$_GET['pid'];
$sql="INSERT INTO tbl_order(product_id,date,buyer,status)VALUES('$pid',(select sysdate()),'$email','ordered')";
   echo $sql;
        $s=mysqli_query($conn,$sql);
        if($s)
        echo '<script>location.href="myorders.php"</script>';
?>



    
   
    

    
   
            