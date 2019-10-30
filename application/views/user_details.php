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
			  background-color: #333;
        height:5rem;
    }

		h3{
        color:#fff;
        text-align: center;
    }

    .direct-links a{
        padding-left: 600px;
        padding-top: 100px;
        display:block;
        text-transform: uppercase;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;
    }

    table{
  			border-collapse: collapse;
		}

		table, th, td {
  			border: 1px solid black;
		}

		th {
  		text-align: center;
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
<body style="background: #FEF9E7;">
<div class="topnav">
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
<h2 style="text-align: center; color: #D68910; ">Users View</h2>
				
				<table style="width:50%; margin-left:auto; margin-right:auto;" >
        <thead>
        <tr>
            <th rowspan="3" class="text-center">User Name</th>
            <th rowspan="3" class="text-center">User Email</th>

        </tr>
        </thead>
        <tbody>
          <tr>
          <?php foreach ($users as $user): ?>
					<tr>
						<td ><?php echo '<a href="profileindex">'.$user['first_name'].'</a>' ?></td>
						<td ><?php echo $user['email']; ?></td>
						
						</tr>
				<?php endforeach?>
          </tr>
        </tbody>
				</table>
      