<?php
include 'connection.php';
session_start();
 $email=$_SESSION['email'];
?>

<style>
    #data th{
        background-color: #b902fd;
        padding: 5px 5px 5px 5px;
        color: white;
    }
    #data td{
         padding: 5px 5px 5px 5px;
    }
</style>
<!--/banner-section-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="home.php">Home</a>
             </li>
           
            <li class="breadcrumb-item">
            <a href="logout.php">logout</a></li>
        </ol>
    </nav>
    <!-- contact -->
    <div class="container py-lg-5 mt-sm-5 mt-3">
        <h3 class="agile-title text-uppercase">Items ur looking for!!!</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">

<div style="margin-left: 50px; margin-center: 150px; ">
    <table border='1' style="margin-center: 150px; margin-center: 250px; width: 450px; ">
        <tr>
            <th>Order Id</th>
            <th>Product_Id</th>
            <th>Date</th>
            

            
        </tr>
       
        <?php
        //$q="select tbl_order.*,tbl_product.* from tbl_order,tbl_product where tbl_product.product_id in(select product_id from tbl_product where email = '$email')and tbl_product.product_id=tbl_order.product_id";

       $q="select tbl_order.*,tbl_product.* from tbl_order,tbl_product where tbl_order.buyer='$email' and tbl_product.product_id=tbl_order.product_id and tbl_order.status='approved'"; 
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            echo '<tr>';
            echo '<td>'.$r['order_id'].'</td>';
            echo '<td>'.$r['product_name'].'</td>';
            echo '<td>'.$r['date'].'</td>';
            
       echo '</tr>';
        }
        ?>
       
    </table>
</div>
