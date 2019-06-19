<?php 
  
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   include_once ($filepath.'/../libs/Session.php');

 ?>

<?php

 /*
*Item class
*/
 class Item{
 	
 	   private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

    } 


    






 }
?>