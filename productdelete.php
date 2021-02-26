<?php
include '../connection.php';
$catid=$_GET['pid'];
$q="update tbl_product set status='0' where product_id='$catid'";
$s=  mysqli_query($conn,$q);
if($s)
{
    echo '<script>alert("item deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
 
}
 echo '<script>location.href="productadd.php"</script>';

?>

