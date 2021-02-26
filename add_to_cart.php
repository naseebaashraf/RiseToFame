<?php
session_start();
include 'connection.php';
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
<center>
<body>
	 <div style="position:fixed; left:27%; top:30%; z-index:3;">
     <h1>CONGRATULATIONS!!!!!!</h1>
    <h1>ITEM IS ADDED TO YOUR CART!!!!!!</h1>
    </body>
    </center>
