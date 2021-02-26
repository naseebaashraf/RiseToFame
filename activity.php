<?php 
 session_start();
 $email=$_SESSION['email'];
 include 'userheader.php';
 include '../connection.php';
 $q="select * from tbl_users where email='$email'";
 $s= mysqli_query($conn, $q);
 $r= mysqli_fetch_array($s);
 ?>

  <?php
        $q="select * from tbl_post where  status='1' and email = '$email' order by date desc";
        $s= mysqli_query($conn, $q);?>
<div style="margin: 10px 70px 10px 70px;  padding: 10px;">
    
        <?php
        while ($r= mysqli_fetch_array($s))
        {
            echo '<div style="padding: 10px ; box-shadow: 10px 10px 10px 5px #888888;  margin: 30px 30px 0px 30px; background-color:white; border-radius:10px;">';
            $ex = substr($r['file'], -4);
            
            
            $q1="select * from tbl_users where  email ='".$r['email']."'";
//            echo $q1;
            $s1= mysqli_query($conn, $q1);
            $r1=mysqli_fetch_array($s1);
            
            
            //////Profile pic
            echo '<div><img src="../'.$r1['pro_pic'].'" height="50px" width="50px" style="box-shadow: 5px 5px 10px 3px #888888; margin:5px; border-radius: 50%; border-color: #939393; border-width: 5px; border-style: solid;">'
                    . '<p style="margin: -40px 5px 50px 70px;"><b>'.$r1['name'].'</b> added a post on '.$r['date'].'</p></div>';
            
            //////Details
            echo '<div style="padding: 5px; margin: 5px 10px 5px 10px; ">'.$r['details'].'</div>';
            
            
            //////File
            if($ex==".jpg" || $ex=="jpeg" || $ex==".gif" || $ex==".bmp")
                echo '<div style="padding: 20px; margin: 10px;"><a href="'.$r['file'].'"><img src="'.$r['file'].'"  height="400px" width="500px"></a></div>';
            else if($ex=="mpeg" || $ex==".mp4" || $ex==".mov" )
                echo '<div style="padding: 20px; margin: 10px;">'
                .'<video style="height: 400px; width:500px;"  controls="controls">
                <source src="'.$r['file'].'" type="video/mp4">
            </video></div>';
            
            ////////Like
            
            
            echo '<div style="padding: 10px; margin: 10px;" >';
            
            $q1="select `like` from tbl_like where  email ='".$email."' and post_id='".$r['post_id']."'";
            $s1= mysqli_query($conn, $q1);
            $r2=mysqli_num_rows($s1);
//            echo $q1;
//            echo $r2;
            if($r2==0)//no like and dislike
            {
                echo '<a href="#"><img src="images/GAME-EXPAND_heart_line-512.png" width="50px" height="50px"></a>';
                echo '<span style="margin-left:3px">'.$r['likes'].'</span>';
                echo '<a href="#"><img src="images/18-512.png" width="55px" height="47px"></a>';
                echo '<span style="margin-left:3px">'.$r['dislikes'].'</span>';
            }
            else if($r2>0)//there is a reaction
            {   
                
                $r1=mysqli_fetch_array($s1);
                if($r1['like']=="like")//if it is like
                {
                    echo  '<a href="#"><img src="images/Instagram-Like-Icon.png" width="45px" height="45px"></a>';
                    echo '<span style="margin-left:3px">'.$r['likes'].'</span>';
                    echo '<a href="#"><img src="images/18-512.png" width="55px" height="47px"></a>';
                    echo '<span style="margin-left:3px">'.$r['dislikes'].'</span>';
                }
                else if($r1['like']=="dislike")//if it is dislike
                {
                    echo '<a href="#"><img src="images/GAME-EXPAND_heart_line-512.png" width="50px" height="50px"></a>';
                    echo '<span style="margin-left:3px">'.$r['likes'].'</span>';
                    echo '<a href="#"><img src="images/183-1831107_broken-heart-icon-heart-broken-heart-png.png" width="50px" height="50px"></a>';
                    echo '<span style="margin-left:3px">'.$r['dislikes'].'</span>';
                }
            }
            echo '</div>';
            
            
            ///////comments
            $q2="select tbl_users.name,tbl_comment.com from tbl_users,tbl_comment where tbl_comment.post_id='".$r['post_id']."' and tbl_comment.email=tbl_users.email order by tbl_comment.comment_id limit  2";
            $s2 =mysqli_query($conn, $q2);
//            echo $q2;
            while($r2=mysqli_fetch_array($s2))
            {
                echo '<div style="margin:10px;">';
                echo $r2[0].' : '.$r2[1];
                echo '</div>';
            }
            $q3="select * from tbl_comment where post_id='".$r['post_id']."'";
//            echo $q3;
            $s3=mysqli_query($conn,$q3);
            $r3= mysqli_num_rows($s3);
            if($r3>2)
            {
                echo '<a href="viewmore.php?id='.$r['post_id'].'" style="margin:30px; color:grey;">View all comments</a>';
            }
            echo '<form method="POST" style="margin: 10px" action="comment.php" >';
            echo '<div><input type="text" placeholder="Enter your comment..."  class="form-control" name="com'.$r['post_id'].'" /><input type="text" hidden name="postid'.$r['post_id'].'" id="postid" value="'.$r['post_id'].'">'
            . '<input style="margin: 10px ; width: 550px; height: 45px; background-color: #2d2d61; color: white; border: none; border-radius:10px;" name="btnSubmit" id="btnSubmit" type="submit" value="Comment"></div></form>';
            
            echo '</div>';
        }
        ?>
    
</div>       
