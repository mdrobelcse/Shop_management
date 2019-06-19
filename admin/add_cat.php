<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
<?php
    
   if($_SERVER['REQUEST_METHOD']=='POST'){

       $catname = $_POST['catname'];

       $Addnewcat = $cat->addnewcat($catname);
  }

?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
         <div>
          <h1>Add new category</h1>

         
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">

               <?php
         
                  if (isset($Addnewcat)) {
               
                      echo $Addnewcat;
                 }

              ?>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category name</label>
                    <input class="form-control" name="catname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
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