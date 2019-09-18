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

    nav {
        overflow: hidden;
        background-color: #333;
       
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

</style>
<body style="background: #FEF9E7;">
<nav style="height:5rem;">
<div class="navtop">
<h3 style="color: white; text-align: center; padding-top:15px;">All Users</h3>
<!-- <div class="topnav-right"> -->
<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910; float: right; padding:8px; color: #fff; border-radius: 5px; text-decoration: none; margin-top: -40px; margin-right: 20px;"> Logout</a>
</div>
</div>
</nav>

				<button style="background:#D68910;  padding:8px; border-radius: 5px; "> <a href="<?php echo base_url(); ?>index.php/user/dashboardHrIndex" style="color: #fff; text-decoration: none;">Back</a></button>
		
				<br><br><br>
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
      