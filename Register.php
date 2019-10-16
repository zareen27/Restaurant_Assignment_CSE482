<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: userProfile.php");
}
require_once 'connect.php';

if(isset($_POST['submit'])) {
 
 $fname = strip_tags($_POST['firstname']);
  $lname = strip_tags($_POST['lastname']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
  $gender = strip_tags($_POST['radio']);
   $address = strip_tags($_POST['address']);
 
 $fname = $DBcon->real_escape_string($fname);
 $lname = $DBcon->real_escape_string($lname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); 
 $gender = $DBcon->real_escape_string($gender);
 $address = $DBcon->real_escape_string($address);


 
 $check_email = $DBcon->query("SELECT email FROM userinfo WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO userinfo(firstname,lastname,email,password,gender,address) VALUES('$fname', $lname,'$email','$hashed_password',$gender,$address)";

  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
  }
  
 } else {
  
  
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";
   
 }
 
 $DBcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/materia/bootstrap.min.css">

    
	<!--Adding Jquery-->
	

  
</head>
<body background="images/bgImage.jpg">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-info font-italic" href="#">Golden Peacock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-info" href="Home.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-info" href="Menu.html">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-info" href="Gallery.html">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-info" href="Contact.html">Contact Us</a>
      </li>

    </ul>
    
    <ul class="navbar-nav mr-auto float-right">
      <li class="nav-item ">
        <a class="nav-link text-light bg-info" href="Register.html">Register</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-light bg-info" href="Login.html">Log In</a>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0 text-info" type="submit">Search</button>
    </form>
  
  </div>
</nav>
  <br>
  <br>

 <div class="container">
      <div class="jumbotron bg-light">
      <br>
        
        <?php
       if (isset($msg)) {
      echo $msg;
        }
        ?>


                  <form >
                  <fieldset>
                    <legend class="text-info">Sign Up Today!</legend>

                    <br>
                    <br>
                    

                    <div class="form-group">
                      <label class="col-form-label" for="inputDefault">First Name</label>
                      <input type="text" name="fname" class="form-control" placeholder="firstname" id="inputDefault" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="inputDefault">Last Name</label>
                      <input type="text" name="lname" class="form-control" placeholder="lastname" id="inputDefault" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email"  name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                   
                    
                    <div class="form-group">
                      <label for="exampleTextarea">Address</label>
                      <textarea class="form-control" type="textarea" name="address" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    
                    <fieldset class="form-group">
                      <legend>Gender</legend>
                      <div class="form-check" required>
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="option1" checked="">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="option2">
                          Female
                        </label>
                      </div>
                      <div class="form-check">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" id="optionsRadios3" value="option3">
                          Others
                        </label>
                      </div>
                      
                    </fieldset>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </fieldset>
                </form>

                <br>


   </div>
 </div>






     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>

  <br>
          
            <div class="card-footer text-white bg-info mb-3">
              <div class="card-header">Golden Peacock</div>
                <div class="card-body">
                  <h4 class="card-title">Address</h4>
                     <p class="card-text"> House No, 30 Rd No. 3, Dhaka 1205<br>
                            Hours: <br>
                            Open:12AM Closes:10PM<br>
                            Phone: 01976-437643</p>
                </div>
               </div>
            
          </div>

  </html>