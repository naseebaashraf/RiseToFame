<?php
session_start();
include 'userheader.php';
include '../connection.php';
$email=$_SESSION['email'];
?> 
<style>
    td{
        padding: 10px;
    }
</style>
<div style="margin-left: 50px; margin-center: 150px; ">
    <table style="margin-center: 150px; margin-center: 250px; width: 650px; ">
<!--        <tr>
            
            
            <th>PRODUCT NAME</th>
            <th>DESCRIPTION</th>
            <th>RATE</th>
            <th colspan="5">IMAGE</th>
        </tr>-->
        
        <?php
        $q="select * from tbl_product where  status='1' and email = '$email'";
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
             echo '<tr><td><img src="'.$r['image'].'"  height="150px" width="250px"></td></tr>';
            echo '<tr>';
           
            echo '<td>'.$r['product_name'].'</td><tr>';
            echo '<tr><td>'.$r['description'].'</td></tr>';
            echo '<tr><td>'.$r['rate'].'</td></tr>';
           
           

           
            echo '<tr><td><a href="productupdate.php?pid='.$r['product_id'].'" style="color:Blue;">Update  /  </a>';
            echo '<a href="productdelete.php?pid='.$r['product_id'].'" style="color:Blue;">Delete</a></td></tr>';
             echo '<tr><td>_______________________________________________________________________________________________________</td></tr>';
           
        }
        ?>
    </table>


    