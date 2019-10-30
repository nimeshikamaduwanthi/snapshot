<?php
$user = $this->session->userdata('user');
// extract($user);
?>

<title>TASK</title>
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

    @media screen and (max-height: 650px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    .cal th h4{
        margin-top:5px ;
        color: #000;
        text-align: left;
        float: left;
        margin-left: 30px;
        font-size: 20px;
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

<h2 style="text-align: center; color: #D68910; ">ADD TASK</h2>
<form action="addTask" method='POST'>
    <div class="cal">
				<div style="padding-right: 100px;">
					<input type="submit" name="save" value="Save" style=" float:right; padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none; margin-top:10px; " >
				</div><br><br>
        
        <table  class="table table-bordered" id="makeEditable" style="width:70%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto;" >
        <thead>
        <tr>
            <th rowspan="3" class="text-center">Project Name</th>
            <th rowspan="3" class="text-center">Task Name</th>
            <th rowspan="3" class="text-center">Start Date</th>
						<th rowspan="3" class="text-center">End Date</th>
						<th rowspan="3" class="text-center">#</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td >
						<select name="project" id="projects">
							<?php foreach ($projects as $project): ?>
								<option value=<?php echo $project['id']; ?>>
									<?php echo $project['project_name']; ?>
								</option>
							<?php endforeach?>
						</select>
					</td>
						<td><input type="text" name="task_name" class="form-control input-sm"></td>
						<td><input type="text" placeholder="YYYY-MM-DD" name="start_date" class="form-control input-sm"></td>
						<td><input type="text" placeholder="YYYY-MM-DD" name="end_date" class="form-control input-sm"></td>
						<td></td>
        </tr>
				<?php foreach ($task_names as $newTask): ?>
					<tr>
            <td><?php echo $newTask['project_name']; ?></td>
						<td><?php echo $newTask['task']; ?></td>
						<td><?php echo $newTask['start_date']; ?></td>
						<td><?php echo $newTask['end_date']; ?></td>
						<td><button id="bEdit" type="button" class="btn btn-sm btn-default" style="background:#D68910; color: #fff; border-radius: 5px; border: none; " onclick="rowEdit(this);">
              <a style=" text-decoration: none; color: #fff;" href="<?php echo base_url(); ?>index.php/task/taskEditIndex/<?php echo $newTask['id']; ?>">Edit</a></button></td>
						</tr>
				<?php endforeach?>
				</tbody>
				</table>
		</div>
</form>

		