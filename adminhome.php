<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>RISE TO FAME</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Archive Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<div class="content-main">
		<div class="container">
			<div class="col-md-3 top-left">
                            <div class="logo" style="background-color: white; border: 2px thick #334471;">
                                    <a href="../index.php"><img src="images/logo WITH CONTENTS.png" class="img-responsive" alt="" /></a>
				</div>
				<h4 class="menn">Menu</h4>
				<label></label>
				<div class="head-nav">
					<span class="menu"> </span>
						<ul>
                                                    <li class="active"><a href="adminhome.php">Home</a></li>
                                                    <li><a href="admincategory.php">Category</a></li>
                                                    <li><a href="admin_view.php">Users</a></li>
                                                    <li><a href="../login.php">Logout</a></li>
							
								<div class="clearfix"> </div>
						</ul>
						<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
				</div>
				<div class="clearfix"> </div>
				
			</div>
			<div class="col-md-9 top-right">
			<!-- banner -->
				<div class="banner">
					<div class="col-md-8 banner-left">
                                           
						<h2>Latest products</a></h2>
						<p>We are presenting here skilled artist and their arts and products for sale. We promote newly emerging artist.</p>
					</div>
					<div class="col-md-4 banner-right">
                                             <?php
                                            include '../connection.php';
                                            $sql="select image from tbl_product order by product_id desc";
   
        $s=mysqli_query($conn,$sql);
        $c=0;
       while( $r= mysqli_fetch_array($s))
       {
           if($c<3)
                                            
						echo '<img src="../'.$r[0].'" style="height:150px; width:150px;" class="img-responsive" alt="" />';
		$c++;				
                                               
                                                
       }
               ?>
					</div>
						<div class="clearfix"> </div>
				</div>
				<!-- banner -->
				<!-- welcome -->
				<div class="welcome">
					<h2><span>Welcome</span> to our site!</h2>
					</div>
				<!-- welcome-bottom -->
				</div>
			<!-- welcome -->
			
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<p>Copyrights © 2015 Archive All rights reserved |</p>
		</div>
	</div>
	<!-- footer -->
</html>
</body>