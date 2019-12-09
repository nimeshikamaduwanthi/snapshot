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
<?php if (isset($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} else {
    include "header_admin.php";
}?>
<body style="background: #FEF9E7;">

<h2 style="text-align: center; color: #D68910; ">Daily Snapshots</h2>

<div style="width:90%; margin: auto;">
<div id="list1" class="dropdown-check-list " tabindex="100" style="margin-left: 5%; margin-bottom: 10px;" >
		<form action="<?php echo base_url(); ?>index.php/snapshot/dailySnap/" method="POST" >
					<input type="date" id="date" name="date"  value="" >
					<input type="submit" value="Search" style="border:1.5px solid #dddddd; margin-left:auto;margin-right:auto; background:#D68910; color: #fff; padding:8px; border-radius: 5px;">	
		</form> 
    
    <table>
			<thead>
				<tr>
					<th rowspan="3" class="text-center">Date</th>
					<th rowspan="3" class="text-center">User Name</th>
					<th rowspan="3" class="text-center">Project</th>
					<th rowspan="3" class="text-center">Task</th>
					<th rowspan="2" class="text-center">Planned <br> Effort</th>
					<th rowspan="3" class="text-center">Planned start date</th>
					<th rowspan="3" class="text-center">Planned end date</th>
          <th rowspan="3" class="text-center">planned hours</th>
          <th rowspan="3" class="text-center">actual hours</th>
					<th rowspan="3" class="text-center">Total <br>planned <br>ours </th>
					<th rowspan="3"class="text-center">Total <br>actual <br> ours </th>

				</tr>
      </thead>
      <tbody>
        <?php foreach ($snapshot_date as $snapshot): ?>
					<tr>
            
            <td><?php if(!empty($snapshot['mon_date'])) {echo $snapshot['mon_date'];} 
                      else if(!empty($snapshot['tue_date'])) {echo $snapshot['tue_date'];}
                      else if(!empty($snapshot['wen_date'])) {echo $snapshot['wen_date'];}
                      else if(!empty($snapshot['thu_date'])) {echo $snapshot['thu_date'];}
                      else if(!empty($snapshot['fri_date'])) {echo $snapshot['fri_date'];}
                      else if(!empty($snapshot['sat_date'])) {echo $snapshot['sat_date'];}
                      else if(!empty($snapshot['sun_date'])) {echo $snapshot['sun_date'];}
             ?></td>
						<td><?php echo $snapshot['first_name']; ?></td>
						<td><?php echo $snapshot['project_name']; ?></td>
						<td><?php echo $snapshot['task']; ?></td>
						<td><?php echo $snapshot['planned_effort']; ?></td>
						<td><?php echo $snapshot['planned_start_date']; ?></td>
						<td><?php echo $snapshot['planned_end_date']; ?></td>
            <td><?php if(!empty($snapshot['mon_p'])) {echo $snapshot['mon_p'];}
                      elseif(!empty($snapshot['tue_p'])) {echo $snapshot['tue_p'];}
                      elseif(!empty($snapshot['wen_p'])) {echo $snapshot['wen_p'];}
                      elseif(!empty($snapshot['thu_p'])) {echo $snapshot['thu_p'];}
                      elseif(!empty($snapshot['fri_p'])) {echo $snapshot['fri_p'];}
                      elseif(!empty($snapshot['sat_p'])) {echo $snapshot['sat_p'];}
                      elseif(!empty($snapshot['sun_p'])) {echo $snapshot['sun_p'];}
             ?></td>
            <td><?php if(!empty($snapshot['mon_a'])) {echo $snapshot['mon_a'];}
                      elseif(!empty($snapshot['tue_a'])) {echo $snapshot['tue_a'];}
                      elseif(!empty($snapshot['wen_a'])) {echo $snapshot['wen_a'];}
                      elseif(!empty($snapshot['thu_a'])) {echo $snapshot['thu_a'];}
                      elseif(!empty($snapshot['fri_a'])) {echo $snapshot['fri_a'];}
                      elseif(!empty($snapshot['sat_a'])) {echo $snapshot['sat_a'];}
                      elseif(!empty($snapshot['sun_a'])) {echo $snapshot['sun_a'];}
            ?></td>
						<td><?php echo $snapshot['total_planned']; ?></td>
						<td><?php echo $snapshot['total_actual']; ?></td>
          
          	</tr>
            <?php endforeach?>
        </tbody>

        </table>
       
       <br>
       <form action="<?php echo base_url(); ?>index.php/snapshot/csvDaily/" method="POST">
	<!-- <input type="hidden" name="object" id="object" value="<?php print_r($snapshot) ; ?>"> -->
	<button type="submit" name="submit" style="width:5%; border:1.5px solid #dddddd; margin-left:auto;margin-right:auto; background:#D68910; color: #fff; padding:8px; border-radius: 5px;">CSV</button>
	</form>