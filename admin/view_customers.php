<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
 <?php
 
     if (isset($_GET['viewcusid'])){

          $viewcusid = $_GET['viewcusid'];
     }
 
 ?>


    <!--main content-->
    <main class="app-content">
      <div class="app-title">
         <div>
          <h1>Update customers</h1>

         
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
              
                <form action="" method="post">

             <?php

                   $Getcusbyidforview = $cus->getcusbyidforview($viewcusid);
                   if($Getcusbyidforview) {
                    while($result = $Getcusbyidforview->fetch_assoc()) {
                      
              ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Customers name</label>
                    <input class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['name']; ?>" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Customers E-mail</label>
                    <input class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['email']; ?>" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input class="form-control" name="city" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['city']; ?>" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Zipcode</label>
                    <input class="form-control" name="zipcode" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['zipcode']; ?>" readonly="">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact</label>
                    <input class="form-control" name="contact" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['contact']; ?>" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['address']; ?>" readonly="">
                  </div>


             <?php } } ?>    
             

                </form>
                <a class="btn btn-danger" href="all_customers.php">Go back</a>
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