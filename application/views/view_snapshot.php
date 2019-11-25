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

		.dropdown-check-list {
  display: inline-block;
}
.dropdown-check-list .anchor {
  position: relative;
  cursor: pointer;
  display: inline-block;
  padding: 5px 50px 5px 10px;
  border: 1px solid #ccc;
}
.dropdown-check-list .anchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: 10px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.dropdown-check-list .anchor:active:after {
  right: 8px;
  top: 21%;
}
.dropdown-check-list ul.items {
  padding: 2px;
  display: none;
  margin: 0;
  border: 1px solid #ccc;
	border-top: none;
	float: none !important;
	position: absolute;
	z-index: 1000;
	background-color:#f5deb3;
}
.dropdown-check-list ul.items li {
  list-style: none;
}
.dropdown-check-list.visible .anchor {
  color: #0094ff;
}
.dropdown-check-list.visible .items {
  display: block;
}


</style>
<?php if ($_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} else {
    include "header_admin.php";
}?>
<body style="background: #FEF9E7;">

<h2 style="text-align: center; color: #D68910; ">User Snapshots</h2>
    <div id="list1" class="dropdown-check-list " tabindex="100" style="margin-left: 5%; margin-bottom: 10px;" >
		<form action="<?php echo base_url(); ?>index.php/snapshot/getAllSnapshots" method="POST" >
		<!-- <input type="text" id="date" name="date"  placeholder="YYYY-MM-DD" value=""> -->
        <span id="clickSpan" class="anchor"><input type="submit" value="Select Users" style="width:100%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto; background:#D68910; color: #fff; padding:8px; border-radius: 5px;"></span>
					<input type="hidden" id="idlist" name="idlist" value="">
					
        <ul class="items">
						<?php foreach ($users as $user): ?>
            <li style="float:none !important;">
						<?php echo $user['id'] . ' ' . $user['first_name'] . ' ' . $user['last_name'] . ' '; ?>
						<input type="checkbox" value="<?php echo $user['id'] ?> " name="user"  class="checkedbox" onclick="getSelectedIds(<?php echo $user['id'] ?>)"  />
						</li>
						<?php endforeach?>
        </ul>
				
				</form>
    

		<form action="<?php echo base_url(); ?>index.php/snapshot/getAllSnapshots" method="POST">
		<input type="submit" value="Select Date" style="width:40%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto; background:#D68910; color: #fff; padding:8px; border-radius: 5px;">
					<input type="text" id="date" name="date"  placeholder="YYYY-MM-DD" value="">
		</form>
		</div>
    <script type="text/javascript">

        var checkList = document.getElementById('list1');
        var span = document.getElementById('clickSpan');
        span.onclick = function (evt) {

					if (checkList.classList.contains('visible'))
                checkList.classList.remove('visible');
            else
                checkList.classList.add('visible');
        }

        span.onblur = function(evt) {
            checkList.classList.remove('visible');

        }

				function getSelectedIds(name) {
					var checkedValue = null;
					var inputElements = document.getElementsByClassName('checkedbox');
					let check = [];

					for(var i=0; inputElements[i]; ++i) {
						if(inputElements[i].checked) {
							check.push(inputElements[i].value);
						}
					}

					document.getElementById('idlist').value=check;
				}


    </script>




<!-- <form class="example" action="<?php echo base_url(); ?>index.php/snapshot/getAllSnapshots" style="margin:auto;max-width:300px;">
  <input type="text" placeholder="Search User" name="search1">
  <button type="submit"><i class="fa fa-search"></i></button>
  <input type="text" placeholder="Search Date" name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form> -->
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
	<br>
	<form action="convertCsvIndex" method="POST">
	<input type="hidden" name="object" id="object" value="<?php print_r($snapshots) ; ?>">
	<button type="submit" name="submit" style="width:5%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto; background:#D68910; color: #fff; padding:8px; border-radius: 5px;">CSV</button>
	</form>
	</div>