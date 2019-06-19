<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
<?php include 'inc/sidebar.php'; ?>   
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Rent Items</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Item Name</th>
                    <th>quantity</th>
					<th>Price</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>

            
                  <tr>
                    <td>01</td>
                    <td>Table</td>
					<td>2</td>
					<td>$14</td>
                    <td>
 

                            <a onclick="return confirm('do you want to rent?');" href="rent.php">delete</a>
                  
                    </td>
                  </tr>
				  
				  
				   <tr>
                    <td>02</td>
                    <td>Table</td>
					<td>2</td>
					<td>$14</td>
                    <td>
 

                            <a onclick="return confirm('do you want to rent?');" href="rent.php">delete</a>
                  
                    </td>
                  </tr>
         
     
                </tbody>
              </table>
            </div>
            <a class="btn btn-success" href="stock.php">add more item</a>  <a class="btn btn-success pull-right" href="customer_info.php">confirm rent</a>
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