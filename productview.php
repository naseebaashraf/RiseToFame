<?php
include '../connection.php';
include 'userheader.php';
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
    td{
        padding: 10px;
    }
</style>
<!--/banner-section-->
   
    <!-- contact -->
    <div class="container py-lg-5 mt-sm-5 mt-3">
        <h3 class="agile-title text-uppercase">Items You Are Looking For!!!</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">

<div style="margin-left: 50px; margin-center: 150px; ">
    <table border='0' style="margin-center: 150px; margin-center: 250px; width: 450px; ">
<!--        <tr>
            <th>PRODUCT</th>
            <th>EMAIL ID</th>
            <th>PRODUCT NAME</th>
            <th>DESCRIPTION</th>
            <th>RATE</th>
            <th colspan="5">IMAGE</th>
        </tr>-->
       
        <?php
        $q="select tbl_product.*,tbl_users.name from tbl_product,tbl_users where  tbl_product.status='1' and tbl_product.email <> '$email' and tbl_product.email=tbl_users.email";
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            echo '<tr><td><img src="'.$r['image'].'"  height="150px" width="250px"></td></tr>';
            echo '<tr>';
//            echo '<td>'.$r['product_id'].'</td></tr>';
            echo '<tr><td>'.$r['name'].'</td></tr>';
            echo '<tr><td>'.$r['product_name'].'</td></tr>';
            echo '<tr><td>'.$r['description'].'</td></tr>';
            echo '<tr><td>'.$r['rate'].'</td></tr>';
           
            

            


            echo '<tr><td><a href="order.php?pid='.$r['product_id'].'" style="color:Blue;">ORDER NOW!!</a></td>';
            
            echo '</tr>';
            echo '<tr><td>_______________________________________________________________________________________________________</td></tr>';
        }
        ?>
       
    </table>
</div>
<?php
if(isset($_POST['submit']))
{
   
    $pdt=$_POST['product_name'];
    $des=$_POST['description'];
    $rate=$_POST['rate'];
    
    
    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);

    $q="select count(*) from tbl_product where product_id='$pid',email='$email',product_name='$pdt',description='$des',rate='$rate', image='$file'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
    $q="insert into tbl_product(image,status)values('$file','1')";
    $s=mysqli_query($conn,$q);
    echo $s;
    if($s)
    {
        echo '<script>alert("item added")</script>';
        echo '<script>location.href="productadd.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="home.php"</script>';
    }
    }
}
?>