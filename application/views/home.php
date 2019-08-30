<!-- 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SNAPSHOT - SL ROBOTICS</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>


<div class="container" style="padding-top: 200px">

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="login-panel panel " >
                <div class="panel-heading  " style="background: orange;">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> <h1>Snapshot</h1>
                Login or sign up below!
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/user/login" >
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter username" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" type="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-warning btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        </fieldset>
                        <a href="#" id="signup" class=signup>Need an account? Register here!</a>
                    </form>
                </div>
                 

                 
                <div id="register">
                <div class="panel-body" >
                <form action="<?php echo base_url(); ?>index.php/user/login"  method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" required>
                    <br>
                    
                    <input type="text" name="reg_lname" placeholder="Last Name" required>
                    <br>

                    <input type="email" name="reg_email" placeholder="Email"  required>
                    <br>

                    <input type="email" name="reg_email2" placeholder="Confirm Email"  required>
                    <br>

                    <input type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    
                    <button type="submit" class="btn btn-lg btn-warning btn-block"><span class="glyphicon glyphicon-log-in"></span>"Register" </button>
                    <br>
                   
                    <a href="#" id="signin" class=signin>Already have an account? Sign in here!</a>
                </form>
                </div>
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
            ?>
        </div>
    </div>
</div>
</body>
</html> -->


<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html> -->