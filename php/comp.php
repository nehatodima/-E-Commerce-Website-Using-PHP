
<?php
function addproduct($image,$title,$desc,$cost,$id){
$component = " 	
  			<div class=\"col-md-3 col-sm-6 py-md-5\">

  	<div class=\"card\" style=\"width: 18rem; height: 30rem\">
  <img src=\"$image\" class=\"card-img-top\" style=\"width: 18rem; height: 18rem\" >
 
  <div class=\"card-body\">
  	<div  class=\"text-center\">
    <h5 class=\"card-title\">$title</h5>
    <div bg-warning>
    <i class=\"fa fa-star-o\" style=\"font-size:30px\"></i>
   <i class=\"fa fa-star-o\" style=\"font-size:30px\"></i>
      <i class=\"fa fa-star-o\" style=\"font-size:30px\"></i>
         <i class=\"fa fa-star-o\" style=\"font-size:30px\"></i>
            <i class=\"fa fa-star-o\" style=\"font-size:30px\"></i>
   
</div>
    <p class=\"card-text\">$desc</p>
    <p >Rs..$cost</p>
    
    <form action=\"\" method=\"POST\">
    <input type=\"submit\" class=\"btn btn-warning\" value=\"Add To Cart\" name=\"zero\">
    <input type = \"hidden\" name=\"idval\" value=\"$id\"></input>
    </form>
</div>
  </div>
</div>
</div>
";
echo $component;

}

?>

