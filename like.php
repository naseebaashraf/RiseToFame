<?php
session_start();
$email=$_SESSION['email'];
include '../connection.php';
$id=$_GET['id'];
$s=$_GET['s'];
$c=$_GET['c'];
if($s=="like" && $c==0)
{
    $q="select count(*) from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    $r= mysqli_fetch_array($s);
    if($r[0]==0)
    {
    $q="insert into tbl_like(post_id,email,`like`) values('$id','$email','like')";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        $q="select likes from  tbl_post where post_id='$id'";
        $s=  mysqli_query($conn,$q);
       
        $r=mysqli_fetch_array($s);
        $like=$r[0]+1;
        $q="update tbl_post set likes='$like' where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        if($s)
        {
            echo '<script>location.href="userhome.php"</script>';
   
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
 
        }
    }
    else
    {
            echo '<script>alert("Sorry something went wrong")</script>';
 
    }  
    }
    
}
else if($s=="unlike" && $c==1)
{
    $q="select count(*) from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
    $q="delete from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        $q="select likes from  tbl_post where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        $r=mysqli_fetch_array($s);
        $like=$r[0]-1;
        $q="update tbl_post set likes='$like' where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        if($s)
        {
            echo '<script>location.href="userhome.php"</script>';
   
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
 
        }
    }
    else
    {
            echo '<script>alert("Sorry something went wrong")</script>';
 
    }
    
    }
}
else if($s=="unlike" && $c==0)
{
    $q="select count(*) from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    $r= mysqli_fetch_array($s);
    if($r[0]==0)
    {
    $q="insert into tbl_like(post_id,email,`like`) values('$id','$email','dislike')";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        $q="select dislikes from  tbl_post where post_id='$id'";
        $s=  mysqli_query($conn,$q);
       
        $r=mysqli_fetch_array($s);
        $like=$r[0]+1;
        $q="update tbl_post set dislikes='$like' where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        if($s)
        {
            echo '<script>location.href="userhome.php"</script>';
   
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
 
        }
    }
    else
    {
            echo '<script>alert("Sorry something went wrong")</script>';
 
    }  
    }
    
}
else if($s=="like" && $c==1)
{
    $q="select count(*) from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
    $q="delete from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        $q="select dislikes from  tbl_post where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        $r=mysqli_fetch_array($s);
        $like=$r[0]-1;
        $q="update tbl_post set dislikes='$like' where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        if($s)
        {
            echo '<script>location.href="userhome.php"</script>';
   
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
 
        }
    }
    else
    {
            echo '<script>alert("Sorry something went wrong")</script>';
 
    } 
    }
}
else if($s=="unlike" && $c==2)
{
    $q="select count(*) from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)
    {
    $q="delete from tbl_like where post_id='$id' and email='$email'";
    $s=  mysqli_query($conn,$q);
    if($s)
    {
        $q="select dislikes from  tbl_post where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        $r=mysqli_fetch_array($s);
        $like=$r[0]-1;
        $q="update tbl_post set dislikes='$like' where post_id='$id'";
        $s=  mysqli_query($conn,$q);
        if($s)
        {
            echo '<script>location.href="userhome.php"</script>';
   
        }
        else
        {
            echo '<script>alert("Sorry some error occured")</script>';
 
        }
    }
    else
    {
            echo '<script>alert("Sorry something went wrong")</script>';
 
    }}
}
else if($s=="like" && $c==2)
{
     echo '<script>location.href="userhome.php"</script>';
}
?>