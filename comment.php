<?php
session_start();
$email=$_SESSION['email'];
include '../connection.php';
$q="select * from tbl_post where  status='1' and email <> '$email' order by date desc";
$s= mysqli_query($conn, $q);
while ($r= mysqli_fetch_array($s))
        {
    if($_REQUEST['com'.$r['post_id']]!="")
    {
$com=$_REQUEST['com'.$r['post_id']];
$postid=$_REQUEST['postid'.$r['post_id']];
$q="insert into tbl_comment (post_id,email,date,com) values('$postid','$email',(select sysdate()),'$com')";
$s= mysqli_query($conn, $q);
if($s)
    echo '<script>location.href="userhome.php"</script>';
    }
        }