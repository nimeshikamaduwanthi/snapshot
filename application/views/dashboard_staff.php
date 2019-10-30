<?php
$user = $this->session->userdata('user');
// extract($user);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User DASHBOARD - SL ROBOTICS </title>
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
				
    }
</style>
<?php if ($_SESSION['user_type_id'] == '2') {
    include "header_user.php";
} else {
     include "header_admin.php";
}?>
<body >

<img src="<?php echo base_url();?>assets/img/sll.jpg" style="width:100%;">
</body>
</html>