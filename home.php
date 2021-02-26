<?php 
 session_start();
 include 'connection.php';
 ?>

 
<!--Head fb text-->

<!--text: faceback -->
	<div style="position:absolute;left:36%; top:3.3%; font-size:45; font-weight:900; color:black; font-weight:bold; box-shadow:0px -10px 20px 1px rgb(0,0,0);"> <font face="myFbFont"> Rise To Fame  </font> </div>

<!--Head fb text background-->


       
<div style="display:none" id="option">


        <div style="position:fixed; left:85%; top:6%; z-index:3; background:#FFF; height:32%; width:14.8%; box-shadow:0px 2px 10px 1px rgb(0,0,0);"> </div>
        
         <div style="position:fixed; left:86%; top:8.5%; z-index:3;">
        <a href="../fb_profile/Profile.php"> <img src="img/timeline.png" width="16" height="16" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()"></a>
        </div>
        <div style="position:fixed; left:88%; top:5%; z-index:3;">
                 <a href="../fb_profile/Profile.php" style="text-decoration:none; color:#000;" id="head_timeline" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()" ><h4>Timeline</h4></a> 
        </div>
        <div style="position:fixed; left:86%; top:13.5%; z-index:3;">
             <a href="../fb_profile/about.php"> <img src="img/about.png" onMouseOver="head_about_over()" onMouseOut="head_about_out()"> </a>
        </div> 
        <div style="position:fixed; left:88%; top:10%; z-index:3;">
                <a href="../fb_profile/about.php" style="text-decoration:none; color:#000;" id="head_about" onMouseOver="head_about_over()" onMouseOut="head_about_out()"><h4>About</h4></a> 
        </div>
        
        <div style="position:fixed; left:85.8%; top:18%; z-index:3;"> <a href="../fb_profile/photos.php"> <img src="img/photo&video.PNG" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:15%; z-index:3;"><a href="../fb_profile/photos.php" style="text-decoration:none; color:#000;" id="head_photos" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()"><h4>Photos</h4></a></div>

	<div style="position:fixed; left:85.8%; top:23%; z-index:3;"> <a href="Settings.php"> <img src="img/settings2.png" height="25" width="23" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"> </a> </div>
<div style="position:fixed; left:88.2%; top:20%; z-index:3;"><a href="Settings.php" style="text-decoration:none; color:#000;" id="head_settings" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"><h4> Account Settings </h4></a></div>

<div style="position:fixed; left:86.1%; top:27.5%; z-index:3;"> <a href="feedback.php"> <img src="background_file/background_icons/icon-feedback.png" height="20" width="20" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:24.5%; z-index:3;"><a href="feedback.php" style="text-decoration:none; color:#000;" id="head_feedback" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"><h4> Feedback </h4></a></div>



<div style="position:fixed; left:86%; top:32.5%; z-index:3;"> <a href="../fb_logout/logout.php"> <img src="background_file/background_icons/logout.png" height="20" width="20"  onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"> </a> </div>
<div style="position:fixed; left:88.3%; top:29.1%; z-index:3;"><a href="../fb_logout/logout.php" style="text-decoration:none; color:black;" id="head_logout" onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"><h4> Logout </h4></a></div>
</div>
           
        
        
        
        
		
<!--left part-->
<center>

<div style="position:fixed; left:9%; top:33%;"> <a href="news_feed.php" style="text-decoration:none; color:#000;" id="news_feed" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> <h4>News Feed</h4> </a></div>




<div style="position:fixed; left:9%; top:37.2%;"><a href="../fb_profile/Profile.php" style="text-decoration:none; color:#000;" id="timeline" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()" ><h4>Timeline</h4></a></div>




<div style="position:fixed; left:9%; top:41.8%;"><a href="../fb_profile/about.php" style="text-decoration:none; color:#000;" id="about" onMouseOver="left_about_over()" onMouseOut="left_about_out()"><h4>About</h4></a></div>




<div style="position:fixed; left:9%; top:46%;"><a href="/opt/lampp/htdocs/RiseToFame/images/user1.jpg" style="text-decoration:none; color:#000;" id="photos" onMouseOver="left_photos_over()" onMouseOut="left_photos_out()"><h4>Photos</h4></a></div>


<div style="position:fixed; left:9%; top:51.2%;"><a href="myorders.php" style="text-decoration:none; color:#000;" id="order" onMouseOver="left_order_over()" onMouseOut="left_order_out()"><h4>Order</h4></a></div>

<div style="position:fixed; left:9%; top:55.2%;"><a href="admin_view.php" style="text-decoration:none; color:#000;" id="view" onMouseOver="left_view_over()" onMouseOut="left_view_out()"><h4>View</h4></a></div>

<div style="position:fixed; left:9%; top:59.2%;"><a href="admincategory.php" style="text-decoration:none; color:#000;" id="view" onMouseOver="left_cat_over()" onMouseOut="left_cat_out()"><h4>Category Add</h4></a></div>


<div style="position:fixed; left:9%; top:63.5%;"><a href="Settings.php" style="text-decoration:none; color:#000;" id="settings" onMouseOver="left_settings_over()" onMouseOut="left_settings_out()"><h4>Settings</h4></a></div>
</center>




<!--Online-->
<script>
		function up_online()
		{
		 	document.getElementById("online_bg").style.display='block';
			document.getElementById("down_onlne").style.display='block';
			document.getElementById("down_onlne_img").style.display='block';
			document.getElementById("up_online").style.display='none';
			document.getElementById("up_online_img").style.display='none';
		}
		function down_online()
		{
		 	document.getElementById("online_bg").style.display='none';
			document.getElementById("down_onlne").style.display='none';
			document.getElementById("down_onlne_img").style.display='none';
			document.getElementById("up_online").style.display='block';
			document.getElementById("up_online_img").style.display='block';
		}
</script>
<div style="display:none;" id="online_bg">
<div style="position:fixed; left:84%; top:6%; background-color:#000000; opacity:0.5; height:89.2%; width:16%;"></div>

?>
