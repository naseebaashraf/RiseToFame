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
        <h3 class="agile-title text-uppercase">VIEW POST.....</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">

<div style="margin-left: 50px; margin-center: 150px; ">
    <table border='1' style="margin-center: 150px; margin-center: 250px; width: 450px; ">
        <tr>
            <th>EMAIL</th>
            <th>DATE</th>
            <th>CATEGORY ID</th>
            <th>DETAILS</th>
            <th colspan="5">FILE</th>
        
            
        
    
            <img src="https://img.icons8.com/emoji/48/000000/red-heart.png">
            <img src="https://img.icons8.com/emoji/48/000000/broken-heart.png">
            
            <div class="textbox">
                
               <input type="comment" placeholder="Comment your Views" name="comment" value=""  class="form-control"></div>
               
            <input class="btn" type="submit" class="btn btn-danger" id="btn" name="" value="COMMENT">
        </tr>
       
        <?php
        $q="select * from tbl_post where  status='1' and email <> '$email'";
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            echo '<tr>';
            echo '<td>'.$r['email'].'</td>';
            echo '<td>'.$r['date'].'</td>';
            echo '<td>'.$r['cat_id'].'</td>';
            echo '<td>'.$r['details'].'</td>';
            
           
            echo '<td><img src="'.$r['file'].'"  height="150px" width="250px"></td>';

        
            
            echo '</tr>';
        }
        ?>
       
    </table>
</div>
<?php
if(isset($_POST['submit']))
{
   
    $email=$_POST['email'];
    $date=$_POST['date'];
    $cat_id=$_POST['catid'];
    $details=$_POST['details'];
    
    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);

    $q="select count(*) from tbl_post where email='$email',date='$date',catid='$cat_id',details='$details',file='$file'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
    $q="insert into tbl_post(file,status)values('$file','1')";
    $s=mysqli_query($conn,$q);
    echo $s;
    if($s)
    {
        
        echo '<script>location.href=".php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="home.php"</script>';
    }
    }
}
?>