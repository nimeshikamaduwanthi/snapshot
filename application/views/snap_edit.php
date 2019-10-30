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

<h2 style="text-align: center; color: #D68910; ">EDIT SNAPSHOT</h2>
<form action="<?php echo base_url(); ?>index.php/snapshot/updateSnapShot" method='POST'>
    <div class="cal">
			<div class = "deletebtn">
				<input type="button" name="delete" onclick="window.location='<?php echo base_url(); ?>index.php/snapshot/deleteSnapshot/<?php echo $snapshot['id'] ?>'" value="Delete Snapshot" style=" padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none;  float: right; margin-right: 35px; margin-bottom: 15px;" >
			</div>
			<div class = "savebtn">
				<input type="submit" name="save" value="Update Snapshot" style=" padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none;  float: right; margin-right: 10px; margin-bottom: 15px;" >
			</div>
    </div>
    <div style="width:96.5%;">
    <table class="table table-bordered" id="makeEditable" style=" float: left; margin-left: 15px; margin-top: 1px;" >
			<thead>
				<tr>
					<th rowspan="3" class="text-center">Week Start Date</th>
					<!-- <th rowspan="3" class="text-center">Project</th>
					<th rowspan="3" class="text-center">Task</th> -->
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
					<!-- <th rowspan="3" class="text-center">Total Planned hrs</th>
					<th rowspan="3" class="text-center">Total Actual hrs</th> -->
					
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
      	<tr>
      		<td><input type="text" value=<?php echo $snapshot['start_date'] ?> name="week_start_date" class="form-control input-sm"></td>
					<!-- <td><input type="text" value=<?php echo $snapshot['project_name'] ?> name="project" class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['task'] ?> name="task" class="form-control input-sm"></td> -->
					<td><input type="text" value=<?php echo $snapshot['planned_effort'] ?> name="planned_effort" class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['planned_start_date'] ?> placeholder="YYYY-MM-DD" name="planned_start_date"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['planned_end_date'] ?> placeholder="YYYY-MM-DD" name="planned_end_date"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['mon_p'] ?> name="mon_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['mon_a'] ?> name="mon_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['tue_p'] ?> name="tue_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['tue_a'] ?> name="tue_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['wen_p'] ?> name="wen_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['wen_a'] ?> name="wen_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['thu_p'] ?> name="thu_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['thu_a'] ?> name="thu_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['fri_p'] ?> name="fri_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['fri_a'] ?> name="fri_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['sat_p'] ?> name="sat_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['sat_a'] ?> name="sat_a"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['sun_p'] ?> name="sun_p"  class="form-control input-sm"></td>
					<td><input type="text" value=<?php echo $snapshot['sun_a'] ?> name="sun_a"  class="form-control input-sm"></td> 
					<input type="hidden" value=<?php echo $snapshot['id'] ?> name="id"  class="form-control input-sm">
				</tr>
      </tbody>
			</table>
			</form>
 