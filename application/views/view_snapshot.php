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
        /* padding: 0px; */
        height:5rem;

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

    table{
  			border-collapse: collapse;
		}

		table, th, td {
  			border: 1px solid black;
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
	<ul style="list-style-type: none;">
		<li><a href="<?php echo base_url(); ?>index.php/user/userdetails">All Users</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/snapshot/getAllSnapshots">View Snapshot</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/task/index">Task</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/project/index">Projects</a></li>
	</ul>
	<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910; float: right; padding:8px; color: #fff; border:none; border-radius: 5px; text-decoration: none; margin-top: 10px; margin-right: 20px;"> Logout</a>
</div>

<h2 style="text-align: center; color: #D68910; ">User Snapshots</h2>
    <div style="width:90%; margin: auto;">
    <table>
			<thead>
				<tr>
					<th rowspan="3" class="text-center">Week Start Date</th>
					<th rowspan="3" class="text-center">User Name</th>
					<th rowspan="3" class="text-center">Project</th>
					<th rowspan="3" class="text-center">Task</th>
					<th rowspan="3" class="text-center">Planned Effort</th>
					<th rowspan="3" class="text-center">Planned start date</th>
					<th rowspan="3" class="text-center">Planned end date</th>
					<th colspan="2" class="text-center">Mon</th>
					<th colspan="2" class="text-center">Tue</th>
					<th colspan="2" class="text-center">Wen</th>
					<th colspan="2" class="text-center">Thu </th>
					<th colspan="2" class="text-center">Fri</th>
					<th colspan="2" class="text-center">Sat</th>
					<th colspan="2" class="text-center">Sun</th>
					<th rowspan="3" class="text-center">Total Plnned hrs</th>
					<th rowspan="3" class="text-center">Total Actual hrs</th>
					
				</tr>

				<tr>
					<th>P</th>
					<th>A</th>
					<th>P</th> 
					<th>A</th>
					<th>P</th>
					<th>A</th>
					<th>P</th>
					<th>A</th>
					<th>P</th>
					<th>A</th> 
					<th>P</th> 
					<th>A</th>
					<th>P</th>
					<th>A</th>
					
				</tr>
			</thead>
      <tbody>

      <?php foreach ($snapshots as $snapshot): ?>
					<tr>
						<td><?php echo $snapshot['start_date']; ?></td>
						<td><?php echo $snapshot['first_name']; ?></td>
						<td><?php echo $snapshot['project_name']; ?></td>
						<td><?php echo $snapshot['task']; ?></td>
						<td><?php echo $snapshot['planned_effort']; ?></td>
						<td><?php echo $snapshot['planned_start_date']; ?></td>
						<td><?php echo $snapshot['planned_end_date']; ?></td>
						<td><?php echo $snapshot['mon_p']; ?></td>
						<td><?php echo $snapshot['mon_a']; ?></td>
						<td><?php echo $snapshot['tue_p']; ?></td>
						<td><?php echo $snapshot['tue_a']; ?></td>
						<td><?php echo $snapshot['wen_p']; ?></td>
						<td><?php echo $snapshot['wen_a']; ?></td>
						<td><?php echo $snapshot['thu_p']; ?></td>
						<td><?php echo $snapshot['thu_a']; ?></td>
						<td><?php echo $snapshot['fri_p']; ?></td>
						<td><?php echo $snapshot['fri_a']; ?></td>
						<td><?php echo $snapshot['sat_p']; ?></td>
						<td><?php echo $snapshot['sat_a']; ?></td>
						<td><?php echo $snapshot['sun_p']; ?></td>
						<td><?php echo $snapshot['sun_a']; ?></td>
            <td><?php echo $snapshot['total_planned']; ?></td>
						<td><?php echo $snapshot['total_actual']; ?></td>
					</tr>
				<?php endforeach?>
		</tbody>
	</table>
	</div>