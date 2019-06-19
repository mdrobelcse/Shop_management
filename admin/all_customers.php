<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
<?php

      if (isset($_GET['delcusid'])) {
          
          $delcusid = $_GET['delcusid'];
          $Deletecusbyid =  $cus->deletecusbyid($delcusid);
      }

 ?> 

    <!--main content-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>All Customers</h1><br/><br/>
          <?php

               if (isset($Deletecusbyid)) {
                  echo $Deletecusbyid;
               }

          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>City</th>
					          <th>Zip-code</th>
					          <th>Contact No</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
<?php

      $Getallcustomerslist = $cus->getallcustomerslist();
      if($Getallcustomerslist) {
        $i=0;
      while($result = $Getallcustomerslist->fetch_assoc()) {
        $i++;
       
?>
            
                  <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['name']; ?></td>
                     <td><?php echo $result['email']; ?></td>
                     <td><?php echo $result['city']; ?></td>
          					 <td><?php echo $result['zipcode']; ?></td>
          					 <td><?php echo $result['contact']; ?></td>
                     <td>
 
                            <a href="edit_customers.php?editcusid=<?php echo $result['id'];?>">Edit</a> || 
                            <a onclick="return confirm('Are you sure to delete?');" href="?delcusid=<?php echo $result['id'];?>">Delete</a> || 

                            <a href="view_customers.php?viewcusid=<?php echo $result['id'];?>">View</a>

                  
                     </td>
                  </tr>

 <?php } } ?>                 
		
                </tbody>
              </table>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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