 <?php
// $user = $this->session->userdata('userData');
// extract($user);
?>

<!doctype html>
<html lang="en">
<head>
    
    <title>DASHBOARD - SL ROBOTICS </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

	
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
        /* padding: 0px; */
        height:8rem;

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
    
  ul {
    list-style-type: none;
    text-decoration: none;
    float: left;
  }

    li a {
		list-style-type: none;
    display: block;
    color: white;
    text-align: center;
    padding: 10px 12px;
    padding-top: 30px;
    text-decoration: none;
  }

	li {
		float: left;
	}

	li a:hover {
    background-color: orange;
    height: 8rem;
    color: white;
    text-decoration: none;
  }
</style>
<body >


        <div class="topnav">
				<ul>
					<li><a href="<?php echo base_url(); ?>index.php/user/userdetails">All Users</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/snapshot/getAllSnapshots">View Snapshot</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/task/index">Task</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/project/index">Projects</a></li>
				</ul>
        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910; float: right; padding:8px; color: #fff; border:none; border-radius: 5px; text-decoration: none; margin-top: 10px; margin-right: 20px;"> Logout</a>
        </div>
        
    <img src="<?php echo base_url();?>assets/img/sll.jpg" style="width:100%; background-size: cover;">
                

</body>
</html> 
