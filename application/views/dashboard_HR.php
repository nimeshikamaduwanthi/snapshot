 <?php
if(empty($_SESSION)) {
    header("Location: http://localhost/snapshot/index.php/");
}

?>

<!doctype html>
<html lang="en">
<head>
    
    <title>Admin DASHBOARD - SL ROBOTICS </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

	
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>
<?php
if ($_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} elseif($_SESSION['user_type_id'] == '1') {
     include "header_admin.php";
}
?>
<body >


    <img src="<?php echo base_url();?>assets/img/sll.jpg" style="width:100%; background-size: cover;">
                

</body>
</html> 
