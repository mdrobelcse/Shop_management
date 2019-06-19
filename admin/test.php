<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "rental_shop");
$con = '';
$query = "SELECT con FROM time_condition GROUP BY con ORDER BY con ASC";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
 $con .= '<option value="'.$row["con"].'">'.$row["con"].'</option>';
}
?>

<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
 <?php

     if (isset($_GET['itemid'])) {
        $itemid = $_GET['itemid'];
     }

 ?>
 <?php

    if ($_SERVER['REQUEST_METHOD']=='POST') {
       

          $Rentitem = $item->rentitem($_POST, $itemid);
    }


 ?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
         <div>
          <h1>Rent Items</h1>
          <?php

               if (isset($Rentitem)) {
                   echo $Rentitem;
               }
          ?>
         
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <?php

                     $Getitembyid = $item->getitembyid($itemid);
                     if($Getitembyid) {
                     while($value = $Getitembyid->fetch_assoc()) {


                        

                ?>
                <form action="" method="post">

                <!--hidden field-->

              
                   <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="hidden" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $value['price_p_day']; ?>">
                  </div>

                <!---->
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item name</label>
                    <input class="form-control" name="itemname" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $value['item_name']; ?>" readonly="">
                  </div>
              
                 <div class="form-group">
                    <label for="exampleSelect1">Item quantity</label>
                    <select class="form-control" name="quantity" id="exampleSelect1">
            
                      <option selected="selected">Select one</option>

                          <?php

                                  $quantity = $value['stock'];
                                  while ($quantity>0) {
                            
                          ?>

                          <option value="<?php echo $quantity; ?>"><?php echo $quantity; ?></option>

                          <?php  $quantity--; } ?>
                      
                      
                    </select>
                  </div>

                 <!--  <div class="form-group">
                    <label for="exampleSelect1">Time Duration</label>
                    <select class="form-control" name="time" id="exampleSelect1">
            
                      <option selected="selected">Select one</option>
                      <option value="One day">One day</option>
                      <option value="Two day">Two day</option>
                      <option value="Three day">Three day</option>
                      <option value="Four day">Four day</option>
                      <option value="Five day">Five day</option>
                      <option value="Six day">Six day</option>
                      <option value="One week">One week</option>
                      <option value="Two week">Two week</option>
                      <option value="Three week">Three week</option>
                      <option value="Four week">Four week</option>
                       
                      
                      
                      
                    </select>
                  </div> -->





                  <div class="form-group">
                    <label for="exampleSelect1">Rent Condition(Day/Weekly)</label>

                           <select name="con" id="con" class="form-control action">
                                <option value="" selected="">Select condition</option>
                                <?php echo $con; ?>
                           </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Time duration</label>

                           <select name="time" id="time" class="form-control action">
                            <!-- <option value="">Select time</option> -->
                           </select>
                  </div>
          

                    <div class="tile-footer">
                     <input class="btn btn-primary" type="submit" name="submit" value="Save">
                    </div>
                </form>
              
              <?php } } ?>

              </div>
            </div>
             
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "con")
   {
    result = 'time';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>






