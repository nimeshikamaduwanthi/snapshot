<?php
/**
 * Created by PhpStorm.
 * User: lakshitha
 * Date: 5/21/2019
 * Time: 10:52 AM
 */

?>
<?php
$user = $this->session->userdata('user');
extract($user);
?>

<title>ADD TASKS</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

<script>
    "use strict";function IterarCamposEdit(t,n){
        function i(t){if(null==colsEdi)
            return!0;
            for(var n=0;n<colsEdi.length;n++)
                if(t==colsEdi[n])
                    return!0;
            return!1
        }
        var o=0;t.each(
            function(){
                o++,"buttons"!=$(this).attr("name")&&i(o-1)&&n($(this))})
    }
    function FijModoNormal(t){
        $(t).parent().find("#bAcep").hide(),
            $(t).parent().find("#bCanc").hide(),
            $(t).parent().find("#bEdit").show(),
            $(t).parent().find("#bElim").show(),
            $(t).parents("tr").attr("id","")
    }
    function FijModoEdit(t){
        $(t).parent().find("#bAcep").show(),
            $(t).parent().find("#bCanc").show(),
            $(t).parent().find("#bEdit").hide(),
            $(t).parent().find("#bElim").hide(),
            $(t).parents("tr").attr("id","editing")
    }
    function ModoEdicion(t){
        return"editing"==t.attr("id")
    }
    function rowAcep(t){
        var n=$(t).parents("tr"),i=n.find("td");
        ModoEdicion(n)&&(IterarCamposEdit(i,function(t)
        {
            var n=t.find("input").val();t.html(n)}),FijModoNormal(t),params.onEdit(n))
        }
    function rowCancel(t){
        var n=$(t).parents("tr"),i=n.find("td");
        ModoEdicion(n)&&(IterarCamposEdit(i,function(t){
            var n=t.find("div").html();t.html(n)}),FijModoNormal(t))
            }
    function rowEdit(t){
        var n=$(t).parents("tr"),
            i=n.find("td");
        ModoEdicion(n)||(IterarCamposEdit(i,function(t)
        {
            var n=t.html(),
                i='<div style="display: none;">'+n+"</div>",o='<input class="form-control input-sm" value="'+n+'">';
            t.html(i+o)}),FijModoEdit(t))
        }
    function rowElim(t){
        $(t).parents("tr").remove(),params.onDelete()
    }
    function rowAgreg(){
        if(0==$tab_en_edic.find("tbody tr").length)
        {
            var t="";(i=$tab_en_edic.find("thead tr").find("th")).each(function()
        {
            "buttons"==$(this).attr("name")?t+=colEdicHtml:t+="<td></td>"}),
            $tab_en_edic.find("tbody").append("<tr>"+t+"</tr>")
        }
    else{
        var n=$tab_en_edic.find("tr:last");
        n.clone().appendTo(n.parent());
        var i=(n=$tab_en_edic.find("tr:last")).find("td");
        i.each(function(){"buttons"==$(this).attr("name")||$(this).html("")
        })}}

    function TableToCSV(t){
        var n="",i="";
        return $tab_en_edic.find("tbody tr").each(function(){
            ModoEdicion($(this))&&$(this).find("#bAcep").click();
            var o=$(this).find("td");
            n="",o.each(function()
            {
                "buttons"==$(this).attr("name")||(n=n+$(this).html()+t)}),""!=n&&(n=n.substr(0,n.length-t.length)),i=i+n+"\n"}),i
    }
    var $tab_en_edic=null,params=null,colsEdi=null,newColHtml='<div class="btn-group pull-right">' +
        '<button id="bEdit" type="button" class="btn btn-sm btn-default" onclick="rowEdit(this);">' +
               '<span class="glyphicon glyphicon-pencil" > </span></button>' +
        '<button id="bElim" type="button" class="btn btn-sm btn-default" onclick="rowElim(this);">' +
             '<span class="glyphicon glyphicon-trash" > </span></button>' +
        '<button id="bAcep" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="rowAcep(this);">' +
              '<span class="glyphicon glyphicon-ok" > </span></button>' +
        '<button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="rowCancel(this);">' +
             '<span class="glyphicon glyphicon-remove" > </span></button></div>',colEdicHtml='' +
        '<td name="buttons">'+newColHtml+"</td>";
    $.fn.SetEditable=function(t){var n={columnsEd:null,$addButton:null,onEdit:function(){},
        onDelete:function(){},onAdd:function(){}};
    params=$.extend(n,t),
        this.find("thead tr").append('<th name="buttons"></th>'),
        this.find("tbody tr").append(colEdicHtml),
        $tab_en_edic=this,null!=params.$addButton&&params.$addButton.click(function()
    {
            rowAgreg()
    }),
    null!=params.columnsEd&&(colsEdi=params.columnsEd.split(","))
    };

</script>

