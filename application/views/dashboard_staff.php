<?php
$user = $this->session->userdata('user');
extract($user);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD - SL ROBOTICS </title>
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color:  #333;
        
        padding:5px;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    .topnav h6{
        color: #fff;
        margin-top: -20px;
        float: right;
        margin-right: 250px;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;
        font-size:20px;
        margin-top: -2px;
    }
    .topnav .topnav-rightL a {
        padding:8px;
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: right;
        margin-top: -6px;
        margin-right: -250px;
    }

    /*.topnav button:hover{*/

    /*color: #000;*/

    /*}*/
    .topnav a:hover {
        background-color: #aa0000;
        color: #fff;
    }

    /*.topnav a.active {*/
    /*background-color: #4CAF50;*/
    /*color: white;*/
    /*}*/

    .topnav-right {
        float: right;
    }



    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color:  #5DADE2;
        background-color: 
        overflow-x: hidden;
        /*padding-top: 20px;*/
        padding-top: 140px;
    }

    .sidenav a {
        /*padding: 85px 8px 0px 16px;*/
        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
        /*padding-top: 80px;*/
        margin-top: 30px;
        margin-left: 25px;
    }

    /*.sidenav a:hover {*/
    /*color: #f1f1f1;*/
    /*}*/

    .main {
        margin-left: 160px;
        font-size: 28px;
        width: 50px;
        height: 20px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    .direct-links a{
        padding-left: 520px;
        padding-top: 100px;
        display:block;
        text-transform: uppercase;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;

    }
</style>
<body>
<div class="wrapper">
    <div class="topnav">
        <div class="main"></div>
        <div class="topnav-right"> 
            <h6><?php echo $first_name; ?></h6>
        </div>
        <div class="topnav-rightL">
        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="text-align: right; background:#D68910;"> Logout</a>
        </div>
    </div>


			<div class="container" style="width: 50%; text-decoration: none; font-size: 25px;color: #fff; display: block; margin-top: 30px; margin-left: 25px;">
					<li><a href="#Profile">Profile</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/user/addTaskIndex">Tasks</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/user/projectsIndex">Projects</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/user/dashboard_staff">Dashboard</a></li>
			</div>

			<div class="container2">
				<img src="./sl.png" width="50%">
			</div>
    

</div>

<!-- <div class="direct-links">
    <a href="<?php echo base_url(); ?>index.php/user/addTaskIndex" >Add Snapshot</a>
    <a href="<?php echo base_url(); ?>index.php/user/viewTasks">View Snapshot</a>
</div> -->
</body>
</html>