 <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <title>Hello, world!</title>
    </head>
    <body>
      <div class="container mx-auto" style="width: 500px;">
        <h1><pre>  Enter your details</pre></h1>
        <div class="col-md-12">
      <form method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Phone Number</label>
      <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Address</label>
      <input type="text" class="form-control" name="address" id="exampleFormControlInput1" >
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select your city</label>
      <select class="form-control" name="city" id="exampleFormControlSelect1">
        <option>Hyderabad</option>
        <option>Delhi</option>
        <option>Bangalore</option>
        <option>Kolkatta</option>
        <option>Mumbai</option>
      </select>
    </div>

    <div class="form-check">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
  Payment Method:   
  </div> 
    <div class="col-md-6">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
    <label class="form-check-label" for="exampleRadios1">
          Cash on Delivery
    </label>
  </div>
  </div>
  </div>
  </br>
  <button type="submit" name="order" class="btn btn-primary mx-auto" style="width: 400px;">Place Order</button>
  </form>
  </div>
  <a href="../php/index.php">Go back to shopping?</a>
  </div>




       
  <?php
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
if(isset($_SESSION["user"]))
{
  $userr = $_SESSION["user"] ; 
  $sql = " SELECT * FROM session where user = '$userr' "; 
        $result = mysqli_query($con, $sql);  
$count =0;
 $result = mysqli_query($con, $sql) or die(mysqli_error($con));

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               //echo "Name: " . $row["cart_id"]. "<br>";
                 $_SESSION["paycart"] = $row["cart_id"]; 
            }
         } 
/*$result = mysqli_query($con, $sql);
if(! $result ) {
      //die('Could not get data: ' . mysql_error());
      echo " faile dto get data";
   }
   
   while($row = mysqli_fetch_assoc($result)) {
      $_SESSION["paycart"] = $row["cart_id"]; 
   }

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $_SESSION["paycart"] = $row["cart_id"]; 
  }
          if($result)
        {
        $count = mysqli_num_rows($result);  
      }
      if($count ==1)
      {
        $_SESSION["paycart"] = 
      }
*/
          
 }       

$con->close();
?>






  <?php 

    if(isset( $_SESSION["user"]))
    {
      $user = $_SESSION["user"];
    $con = mysqli_connect('localhost','root',"","ecommercedata");
  if(!$con){
    die("connection failed due to".mysqli_connect_error());
  }
  else
  {
   // echo "Success";
  }
  mysqli_select_db($con,'ecommercedata');
  if(isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["city"]) && (isset($_SESSION["paycart"])))
  {
  $phonee = $_POST["phone"];
  $add = $_POST["address"];
  $cit = $_POST["city"];
  $cart = $_SESSION["paycart"];
  $sql ="INSERT INTO `orders` (`user`, `cart`, `phone`, `address`, `city`) VALUES
   ('$user', '$cart', '$phonee', '$add', '$cit')";
   if(mysqli_query($con, $sql)){
 // if($con->query($sql) == true){
    echo "Order Placed Successfully";
    
   //  header("location:login.php");

    }
   else {
    echo "Order not placed";
  }
}
  $con->close();
    }
    else
    {
      echo "<p>Please login to continue</p>";
    }
  ?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
  </html>
