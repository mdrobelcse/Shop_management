<?php 
  
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   include_once ($filepath.'/../libs/Session.php');

 ?>

<?php

 /*
*Customers class
*/
 class Customers{
 	
 	 private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

    } 

  //add new customers

    public function addnewcustomers($data){


    $name=mysqli_real_escape_string($this->db->link,$data['name']);
    $email=mysqli_real_escape_string($this->db->link,$data['email']);
    $city=mysqli_real_escape_string($this->db->link,$data['city']);
    $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
    $contact=mysqli_real_escape_string($this->db->link,$data['contact']);
    $address=mysqli_real_escape_string($this->db->link,$data['address']);


    if (empty($name) || empty($email) || empty($city) || empty($zipcode) || empty($contact) || empty($address)) {
            $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
            return $msg;
    }else{


          $query = "SELECT * FROM tbl_all_customers WHERE email='$email'";
          $check_email = $this->db->select($query);
          if ($check_email) {
              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail already exist ! </div>";
               return $msg;
          }else{

              $query = "INSERT INTO tbl_all_customers(name,email,city,zipcode,contact,address) VALUES('$name','$email','$city','$zipcode','$contact','$address')";
               $inserted_row = $this->db->insert($query);
               if ($inserted_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Customer added succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Customer not added ! </div>";
                    return $msg;
               }


          }

    }
   
     
  }


  //get all customers

  public function getallcustomerslist(){

          $query = "SELECT * FROM tbl_all_customers ORDER BY id DESC";
          $selected_row = $this->db->select($query);
          return $selected_row; 
  }


//delete customers by customers id

  public function deletecusbyid($delcusid){

          $query ="DELETE FROM tbl_all_customers WHERE id='$delcusid'";
          $deleted_row = $this->db->delete($query);
          if ($deleted_row) {
             $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Customer deleted succesfully </div>";
            return $msg;
          }else{

              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Customer not updated ! </div>";
              return $msg;
          }

  }


  //edit customers

  public function getcusbyid($editcusid){

        $query = "SELECT * FROM tbl_all_customers WHERE id='$editcusid'";
        $selected_row = $this->db->select($query);
        return $selected_row; 


  }

  //update customers

   public function updatecus($data,$editcusid){

             
          $name=mysqli_real_escape_string($this->db->link,$data['name']);
          $email=mysqli_real_escape_string($this->db->link,$data['email']);
          $city=mysqli_real_escape_string($this->db->link,$data['city']);
          $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
          $contact=mysqli_real_escape_string($this->db->link,$data['contact']);


          if (empty($name) || empty($email) || empty($city) || empty($zipcode) || empty($contact)) {
                  $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                            <strong>Error!</strong> field must not be empty ! </div>";
                  return $msg;
          }else{      

          $query = "SELECT * FROM tbl_all_customers WHERE email='$email'";
          $check_email = $this->db->select($query);
          if ($check_email) {
              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail already exist ! </div>";
               return $msg;
          }else{

              $query = "UPDATE tbl_all_customers

               SET 
               name = '$name',
               email = '$email',
               city = '$city',
               zipcode = '$zipcode',
               contact = '$contact'
               WHERE id='$editcusid'";
              
               $updated_row = $this->db->update($query);
               if ($updated_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Customer updated succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Customer not updated ! </div>";
                    return $msg;
               }


          }


      }//end else


   }//end clsss



   //customers details

   public function getcusbyidforview($viewcusid){

        $query = "SELECT * FROM tbl_all_customers WHERE id='$viewcusid'";
        $selected_row = $this->db->select($query);
        return $selected_row;   

   }





 }
?>