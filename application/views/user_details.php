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
        background-color: #333;
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
        margin-right: 120px;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;
        font-size:20px;
        margin-top: -2px;
    }
    
    .topnav .topnav-right a {
        padding:8px;
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: right;
        margin-top: -6px;
        margin-right: -155px;
    }

    .topnav a:hover {
        background-color: #aa0000;
        color: #fff;
    }

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
        background-color: #333;
        overflow-x: hidden;
        /*padding-top: 20px;*/
        padding-top: 140px;
    }

    .sidenav a {
        /*padding: 85px 8px 0px 16px;*/
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        /*padding-top: 80px;*/
        margin-top: 30px;
        margin-left: 25px;
    }

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
        padding-left: 600px;
        padding-top: 100px;
        display:block;
        text-transform: uppercase;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;

    }
</style>
<body>
<div class="card">
<div class="wrapper">
    <div class="topnav">
			<h3 style="color: white;">User's Details</h3>
        <div class="main">
        <div class="topnav-right">
        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910; float: right;"> Logout</a>
        </div>
    </div> 
    </div>
    </div>
		</div>
		<div class="cal">
				<button style="background:#D68910;"> <a href="<?php echo base_url(); ?>index.php/user/dashboardIndex">Back</a></button>
		
				<br><br><br>
				<form action="" method='POST'></form>
				<table  class="table table-bordered" id="makeEditable" style="width:70%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto;" >
        <thead>
        <tr>
            <th rowspan="3" class="text-center">User Name</th>
            <th rowspan="3" class="text-center">User Email</th>
            <!-- <th rowspan="3" class="text-center"></th>
						<th rowspan="3" class="text-center"></th> -->

        </tr>
        </thead>
        <tbody>
          <tr>
          <?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo '<a href="profileindex">'.$user['first_name'].'</a>' ?></td>
						<td><?php echo $user['email']; ?></td>
						<td></td>
						<td></td>
						</tr>
				<?php endforeach?>
          </tr>
        </tbody>
				</table>
      