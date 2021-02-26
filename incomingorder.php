<?php
include '../connection.php';
include 'userheader.php';
session_start();
 $email=$_SESSION['email'];
?>

<style>
     th{
        background-color: #2d2d61;
        padding: 5px 5px 5px 5px;
        color: white;
    }
    th, td{
         padding: 10px;
    }
</style>
<!--/banner-section-->
  
    <!-- contact -->
    <div class="container py-lg-5 mt-sm-5 mt-3">
        <h3 class="agile-title text-uppercase">Orders!!!</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">

<div style="margin-left: 50px; margin-center: 150px; ">
    <table border='1' style="margin-center: 150px; margin-center: 250px; width: 650px; ">
        <tr>
            <th>Order Id</th>
            <th>Product_Id</th>
            <th>Seller Name</th>
            <th>Contact</th>
            <th>Date</th>
            <th colspan="3">Status</th>

            
        </tr>
       
        <?php
        //$q="select tbl_order.*,tbl_product.* from tbl_order,tbl_product where tbl_product.product_id in(select product_id from tbl_product where email = '$email')and tbl_product.product_id=tbl_order.product_id";

        $q="select tbl_order.*,tbl_product.*,tbl_users.* from tbl_users, tbl_order,tbl_product where tbl_product.email='$email' and tbl_product.product_id=tbl_order.product_id and tbl_order.status='ordered' and tbl_order.buyer=tbl_users.email";

        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            echo '<tr>';
            echo '<td>'.$r['order_id'].'</td>';
            echo '<td>'.$r['product_name'].'</td>';
            echo '<td>'.$r['name'].'</td>';
            echo '<td>'.$r['contact'].'</td>';
            echo '<td>'.$r['date'].'</td>';
            echo '<td>'.$r[4].'</td>';



            echo '<td><a href="orderapproval.php?pid='.$r['product_id'].'&status=approved">Approve</a></td>';
            echo '<td><a href="orderapproval.php?pid='.$r['product_id'].'&status=rejected">Reject</a></td>';
           
           
           
            echo '</tr>';
        }
        ?>
       
    </table>
</div>
