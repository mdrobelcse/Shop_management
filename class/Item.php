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


    //add new item 

     public function addnewitem($data){


    $item_name=mysqli_real_escape_string($this->db->link,$data['item_name']);
    $cat_id=mysqli_real_escape_string($this->db->link,$data['cat_id']);
    $stock=mysqli_real_escape_string($this->db->link,$data['stock']);
    $price_p_day=mysqli_real_escape_string($this->db->link,$data['price_p_day']);
    $price_p_week=mysqli_real_escape_string($this->db->link,$data['price_p_week']);


    if (empty($item_name) || empty($cat_id) || empty($stock) || empty($price_p_day) || empty($price_p_week)) {
            $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
            return $msg;
    }else{


          $query = "SELECT * FROM tbl_all_item WHERE item_name='$item_name'";
          $check_item = $this->db->select($query);
          if ($check_item) {
              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item already exist ! </div>";
               return $msg;
          }else{

              $query = "INSERT INTO tbl_all_item(item_name,qty,cat_id,stock,price_p_day,price_p_week) VALUES('$item_name',$stock,'$cat_id','$stock','$price_p_day','$price_p_week')";
               $inserted_row = $this->db->insert($query);
               if ($inserted_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Item added succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item not added ! </div>";
                    return $msg;
               }


          }

    }
   
     
  }



  // get all item

   public function getallite(){

   	      $query="SELECT tbl_all_item.*,tbl_cat.catname FROM tbl_all_item
            INNER JOIN tbl_cat
            ON tbl_all_item.cat_id=tbl_cat.cat_id
            ORDER BY tbl_all_item.id DESC";

            $result=$this->db->select($query);
            return $result;
   }


   //edit item

   public function getitembyid($edititemid){

         $query = "SELECT * FROM tbl_all_item WHERE id='$edititemid'";
        $selected_row = $this->db->select($query);
        return $selected_row; 


   }

   //update item

      public function updateitem($data,$edititemid){


    $item_name=mysqli_real_escape_string($this->db->link,$data['item_name']);
    $cat_id=mysqli_real_escape_string($this->db->link,$data['cat_id']);
    $stock=mysqli_real_escape_string($this->db->link,$data['stock']);
    $price_p_day=mysqli_real_escape_string($this->db->link,$data['price_p_day']);
    $price_p_week=mysqli_real_escape_string($this->db->link,$data['price_p_week']);


    if (empty($item_name) || empty($cat_id) || empty($stock) || empty($price_p_day) || empty($price_p_week)) {
            $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
            return $msg;
    }else{


          $query = "SELECT * FROM tbl_all_item WHERE item_name='$item_name'";
          $check_item = $this->db->select($query);
          if ($check_item) {
              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item already exist ! </div>";
               return $msg;
          }else{

              $query = "UPDATE
               tbl_all_item
               SET 
               item_name = '$item_name', 
               cat_id = '$cat_id', 
               stock = '$stock', 
               price_p_day = '$price_p_day', 
               price_p_week = '$price_p_week'

                WHERE id='$edititemid'";
               $updated_row = $this->db->update($query);
               if ($updated_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Item updated succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item not updated ! </div>";
                    return $msg;
               }


          }

    }
   
     
  }


  //delete item by id


  public function deleteitembyid($delitemid){

         $query ="DELETE FROM tbl_all_item WHERE id='$delitemid'";
         $deleted_row = $this->db->delete($query);
         if ($deleted_row) {
             $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Item deleted succesfully </div>";
             return $msg;
         }else{

              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item not updated ! </div>";
              return $msg;
         }

  }


  //get all stock item   deleterentitemfromtable

  public function getallstockitem(){

      /*  $query = "SELECT * FROM tbl_all_item ORDER BY id DESC"; rentitem
        $selected_row = $this->db->select($query);
        return $selected_row; 
      */

         $query="SELECT tbl_all_item.*,tbl_cat.catname FROM tbl_all_item
            INNER JOIN tbl_cat
            ON tbl_all_item.cat_id=tbl_cat.cat_id
            ORDER BY tbl_all_item.id DESC";

            $result=$this->db->select($query);
            return $result;

  }


  //rent item 


  public function rentitem($data, $itemid){



        $price       = mysqli_real_escape_string($this->db->link,$data['price']);
        $itemname    = mysqli_real_escape_string($this->db->link,$data['itemname']);
        $quantity    = mysqli_real_escape_string($this->db->link,$data['quantity']);
        $time        = mysqli_real_escape_string($this->db->link,$data['time']);


        //**




      if($time=='One day') {

            // $price = 2*1;
            $time = 1;
            
         
       }elseif($time=='Two day'){

            // $price = 2*2;
            $time = 2;
            

       }elseif($time=='Three day'){
 
            // $price = 2*3;
            $time = 3;
           
        
       }elseif($time=='Four day'){

            // $price = 2*4;
            $time = 4;
            

       }elseif($time=='Five day'){

            // $price = 2*5;
            $time = 5;
            

       }elseif($time=='Six day'){

            // $price = 2*6;
            $time = 6;
            

       }elseif($time=='One week'){

            // $price = 2*7;
            $time = 7;
            

       }elseif($time=='Two week'){
 
            // $price = 2*14;
            $time = 14;
            
        
       }elseif($time=='Three week'){

           // $price = 2*21;
           $time = 21;
           

       }elseif($time=='Four week'){

           // $price = 2*28;
           $time = 28;

       } 




        //**


 
        $sid       =session_id(); 
        $Today=date('d:m:Y');

        $NewDate=Date('d:m:Y', strtotime("+$time days"))."<br/>";
        

         $itemprice = $price*$quantity*$time;

        if (empty($itemname) || empty($quantity) || empty($time)) {
            
             $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
              return $msg;
        }else{

//**
            $query="INSERT INTO tbl_rent_item(sid,itemname,time,quantity,price,due_date,ret_data) VALUES('$sid','$itemname','$time','$quantity','$itemprice','$Today','$NewDate')";


 //**           
            $result = $this->db->insert( $query);
            if ($result) {

               

               $query = "SELECT * FROM tbl_all_item WHERE id='$itemid'";
               $select_stock=$this->db->select($query)->fetch_assoc();
               $total = $select_stock['stock'];
               //5-2=3
               $rem = $total-$quantity;

               $query = "UPDATE tbl_all_item

                     SET 
                     stock='$rem'
                     WHERE id='$itemid'";

                     $update_stock = $this->db->update($query);
                     if ($update_stock) {
                       
                         echo "<script type='text/javascript'>window.top.location='additem_forrent.php';</script>";
                         exit;

                     }else{

                         $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                        <strong>Error!</strong> something is missing !</div>";
                        return $msg;
                     }

               // $msg= "<div style='font-weight:bold'; class='alert alert-success'>
               //        <strong>success!</strong> Item added </div>";
               // return $msg;

              // echo "<script type='text/javascript'>window.top.location='additem_forrent.php';</script>";
              // exit;


            }else{

                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Item no added </div>";
                return $msg;
            }//end second else

        }//end 1st else 

  
  }//end method


  //get all item by spacific customers

   public function getitembyspacificcustomers(){


        $query = "SELECT * FROM tbl_rent_item WHERE status='0' ORDER BY id DESC";
        $selected_row = $this->db->select($query);
        return $selected_row; 

   }


   //delete  rent  item  fromtable  

   public function deleterentitemfromtable($delrentitemid){




     //************


              $query = "SELECT * FROM tbl_rent_item WHERE id='$delrentitemid'";
              $select_quantity=$this->db->select($query)->fetch_assoc();
              $quantity  = $select_quantity['quantity'];
              $itemname  = $select_quantity['itemname'];



              $querytwo = "SELECT * FROM tbl_all_item WHERE item_name='$itemname'";
              $result = $this->db->select($querytwo)->fetch_assoc();
              

              $current_stock = $result['stock'];


              $total_stock = $current_stock+$quantity;


              $querythree = "UPDATE tbl_all_item

                             SET 

                             stock='$total_stock'

                             WHERE item_name='$itemname'";


              $updated_stock = $this->db->update($querythree);               

    //********

              if ($updated_stock) {




                            $query = "DELETE FROM tbl_rent_item WHERE id='$delrentitemid'";
                            $deleted_row = $this->db->delete($query);
                           if ($deleted_row) {
                               $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                                        <strong>success !</strong> Item deleted succesfully </div>";
                               return $msg;
                           }else{

                                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                                        <strong>Error!</strong> Item not updated ! </div>";
                                return $msg;
                           }
                                   
              }


   }


   //rent item to customers


   public function rentitemtocustomers($data){

        $cus_name       = mysqli_real_escape_string($this->db->link,$data['cus_name']);
        $cus_email      = mysqli_real_escape_string($this->db->link,$data['cus_email']);
       
        if (empty($cus_name) || empty($cus_email)) {
           
               $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Field must not be empty ! </div>";
               return $msg;
        }else{

            $query = "UPDATE tbl_rent_item

                  SET 
                  cus_name  = '$cus_name',
                  cus_email = '$cus_email'
                  WHERE status = '0'";


           $updated_row = $this->db->insert($query);
           if ($updated_row) {



                  $query = "UPDATE tbl_rent_item

                  SET 
                  status = '1'
                  WHERE cus_email = '$cus_email'";
                 $updated_row = $this->db->insert($query);

                 if ($updated_row) {

                      $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>Success !</strong> Rent succesfully </div>";
                      return $msg;
                   
                 }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> something is missing ! </div>";
                     return $msg;

                 }
                
           }else{

               $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> something is missing ! </div>";
               return $msg;

           }
        }

   }


   //get all rental item

   public function getallrentalitem(){

           $query = "SELECT * FROM tbl_rent_item WHERE status='1' ORDER BY id DESC";
           $selected_row = $this->db->select($query);
           return $selected_row;  

   }


   //Return item


   public function returnitem($returnitemid){

         
           $queryone = "SELECT * FROM tbl_rent_item WHERE id='$returnitemid'";
           $selected_row = $this->db->select($queryone)->fetch_assoc();
           $itemname = $selected_row['itemname'];
           $qty      = $selected_row['quantity'];//$qty = 2;

           if($selected_row){

                $querytwo = "SELECT * FROM tbl_all_item WHERE item_name='$itemname'";
                $resultone = $this->db->select($querytwo)->fetch_assoc();
                $stock = $resultone['stock'];
                /* $stock = 0;
                 $update_stock = $stock+$qty;
                 $update_stock = 0+2;   
                                 =2;   
                */    

                $update_stock = $stock+$qty; 


                $querythree = "UPDATE tbl_all_item

                               SET 
                               stock='$update_stock'
                               WHERE item_name = '$itemname'";

               $updated_row = $this->db->update($querythree);    
               if ($updated_row){
                             

                      $queryfour  = "DELETE FROM tbl_rent_item WHERE id='$returnitemid'";
                      $delete_row = $this->db->delete($queryfour);
                      if($delete_row) {
                       
                           $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                          <strong>Success !</strong> Item Returned succesfully </div>";
                           return $msg;

                      }else{

                              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                              <strong>Error!</strong> something is missing ! </div>";
                              return $msg;
                      }

                  }           


           } //end if
           

   } //end method


   //current on rent item

       public function currentonrent(){

            // $query = "SELECT * FROM tbl_all_item ORDER BY id DESC"; 
            // $result = $this->db->select($query);
            // return $result; 

             $query="SELECT tbl_all_item.*,tbl_cat.catname FROM tbl_all_item
            INNER JOIN tbl_cat
            ON tbl_all_item.cat_id=tbl_cat.cat_id
            ORDER BY tbl_all_item.id DESC";

            $result=$this->db->select($query);
            return $result;


       }



     //get rental conditon
     

     public function getrentcondition(){

        $query = "SELECT * FROM tbl_rentcondition ORDER BY conid"; 
        $result = $this->db->select($query);
        return $result;


     }  



     // get all timedu  


     public function getalltimedu($dayorweekId){

        $output = '';

        $query = "SELECT * FROM tbl_timedu WHERE conid='$dayorweekId'"; 
        $result = $this->db->select($query);

        $output .= '<option value="'.$result["id"].'">'.$result["timedu"].'</option>';
        
        echo $output;

     }
   



 }
?>