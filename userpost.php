<?php 
 session_start();
 $email=$_SESSION['email'];
 include 'userheader.php';
 include '../connection.php';
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
  
    <!-- contact -->
    <form method="POST" enctype="multipart/form-data" action="userpost.php">
    <div class="container py-lg-5 mt-sm-5 mt-3">
        
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">
            <div class="col-md-6">
                <form id="contact-form" name="myForm" class="form"  method="POST">
                    <div class="form-group">
                      <h3><center>Explore Yourself!!!!</center></h3>
                        <select class="form-control" name='cat'>

 	                                          <option>Select category</option>
                                                          <?php
                                                            $q="select * from tbl_category where status='1'";
                                                            $s= mysqli_query($conn, $q);
                                                            while($r=  mysqli_fetch_array($s))
                                                            {
                                                                echo '<option value="'.$r[0].'">'.$r[1].'</option>';
                                                            }
                                                            ?>
     <div class="drop-down">
                  <input type="textarea" name="details" placeholder="Comment your Post!!!!"  required="" value="" class="form-control" style="margin-top:10px; height: 70px;"> </div>
                  


                  <div class="file">
                   <center>Upload your Post<input type="file" name="file" class="form-control" ></center></div>

                   <input type="submit" class="btn btn-danger" id="btn" name="btn" value="Post">
               </form>


<?php
if(isset($_REQUEST['btn'])) //button click
{
    $folder='images/';
    $file=$folder.basename($_FILES['file']['name']);
   if( move_uploaded_file($_FILES['file']['tmp_name'],$file))
   {
//    {
//     echo "<img src=".$file." height=200 width=300 />";
//    } 
    
    $catid = $_REQUEST['cat'];
    $d = $_REQUEST['details'];
   
    
    
   
         $q="insert into tbl_post (email,date,cat_id,details,file,likes,dislikes,status) values('$email',(select sysdate()),'$catid','$d','$file','0','0','1')";



        $s= mysqli_query($conn, $q);
       
        
        
            if($s)
            {
                echo '<script>alert("Posted Successfully")</script>';
//                echo '<script>location.href="activity.php"</script>';
            }
            else
            {
               echo '<script>alert("Post failed")</script>'; 
            }
          
   }
    else
            {
               echo '<script>alert("Sorry we coudnt upload the file")</script>'; 
            }
    
}
?>
    