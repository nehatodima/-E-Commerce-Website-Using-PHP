<?php
function addtocart($image,$title,$desc,$cost,$id){
$component = "  
<div class=\"card mb-3 px-6\" style=\"max-width: 540px;\">
  <div class=\"row no-gutters\">
    <div class=\"col-md-4\">
      <img src=\"../php/$image\" class=\"card-img\" style=\"width:200px ,height:270p\" >
    </div>
    <div class=\"col-md-8\">
      <div class=\"card-body\">
        <h5 class=\"card-title\">$title</h5>
        <p class=\"card-text\">This is a wider card with supporting text below as a natural  .</p>
        <p class=\"card-text\">$cost</p>
         <button class=\"btn btn btn-warning    \" action=\"\" type=\"submit\">Save for later</button>
      
          
           <form class=\"form-inline\" \"action=\"\" method=\"POST\">
    <input type=\"submit\" class=\"btn btn-danger\" value=\"Remove\" name=\"remo\"><input type=\"hidden\" name=\"idd\" value=\"$id\"></input>
   
</form>
      </div>
    </div>
  </div>
</div>
";
echo $component;

}

?>

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
  
     <?php include "../php/header.php" ?>
     <h3>My Cart</h3>
  
 <div class="container">
  <div class = "row">
    <div class = "col-md-6  px-0" >
         
<?php
session_start();
$sum =0;
$a =0;
$receivedcart = array();
if(isset( $_SESSION["user"]))
{
$con = mysqli_connect('localhost','root',"","ecommercedata");
if(!$con){
  die("connection failed due to".mysqli_connect_error()); echo "</br>";
}
else
{ 
 // echo "Success";
}
mysqli_select_db($con,'ecommercedata');
            $userr = $_SESSION["user"] ;
$sql = "SELECT cart_id from `session` WHERE user='$userr'";
$result = mysqli_query($con, $sql);  
        // echo "result".$result;
        $count = mysqli_num_rows($result);  
          
        if($count == 0){  
            echo "<h1><center> Your cart is empty </center></h1>";   
        }   
        else
        {
           while($row = mysqli_fetch_assoc($result)) {
        $resultt = $row["cart_id"]; 
         }
         $receivedcart= explode(",", $resultt);
        
        }  
$con->close();
$sum = 0;
if(count($receivedcart) == 0)
{
  echo "Your cart is empty";
}
else
{
$con = mysqli_connect('localhost','root',"","ecommercedata");
if(!$con){
  die("connection failed due to".mysqli_connect_error());
}
else
{
 // echo "Success";
}
mysqli_select_db($con,'ecommercedata');
$sql = "SELECT id,title, cost, image FROM productsdata where id in (".implode(',',$receivedcart).")";
$result = $con->query($sql);
if ( isset($result->num_rows) && $result->num_rows >0) {
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $a = $a +1;
    addtocart($row["image"],$row["title"],"denim jeans",$row["cost"] ,$row["id"]); 
    $sum = $sum +$row["cost"];
  }
}
  $con->close();
}
} 
if(isset( $_POST["remo"]))
{
  if(count($_SESSION["cartarray"]) != 0)
{
  if (($key = array_search($_POST["idd"], $_SESSION["cartarray"])) !== false) {
    unset($_SESSION["cartarray"][$key]);
    $con = mysqli_connect('localhost','root',"","ecommercedata");
if(!$con){
  die("connection failed due to".mysqli_connect_error()); echo "</br>";
}
else
{ 
 // echo "Success";
}
mysqli_select_db($con,'ecommercedata');
 $cartarrayy = $_SESSION["cartarray"];
            $cartarrayyy = implode (",", $cartarrayy); // $countriesString = "Usa,Russia,Iran"
            $userr = $_SESSION["user"] ;
$sql = "UPDATE `session` SET cart_id='$cartarrayyy' WHERE user='$userr'";
        if (mysqli_query($con, $sql)) {
 // echo "Record updated successfully";
} else {
 // echo "Error updating record: " . mysqli_error($con);
}
$con->close();
}
  

}
}
}
else
{
  echo "<h3>Please Login to continue</h3> ";
}

 ?>

 <?php
$con = mysqli_connect('localhost','root',"","ecommercedata");
if(!$con){
  die("connection failed due to".mysqli_connect_error());
}
else
{
  //echo "Success";
}
mysqli_select_db($con,'ecommercedata');
if(isset($_SESSION["user"]))
{
  $userr = $_SESSION["user"] ; 
  $sql = "SELECT * FROM 'session' where user = '$userr'"; 
        $result = mysqli_query($con, $sql);  
$count =0;
        if($result)
        {
        $count = mysqli_num_rows($result);  
      }

          
        if($count == 1){  
            //echo $_SESSION["cart_id"];
          }
          else
          {
            $cartarrayyy = array();
           if(!isset($_SESSION["cartarray"]))
          {
          $_SESSION["cartarray"] =array("1000");
        }
          if(isset($_SESSION["cartarray"]))
          {

            $cartarrayy = $_SESSION["cartarray"];
            $cartarrayyy = implode (",", $cartarrayy); 
          }
            //$cartarrayyy = implode (",", $cartarrayy); 
            
           $sql = "INSERT INTO `session` (`user`, `cart_id`) VALUES ('$userr', ' $cartarrayyy ');";
            if ($con->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
 // echo "Error: " . $sql . "<br>" . $con->error;
}         
        }  
}
else
{
  echo "no user";
}

$con->close();
?>


  </div>
  <div class = "col-md-6">
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Price Details</h5>
    <pre class="card-text">Price(<?php echo "$a"?> items)                   <?php echo "$sum"?></pre>
    <pre class="card-text">Delivery Charges                 FREE</pre>
    <pre class="card-text">Total Ammount                    <?php echo "$sum"?></pre>
    <a href="./payment.php" class="btn btn-primary">Buy</a>
  </div>
</div>
</div>
</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>



</html>
