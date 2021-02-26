<?php
include '../connection.php';
include 'adminbase.php';
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

    <!-- contact -->
    <div class="container py-lg-5 mt-sm-5 mt-3">
        <h3 class="agile-title text-uppercase">Category</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">
            <div class="col-md-6">
                <form id="contact-form" name="myForm" class="form"  method="POST">
                    <div class="form-group">
                        <label class="form-label" id="nameLabel" for="Category"></label>
                        <input type="text" class="form-control" id="name" name="category" placeholder="Category" tabindex="1">
                    </div>
                   
                    <div class="text-center mt-5">
                        <button type="submit" name="btnSubmit" class="serv_bottom btn btn-border btn-lg w-100">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 map mt-md-0 mt-5">
                
              <table id="data" border="1" style="width:450px; margin-left:-550px; margin-top:125px;">
                                                           
                                                            <th>ID</th>
                                                            <th colspan="3">CATEGORY</th>
                                                       
                                                               <?php
                                                                $q="select * from tbl_category where status='1'";
                                                                //echo $q;
                                                                $s=mysqli_query($conn,$q);
                                                               while($r=mysqli_fetch_array($s))
                                                                echo '<tr><td>'.$r[0].'</td>'. '<td>'.$r[1].'</td>'
                                                                . '<td><a href="admindeletecategory.php?cat_id='.$r[0].'">Delete</a></td>'
                                                                . '<td><a href="adminupdatecategory.php?cat_id='.$r[0].'">Update</a></td></tr>';
                                                                    ?>
                                                            </table>
            </div>
        </div>
    </div>


<?php
if(isset($_REQUEST['btnSubmit']))
{
    $cat=$_REQUEST['category'];
    $q="select count(*) from tbl_category where category='$cat' and status='1'";
    $s=mysqli_query($conn,$q);
    $r=mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
    $q="insert into tbl_category(category,status)values('$cat','1')";
    $s=mysqli_query($conn,$q);
    echo $s;
    if($s)
    {
        echo '<script>alert("Category added")</script>';
        echo '<script>location.href="admincategory.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="admincategory.php"</script>';
    }
    }
}
?>
<?php
//include 'footer.php';
?>