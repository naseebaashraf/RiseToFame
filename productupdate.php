<?php
include '../connection.php';
include 'userheader.php';
session_start();
$email=$_SESSION['email'];
$pid=$_GET['pid'];
  $q="select * from tbl_product where product_id='$pid'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
?>
<style>
    th{
        background-color: #b213ee;
        color: white;
    }
    td,th{
        padding: 7px;
    }
</style>
<div style="margin-top: 50px; margin-left: 150px; ">
    <form method="POST">
    <table>
            <div>
            
            
            <tr>
                <td>PRODUCT NAME</td>
                <td><input type="text" name="product_name" class="form-control" value="<?php echo $r['product_name']; ?>" placeholder="Product name" required=""></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><input type="text" name="description" class="form-control" value="<?php echo $r['description']; ?>" placeholder="description" required=""></td>
            </tr>
            <tr>
                <td>RATE</td>
                <td><input type="text" name="rate" class="form-control" placeholder="rate" value="<?php echo $r['rate']; ?>" required=""></td>
            </tr>
            
            <tr>
                <td colspan="2"><center><input type="submit" name="submit" style="margin:50px; width: 450px; height: 45px; background-color: #2d2d61; color: white; border: none; border-radius:10px;" value="Update listing"></center></td>
            </tr>
        </table>
</form>

    <?php
if(isset($_REQUEST['submit']))
{
     
     $pdt=$_POST['product_name'];
     $des=$_POST['description'];
     $rate=$_POST['rate'];
    
    
    
        echo $q="update tbl_product set email='$email',product_name='$pdt', description='$des',rate='$rate' where product_id='$pid'";
        $s= mysqli_query($conn, $q);
        if($s)
        {
            echo '<script>alert("Data updated")</script>';
            echo '<script>location.href="listings.php"</script>';
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
        }
   
}
?>
