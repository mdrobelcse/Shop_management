<?php


if ($_SERVER['REQUEST_METHOD']=='POST') {
       
          $sid       =session_id(); 

          $price = $_POST['price'];
          $itemname = $_POST['itemname'];
          $quantity = $_POST['quantity'];
          $time = $_POST['time'];
         
         echo "<pre>";

         echo "Price :".$price."<br>";
         echo "item name :".$itemname."<br>";
         echo "quantity :".$quantity."<br>";
         echo "time :".$time."<br>";
         echo "session id :".$sid."<br>";

         echo "</pre>";

}


?>









