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
        <h3 class="agile-title text-uppercase">POST</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">

<div style="margin-left: 50px; margin-top: 50px; ">
    <table border='1' style="margin-top: 50px; margin-center: 120px; width: 300px; ">
        <tr>
            <th colspan="7">FILE</th>
            <th>EMAIL</th>
            <th>DATE</th>
        </tr>

        <?php
        $q="select * from tbl_post where  status='1' and email <> '$email'";
        $s= mysqli_query($conn, $q);
        while ($r= mysqli_fetch_array($s))
        {
            
            echo '<tr>';
            echo '<td><img src="'.$r['file'].'"  height="150px" width="300px"></td>';
            echo '<td>'.$r['email'].'</td>';
            echo '<td>'.$r['date'].'</td>';
           
            echo '<td><a href="view_details.php?pid='.$r['post_id'].'">View Details</a></td>';
            
            echo '</tr>';
        }
        ?>
       
    </table>
</div>
<?php
if(isset($_POST['submit']))
{
   
    
    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);
    {
     echo "<img src=".$file." height=200 width=300 />";
    } 
    
    $email= $_REQUEST['email'];
    $date= $_REQUEST['date'];
   
    $q="select count(*) from tbl_post where file='$file',email='$email',date='$date'";
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
        echo '<script>alert("item added")</script>';
        echo '<script>location.href="userpost.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="home.php"</script>';
    }
    }
}
?>