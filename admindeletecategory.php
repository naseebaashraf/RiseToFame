<?php
include '../connection.php';
$catid=$_GET['cat_id'];
$q="update tbl_category set status='0' where cat_id='$catid'";
$s=  mysqli_query($conn,$q);
if($s)
{
    echo '<script>alert("Category deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
 
}
 echo '<script>location.href="admincategory.php"</script>';
?>