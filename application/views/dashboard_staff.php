<?php
$user = $this->session->userdata('user');
// extract($user);
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
        height: 5rem;
       
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        /* padding: 14px 16px; */
        text-decoration: none;
				font-size: 17px;
				padding-top: 30px;
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
        background-color: orange;
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

		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
		background-color: #333;
		
  }

    li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
		text-decoration: none;
		
  }

	li a:hover {
    background-color:  #111;
    height: 5rem;
  }
    
</style>
<body >
    <div class="topnav">
        <div class="topnav-right"> 
            <!-- <h6><?php echo $first_name; ?></h6> -->
        </div>
        <div class="topnav-right">
        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910; padding:8px; color: #fff; border-radius: 5px; text-decoration: none;  margin-top: 20px; margin-right:30px; "> Logout</a>
        </div>
					<ul>
					<li><a href="<?php echo base_url(); ?>index.php/snapshot/index">Snapshots</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/project/index">Projects</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/task/index">Task</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/user/profileIndex">Profile</a></li>
					</ul>
    </div>
	
</div>
<img src="<?php echo base_url();?>assets/img/sll.jpg" style="width:100%;">
</body>
</html>