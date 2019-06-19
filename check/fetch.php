<?php
   

  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/class/Item.php');
	$item = new Item();


   if ($_SERVER['REQUEST_METHOD']=='POST') {
    	   
           $dayorweekId     = $_POST['dayorweekId'];
           $Getalltimedu = $item->getalltimedu($dayorweekId); 

   }


?>