<style>
    .pt-3-half {
        padding-top: 1.4rem;
    }

    body{
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;

    }

    .topnav {
        /*overflow: hidden;*/
        background-color: #333;
        padding:5px;

    }
    .topnav h3{
        color: #fff;
        text-align: center;
        padding-top: 10px;
    }

    .topnav h6{
        color: #fff;
        margin-top: -20px;
        float: right;
        margin-right:120px;
        font-family: "Roboto Slab", "ff-tisa-web-pro", "Georgia", Arial, sans-serif;
        font-size:20px;
        margin-top: -35px;
    }
    .topnav .topnav-right a {
        /* padding: 53px; */
        font-size: 15px;
        background:forestgreen;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: right;
        margin-top: -40px;
        margin-right: 25px;
    }

    /*.topnav button:hover{*/

    /*color: #000;*/

    /*}*/
    .topnav a:hover {
        background-color: #aa0000;
        color: #fff;
    }



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
    .cal table{
        border-color: #0b0c0f;
        border: 2px solid black;
        margin-top: 40px;
        margin-left: 330px;


        /*border-collapse: collapse;*/
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
</style>

<body>
<div class="card">
	<div class="navbar">
		<div class="topnav">
				<h3>TASKS</h3>
				<div class="topnav-right">
					<h6><?php echo $first_name; ?></h6>
					<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger" style="background:#D68910;">Logout</a>
				</div>
		</div>

    <div class="cal">
			<button a href="<?php echo base_url(); ?>index.php/user/dashboard_staff" style="background:#D68910;" >Back</a></button>
			<br><br><br>
		<form action="addTask" method='POST'>
			<table id="week" style="width:70%; margin: auto; height: 20%;">
				<th> <h4>Select the Week</h4>
					<label class="start" for="start">Start date</label>
					<input type="date" name="weekStart">

					<label class="end" for="end">End date</label>
					<input type="date" name="weekEnd">
				</th>
			</table>
    </div>

    <br><br><br>
    <div style="width:90%; margin: auto;">
    <table class="table table-bordered" id="makeEditable" style=" float: left;margin-left: 15px;" >
			<thead>
				<tr>
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
					<div class = "savebtn">
						<input type="submit" name="save" value="Save" style=" padding:8px; font-size: 15px; background:#D68910; color: #fff; border-radius: 5px; border: none;  float: right;" >
					</div>
					<!-- <th rowspan="2" class="text-center">options</th> -->
					<!-- <th> <button id="but_add">ADD</button></th> -->
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
					<td >
						<select name="project" id="projects">
							<option value="1">pro 1</option>
							<option value="2">pro 2</option>
							<option value="3">pro 3</option>
						</select>
					</td>
					<td><input type="text" name="tasks" class="form-control input-sm"></td>
					<td><input type="text" name="planned_effort"  class="form-control input-sm"></td>
					<td><input type="text" name="planned_start_date"  class="form-control input-sm"></td>
					<td><input type="text" name="planned_end_date"  class="form-control input-sm"></td>
					<td><input type="text" name="mon_p"  class="form-control input-sm"></td>
					<td><input type="text" name="mon_a"  class="form-control input-sm"></td>
					<td><input type="text" name="tue_p"  class="form-control input-sm"></td>
					<td><input type="text" name="tue_a"  class="form-control input-sm"></td>
					<td><input type="text" name="wen_p"  class="form-control input-sm"></td>
					<td><input type="text" name="wen_a"  class="form-control input-sm"></td>
					<td><input type="text" name="thu_p"  class="form-control input-sm"></td>
					<td><input type="text" name="thu_a"  class="form-control input-sm"></td>
					<td><input type="text" name="fri_p"  class="form-control input-sm"></td>
					<td><input type="text" name="fri_a"  class="form-control input-sm"></td>
					<td><input type="text" name="sat_p"  class="form-control input-sm"></td>
					<td><input type="text" name="sat_a"  class="form-control input-sm"></td>
					<td><input type="text" name="sun_p"  class="form-control input-sm"></td>
					<td><input type="text" name="sun_a"  class="form-control input-sm"></td>
					<!-- <td><input type="text" name="total_planned"  class="form-control input-sm"></td>
					<td><input type="text" name="tatal_actual"  class="form-control input-sm"></td>  -->
				</tr>

				<?php foreach ($tasks as $task): ?>
					<tr>
						<td><?php echo $task['project_id']; ?></td>
						<td><?php echo $task['task']; ?></td>
						<td><?php echo $task['planned_effort']; ?></td>
						<td><?php echo $task['planned_start_date']; ?></td>
						<td><?php echo $task['planned_end_date']; ?></td>
						<td><?php echo $task['mon_p']; ?></td>
						<td><?php echo $task['mon_a']; ?></td>
						<td><?php echo $task['tue_p']; ?></td>
						<td><?php echo $task['tue_a']; ?></td>
						<td><?php echo $task['wen_p']; ?></td>
						<td><?php echo $task['wen_a']; ?></td>
						<td><?php echo $task['thu_p']; ?></td>
						<td><?php echo $task['thu_a']; ?></td>
						<td><?php echo $task['fri_p']; ?></td>
						<td><?php echo $task['fri_a']; ?></td>
						<td><?php echo $task['sat_p']; ?></td>
						<td><?php echo $task['sat_a']; ?></td>
						<td><?php echo $task['sun_p']; ?></td>
						<td><?php echo $task['sun_a']; ?></td>
					</tr>
				<?php endforeach?>
		</tbody>
	</table>


</form>

<script>
	$('#makeEditable').SetEditable({ $addButton: $('#but_add')});
</script>

