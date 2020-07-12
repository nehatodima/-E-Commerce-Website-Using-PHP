<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container col-md-4 py-md-10">
    <form method="post" style="width:18rem">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" name = "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="register" class="btn btn-primary">Register</button><br/>
  <a href="login.php">Login</a>
</form>
</div>

<?php
if(isset($_POST["register"]))
{
 if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
  {
   
    //echo "<script> location.href = './login.php' </script>";

session_start();
$con = mysqli_connect('localhost','root',"","ecommercedata");
if(!$con){
  die("connection failed due to".mysqli_connect_error());
}
else
{
 // echo "Success";
}
mysqli_select_db($con,'ecommercedata');
$namee = $_POST["name"];
$nameee = $_POST["email"];
$nameeee = $_POST["password"];


$sql ="INSERT INTO `userdata` (`id`, `name`, `email`, `password`) VALUES (NULL,'$namee','$nameee','$nameeee')";
if($con->query($sql) == true){
  echo "Registered Successfully";
  $_SESSION["user"]= $namee;  
  //header("Location : ./php/index.php");
   header("location:login.php");

  }
 else {
  echo "Registration failed";
}
$con->close();
}
  else
  {echo "Please fill all the fields" ;
  }
}

 ?>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

