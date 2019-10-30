
<?php
$user = $this->session->userdata('user');
// extract($user);
?>

<title>ADD SNAPSHOT</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

<style>
    .pt-3-half {
        padding-top: 1.4rem;
    }

    body{
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;

    }

    .topnav {
			  background-color: #333;
        height:8rem;
    }

    .cal th h4{
        margin-top:5px ;
        color: #000;
        text-align: left;
        float: left;
        margin-left: 30px;
        font-size: 20px;
    }

    .cal table{
        border-color: #0b0c0f;
        border: 2px solid black;
        margin-top: 40px;
        margin-left: 330px;
    }

    .cal th  .start{
        margin-top:50px ;
        color: #000;
        float: left;
        margin-left: -75px;
    }

    .cal th .end{
        margin-top:50px ;
        color: #000;
        float: left;
        margin-left: 60px;

    }

    .cal th input{
        margin-top:45px ;
        color: #000;
        float: left;
        margin-left: 20px;
        padding: 2px;
        border-radius: 2px;
    }

    .cal button{
        padding:8px;
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: left;
        margin-top: 10px;
        margin-left: 10px;

    }

    .cal button:hover{
        color:#000;

    }

    .submit a{
        padding:10px;
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: right;
        margin-top: 5px;
        margin-right: 160px;

    }

    .submit a:hover{
        background: #d58512;
        color: #fff;

    }

    .topnav-right {
        float: right;
    }

    .back button{
        padding:8px;
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: left;
        margin-top:-50px;
        margin-left: 10px;

    }

    .back button:hover{
        color:#000;

    }

    table{
  			border-collapse: collapse;
		}

		table, th, td {
  			border: 1px solid black;
		}

		#scroll
		{
				padding-left:20px;
				padding-right:20px;
    		width: 90%;
				height: 450px;
				overflow:scroll;
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

<h2 style="text-align: center; color: #D68910; ">ADD SNAPSHOT</h2>
<form action="addSnapshot" method='POST'><br>
<div class="cal">
	<div class = "savebtn">
				<input type="submit" name="save" value="Save" style=" padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none;  float: right; margin-top: 8px; margin-right: 10px;" >
	</div>
</div>

<div id="scroll" style="overflow-y:scroll;">
    <table class="table table-bordered" id="makeEditable" style=" float: left; margin-left: 15px; margin-top: 1px;" >
			<thead>
				<tr>
					<th rowspan="3" class="text-center">Week Start Date</th>
					<th rowspan="3" class="text-center">Project</th>
					<th rowspan="3" class="text-center">Task</th>
					<th rowspan="3" class="text-center">Planned Effort</th>
					<th rowspan="3" class="text-center">Planned start date</th>
					<th rowspan="3" class="text-center">Planned end date</th>
					<th colspan="2" class="text-center">Mon </th>
					<th colspan="2" class="text-center">Tue</th>
					<th colspan="2" class="text-center">Wen</th>
					<th colspan="2" class="text-center">Thu </th>
					<th colspan="2" class="text-center">Fri</th>
					<th colspan="2" class="text-center">Sat</th>
					<th colspan="2" class="text-center">Sun</th>
					<th rowspan="3" class="text-center">Total Planned hrs</th>
					<th rowspan="3" class="text-center">Total Actual hrs</th>
					<th rowspan="3" class="text-center">#</th>
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
				<tr >
					<td><input type="text" placeholder="YYYY-MM-DD" name="start_date"  class="form-control input-sm"></td>
					<td >
						<select name="project" id="projects">
							<?php foreach ($projects as $project): ?>
								<option value=<?php echo $project['id']; ?>>
									<?php echo $project['project_name']; ?>
								</option>
							<?php endforeach?>
						</select>
					</td>
					<td>
						<select name="task_name" id="task_names">
							<?php foreach ($task_names as $task_name): ?>
								<option value=<?php echo $task_name['id']; ?>>
									<?php echo $task_name['task']; ?>
								</option>
							<?php endforeach?>
						</select>
					</td>
					<td><input type="text" name="planned_effort"  class="form-control input-sm"></td>
					<td><input type="text" placeholder="YYYY-MM-DD" name="planned_start_date"  class="form-control input-sm"></td>
					<td><input type="text" placeholder="YYYY-MM-DD" name="planned_end_date"  class="form-control input-sm"></td>
					<td><input type="text" name="mon_p"  style="width: 30px;"></td>
					<td><input type="text" name="mon_a"  style="width: 30px;"></td>
					<td><input type="text" name="tue_p"  style="width: 30px;"></td>
					<td><input type="text" name="tue_a"  style="width: 30px;"></td>
					<td><input type="text" name="wen_p"  style="width: 30px;"></td>
					<td><input type="text" name="wen_a"  style="width: 30px;"></td>
					<td><input type="text" name="thu_p"  style="width: 30px;"></td>
					<td><input type="text" name="thu_a"  style="width: 30px;"></td>
					<td><input type="text" name="fri_p"  style="width: 30px;"></td>
					<td><input type="text" name="fri_a"  style="width: 30px;"></td>
					<td><input type="text" name="sat_p"  style="width: 30px;"></td>
					<td><input type="text" name="sat_a"  style="width: 30px;"></td>
					<td><input type="text" name="sun_p"  style="width: 30px;"></td>
					<td><input type="text" name="sun_a"  style="width: 30px;"></td>
					<td><input type="text" name="total_planned"  class="form-control input-sm"></td>
					<td><input type="text" name="tatal_actual"  class="form-control input-sm"></td>
				</tr>

				<?php foreach ($snapshots as $snapshot): ?>
					<tr>
						<td><?php echo $snapshot['start_date']; ?></td>
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
						<td><button id="bEdit" type="button" class="btn btn-sm btn-default" style="background:#D68910; color: #fff; border-radius: 5px; border: none; " onclick="rowEdit(this);">
                <a style=" text-decoration: none; color: #fff;" href="<?php echo base_url(); ?>index.php/snapshot/snapEditIndex/<?php echo $snapshot['id']; ?>">Edit</a>
								</button></td>
					</tr>
				<?php endforeach?>
				</form>
		</tbody>
	</table>
</div>
</div>


