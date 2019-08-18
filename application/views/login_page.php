<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SNAPSHOT - SL ROBOTICS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head> 
<body style="background: #E6E6FA;">


<div class="container" style="float:left; width:50%; margin-top: 100px;" >
	<div class="row">
		<div class="col-md-6 col-sm-offset-4">

			<div class="login-panel panel" style="background: #F2F2F2"> 
		        <div class="panel-heading" style="background: #5DADE2;">
		            <h2 class="panel-title" style="text-align: center"><span class="glyphicon glyphicon-lock"></span> Login</h2>
		        </div>
		    	<div class="panel-body" >
		        	<form method="POST" action="<?php echo base_url(); ?>index.php/user/login" >
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Enter Email" type="text" name="email" required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Enter Password" type="password" name="password" required>
		                	</div>
		                	<button type="submit" class="btn btn-lg btn-warning btn-block" style="background: #5DADE2; border-color: #B2BABB;"><span class="glyphicon glyphicon-log-in"></span> Login</button>
									</fieldset>
									<a href="#" id="signup" class=signup>Already have an account? Sign in here!</a>
		        	</form>
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
</div>
		
					
<div class="container2" style="float:right; width:50%; margin-top: 100px;" >
<div class="row">
<div class="col-md-6 col-sm-offset-0">

					<div class="signup-panel panel " style="background: #F2F2F2" >
								<div class="panel-heading  " style="background: #5DADE2;">
											<h2 class="panel-title" style="text-align: center"><span class="glyphicon glyphicon-user"></span> Sign Up </h2>
								</div>
                <div class="panel-body" >
                <form action="<?php echo base_url(); ?>index.php/user/signup"  method="POST">
                    <input class="form-control" type="text" name="firstName" placeholder="First Name" required>
                    <br>
                    
                    <input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
                    <br>

                    <input class="form-control" type="email" name="email" placeholder="Email"  required>
                    <br>

                    <input class="form-control" type="email" name="email2" placeholder="Confirm Email"  required>
                    <br>

                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                    <br>
                    <input class="form-control" type="password" name="password2" placeholder="Confirm Password" required>
                    <br>
                    
                    <button type="submit" class="btn btn-lg btn-warning btn-block" style="background: #5DADE2; border-color: #B2BABB;"><span class="glyphicon glyphicon-pencil"></span> Sign up </button>
                    <br>
                   
                    <a href="#" id="signin" class=signin>Need an account? Register here!</a>
                </form> 
                </div>
</div>
</div>
</div>
</div>
			
		

</body>
</html>