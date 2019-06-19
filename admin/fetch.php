<?php
//fetch.php con
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "rental_shop");
 $output = '';
 if($_POST["action"] == "con")
 {
  $query = "SELECT time FROM time_condition WHERE con = '".$_POST["query"]."' ORDER BY id";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select time</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["time"].'">'.$row["time"].'</option>';
  }
 }
 echo $output;
}
?>