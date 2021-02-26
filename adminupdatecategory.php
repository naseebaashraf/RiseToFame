<?php
include '../connection.php';
include 'adminbase.php';
$catid=$_GET['cat_id'];
$q="select * from tbl_category where cat_id='$catid'";
$s=  mysqli_query($conn,$q);
$r=  mysqli_fetch_array($s);
?>

 
    <!-- contact -->
    <div class="container py-lg-5 mt-sm-5 mt-3">
        <h3 class="agile-title text-uppercase">Category</h3>
        <span class="w3-line"></span>
        <div class="row py-md-5 py-sm-3">
            <div class="col-md-6">
                <form id="contact-form" name="myForm" class="form"  method="POST">
                    <div class="form-group">
                        <label class="form-label" id="nameLabel" for="Category"></label>
                        <input type="text" class="form-control" id="name" name="category" value="<?php echo $r[1]; ?>" placeholder="Category" tabindex="1">
                    </div>
                   
                    <div class="text-center mt-5">
                        <button type="submit" name="btnSubmit" class="serv_bottom btn btn-border btn-lg w-100">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

	
<?php
if(isset($_REQUEST['btnSubmit']))
{
    $cat=$_REQUEST['category'];
    
        $q="update tbl_category set category='$cat' where cat_id='$catid'";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        echo '<script>alert("Category updated")</script>';
        echo '<script>location.href="admincategory.php"</script>';
    }
    
}
?>
