<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
 <?php include 'inc/sidebar.php'; ?>   
 <?php 
 
    if (isset($_GET['returnitemid'])) {

         $returnitemid = $_GET['returnitemid'];

         $Returnitem = $item->returnitem($returnitemid);

    }

 ?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>All Rental Items</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php

              if (isset($Returnitem )) {
                echo  $Returnitem;
              }
          ?>
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="5%">Sl No</th>
                    <th width="15%">Customers Name</th>
                    <th width="25%">E-mail</th>
                    <th width="15%">Iteam Name</th>
          					<th width="5%">Iteam quantity</th>
          					<th width="5%">Total Price</th>
          					<th width="10%">Due date</th>
          					<th width="10%">Return Date</th>
                    <th width="5%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>

     <?php

           $Getallrentalitem = $item->getallrentalitem();
           if($Getallrentalitem) {
            $i=0;
           while($result = $Getallrentalitem->fetch_assoc()) {
              
            $i++;

     ?>       
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['cus_name']; ?></td>
                    <td><?php echo $result['cus_email']; ?></td>
                    <td><?php echo $result['itemname']; ?></td>
          					<td><?php echo $result['quantity']; ?></td>
          					<td>$<?php echo $result['price']; ?></td>
          					<td><?php echo $result['due_date']; ?></td>
                    <td><?php echo $result['ret_data']; ?></td> 
                    <td>
 
                            <a onclick="return confirm('Are you sure this item is returned');" href="?returnitemid=<?php echo $result['id'];?>">Return</a>
                  
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