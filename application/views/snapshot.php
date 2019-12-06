
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

		
</style>
<?php if ($_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} elseif($_SESSION['user_type_id'] == '1') {
     include "header_admin.php";
}?>
<body style="background: #FEF9E7;">

<h2 style="text-align: center; color: #D68910; ">ADD SNAPSHOT</h2>
<form action="<?php echo base_url(); ?>index.php/snapshot/addSnapshot/" method='POST'><br>
<div class="cal">
	<div class = "savebtn">
				<input type="submit" name="save" value="Save" style=" padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none;  float: right; margin-top: 8px; margin-right: 10px;" >
	</div>
</div>
<?php
					if($this->session->flashdata('error')){
						?>
						<div class="alert alert-danger text-center" style="margin-top:20px;">
							<?php echo $this->session->flashdata('error'); ?>
						</div>
						<?php
					}
					
					if($error && $error !=""){
			?>
			<div class="alert alert-danger text-center" style="margin-top:2px; width:25%; margin-left:500px;">
						<?php echo $error; ?>
					</div>
			<?php
				}
				?>
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
					<td><input type="date"  name="start_date"  class="form-control input-sm"></td>
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
					<td><input type="date" name="planned_start_date"  class="form-control input-sm"></td>
					<td><input type="date" name="planned_end_date"  class="form-control input-sm"></td>
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


