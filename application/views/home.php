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