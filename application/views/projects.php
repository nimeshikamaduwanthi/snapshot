<?php
$user = $this->session->userdata('user');
// extract($user);
?>

<title>PROJECT</title>
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

</style>
<?php if ($_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} else {
     include "header_admin.php";
}
?>
<body style="background: #FEF9E7;">

<h2 style="text-align: center; color: #D68910; ">ADD PROJECT</h2>
<form action="addProject" method='POST'>
    <div class="cal">
				<div style="padding-right: 100px;">
					<input type="submit" name="save" value="Save" style=" float:right; padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none; margin-top:10px; margin-right:0px;  " >
				</div><br><br>
        
        <table  class="table table-bordered" id="makeEditable" style="width:70%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto;" >
        <thead>
        <tr>
            <th rowspan="3" class="text-center">Code</th>
            <th rowspan="3" class="text-center">Project Name</th>
            <th rowspan="3" class="text-center">Project Description</th>
            <th rowspan="3" class="text-center">Start Date</th>
						<th rowspan="3" class="text-center">End Date</th>
						<th rowspan="3" class="text-center">#</th>
        </tr>
        </thead> 
        <tbody>
        <tr>
						<td><input type="text" name="code" class="form-control input-sm"></td>
						<td><input type="text" name="project_name" class="form-control input-sm"></td>
						<td><input type="text" name="project_description" class="form-control input-sm"></td>
						<td><input type="text" placeholder="YYYY-MM-DD" name="start_date" class="form-control input-sm"></td>
						<td><input type="text" placeholder="YYYY-MM-DD" name="end_date" class="form-control input-sm"></td>
						<td></td>
						
        </tr>
				<?php foreach ($projects as $project): ?>
					<tr>
						<td><?php echo $project['code']; ?></td> 
						<td><?php echo $project['project_name']; ?></td>
						<td><?php echo $project['project_description']; ?></td>
						<td><?php echo $project['start_date']; ?></td>
						<td><?php echo $project['end_date']; ?></td>
						<td><button id="bEdit" type="button" class="btn btn-sm btn-default" style="background:#D68910; color: #fff; border-radius: 5px; border: none; " onclick="rowEdit(this);">
						<a style=" text-decoration: none; color: #fff;" href="<?php echo base_url(); ?>index.php/project/projectEditIndex/<?php echo $project['id']; ?>">Edit</a></button></td>
					</tr>
				<?php endforeach?>
				</tbody>
				</table>
		</div>
</form>

	