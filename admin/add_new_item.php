<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
 <?php
    
   if($_SERVER['REQUEST_METHOD']=='POST'){

       $Addnewitem = $item->addnewitem($_POST);
  }

?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
         <div>
          <h1>Add new Item</h1>
         
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">

                 <?php
         
                  if (isset($Addnewitem)) {
               
                      echo $Addnewitem;
                 }

              ?>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input class="form-control" name="item_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter itema name">
                  </div>

                <div class="form-group">
                    <label for="exampleSelect1">Category</label>
                    <select class="form-control" name="cat_id" id="exampleSelect1">
                    <option selected="selected">Select One</option>
                    <?php

                       $Getallcat = $cat ->getallcat();
                       if($Getallcat){
                        while($result = $Getallcat->fetch_assoc()){
          
                     ?>

                        <option value="<?php echo $result['cat_id'];?>"><?php echo $result['catname'];?></option>

                     <?php } } ?>   
                   
                    </select>
               </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock</label>
                    <input class="form-control" name="stock" id="exampleInputPassword1" type="text" placeholder="Enter Stok number">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Price per day($)</label>
                    <input class="form-control" name="price_p_day" id="exampleInputPassword1" type="text" placeholder="Enter price per day">
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Price per week($)</label>
                    <input class="form-control" name="price_p_week" id="exampleInputPassword1" type="text" placeholder="Enter price per week">
                  </div>
                  

                    <div class="tile-footer">
                     <input class="btn btn-primary" type="submit" name="submit" value="Save">
                    </div>
                </form>
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