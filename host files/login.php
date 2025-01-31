<?php 
require 'connect.php';
$errorMsg = "";
$errors = [];
$success = "";





if(isset($_POST["login"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = '';

        if(count($errors) === 0) {
					
          $query = "SELECT * FROM users WHERE email = '$email'";
					$query_result = mysqli_query($conn, $query);
					$user = mysqli_fetch_array($query_result);
					$count = mysqli_num_rows($query_result);

					if (password_verify($password, $user['password_hash'])) {
						$_SESSION['email'] = $user['email'];
						$_SESSION['mgs'] = 'You are logged in';
						header("Location: userpage.php");
					}else {
						$errors['login-error'] = 'invalid credential';
					}
               

        }        
        
}
    
            
 ?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#333" />
		<link rel="manifest" href="/manifest.json" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="newcss.css">

    <title>Sign Up</title>

  </head>
  <body>       
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #32465a;">
            <a class="navbar-brand" href="#"><img
					src="https://res.cloudinary.com/angelae/image/upload/v1569493481/Start-ng-Pre-internship/n2mmwn3pvnbjuaqjjkj3.png"
					alt="Logo"
					style="width: 63px; height: 63px; padding: 10px;"
				/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#why-spendless">Why SpendLess?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#how-it-works">How it Works</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="content.html#support">Support</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="faq.html">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-md-3 px-4" href="index.html#about-us">About Us</a>
                </li>
                <a href="signup.php" class="nav-item py-md-3 px-4 btn btn-outline-warning">GET STARTED</a>

              </ul>
              
            </div>
          </nav>
          

            <section class="signup">
                <div class="container h-100">
                        
                    <div class="signup-content">
                        
                        <form class="formSize" method="POST" action="login.php" name="LoginForm">
                        <?php if(isset($_SESSION['mgs'])):?>
                            <div class='alert alert-success'>
                              <?php
                                  echo $_SESSION['mgs'];
                                  unset($_SESSION['mgs']);
                              ?>
                            </div>
                              <?php endif;?>
                          
                              <?php if(count($errors) > 0):?>
                          <div >
                            <?php
                                foreach ($errors as $error) {
                                  echo "<p class='text-danger text-center'>$error</p>";
                                }
                                ?>
                          </div>
                              <?php endif;?>
                                <div class="formHeader col-12">Welcome </div>
                           
                            <div class="form-row">
                              <div class="form-group col-12">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter Email" required>
                                <div class="errorMessage" id="email_error"></div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-12">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                                <div class="errorMessage" id="password_error"></div>
                              </div>
                            </div>
                            
                            <div class="form-row">
                              <div class="form-group col-12">
                                <input type="hidden" name="agree-term" id="agree-term" class="agree-term" required="required"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span></label>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <button type="submit" name='submit' class="btn btn-outline-warning btn-lg btn-block ">Sign In</button>
                                </div>
                            </div>
                            <p>Forgot password? Click <a href="forgotpassword.php">here</a></p>
                        </form>
                        
                    </div>
                </div>
            </section>
    
       
               
                 
        <footer class="footer">
                <div class="footerText"> Team Ganymede - HNGi6 &copy; 2019.  <a href="#"><i class="fa fa-angle-double-up fa-2x"></i></a></div>
                
               
            </footer>
         

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="newjs.js"></script>
</body>
</html>