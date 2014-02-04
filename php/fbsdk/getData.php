<?php
require 'index.php';

function doOperation($var)
{
   //then work with the var data
      if ($target)
              {
           <?php
			    $search_name=$var["name"];
			    $target;
    
    	    foreach ($friends["data"] as $value) {
            
            if ($search_name == $value["name"])
              {
              //echo "Have a good day!";
              $target = $value;
              }
           
            //echo '</li>';
        }
        //echo '</ul>';
        if ($target)
              {
             
              
              
              echo $target["name"]; 


              }
    
}

if(isset($_POST))
{
   doOperation($_POST);
}

if(isset($_GET))
{
   doOperation($_GET);
}

?>