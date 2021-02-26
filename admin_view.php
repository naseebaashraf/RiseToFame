<?php
include 'adminbase.php';
include '../connection.php';
?>
<style>
    th{
        background-color: white;
        color: black;
    }
    td,th{
        padding: 7px;
    }
</style>
<a href="statistics.php">View statistics</a>
<table border='1'   style="width: 450px; ">
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CONTACT</th>
             
            <th colspan="3">IMAGE</th>
        </tr>
        <?php
        $q="select * from tbl_users where email in(select email from tbl_login where status='1')";
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            echo '<tr>';
            echo '<td>'.$r['name'].'</td>';
             echo '<td>'.$r['email'].'</td>';
            echo '<td>'.$r['contact'].'</td>';
           
            echo '<td><img src="../'.$r['pro_pic'].'" height="100px" width="100px"></td>';
            
            echo '</tr>';
        }
        ?>
    </table>

     