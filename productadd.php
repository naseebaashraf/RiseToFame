<?php
session_start();
include 'userheader.php';
include '../connection.php';
$email=$_SESSION['email'];
?>
<style>
     th{
        background-color: #b902fd;
        padding: 5px 5px 5px 5px;
        color: white;
    }
     td{
         padding: 10px;
    }
</style>
<body>
    <h1>ADD THE ITEM TO BE SOLD</h1>
    <form method='POST' enctype="multipart/form-data">

        
            <table>
                <div>
            
            
            <tr>
                <td>PRODUCT NAME</td>
                <td><input type="text" name="product_name" class="form-control" placeholder="Product name" required=""></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><input type="text" name="description" class="form-control" placeholder="description" required=""></td>
            </tr>
            <tr>
                <td>RATE</td>
                <td><input type="text" name="rate" class="form-control" placeholder="rate" required=""></td>
            </tr>
             <tr>
            <td>UPLOAD IMAGE</td>
             <td><input type="file" name="file" class="form-control"/></td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="submit" style="margin:50px; width: 550px; height: 45px; background-color: #2d2d61; color: white; border: none; border-radius:10px;" value="Add item to listing"></center></td>
            </tr>

           
<?php
if(isset($_POST['submit']))
{
    
    $pdt=$_POST['product_name'];
    $des=$_POST['description'];
    $rate=$_POST['rate'];

    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);
   $sql="INSERT INTO tbl_product(email,product_name,description,rate,image,status)VALUES('$email','$pdt','$des','$rate','$file','1')";
   echo $sql;
        if($conn->query($sql)==TRUE)
            {
                   echo '<script>alert("product inserted")</script>';
                   echo '<script>location.href="listings.php"</script>';
            }
        else
           {
                   echo '<script>alert("insertion failed")</script>';
           }
 
      $conn->close();
  }

   

