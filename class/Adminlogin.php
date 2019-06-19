<?php 
  

   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   //include_once ($filepath.'/../libs/Session.php');
   //Session::checkLogin();
   


 ?>

<?php

 /*
*Adminlogin class
*/
 class Adminlogin{
 	
 	 private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

    } 


        //Admin login check


         public function adminLogin($useremail,$userpass){

          $useremail = $this->fm->validation($useremail);
          $userpass  = $this->fm->validation($userpass);

          $useremail=mysqli_real_escape_string($this->db->link,$useremail);
	        $userpass =mysqli_real_escape_string($this->db->link,md5($userpass));


	       if(empty($useremail) || empty($userpass)){

                  $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong>Field must not be empty!</div>";
                  return $loginmsg;

	       }else if(!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
              $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email address ! </div>";
                return $loginmsg;
         }else{


                  $query="SELECT * FROM tbl_admin WHERE useremail='$useremail' AND userpass='$userpass'";
                  $result=$this->db->select($query);
                  if($result!=false){

                      $value =$result->fetch_assoc();
                      Session::set("login",true);
                      Session::set("id",$value['id']);
                      Session::set("role",$value['role']);
                      Session::set("useremail",$value['useremail']);
                      Session::set("status",$value['status']);
                      
                      header("Location:index.php");
                       
                  }else{

                        $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                        <strong>Error!</strong> E-mail or password Not match !</div>";
                        return $loginmsg;
                  }


	       }

     }





     //Add new admin


     public function addnewadmin($useremail,$userpass){

           
          $useremail = $this->fm->validation($useremail);
          $userpass  = $this->fm->validation($userpass);

          $useremail=mysqli_real_escape_string($this->db->link,$useremail);
          $userpass =mysqli_real_escape_string($this->db->link,md5($userpass));


          if (empty($useremail) || empty($userpass)) {
           
                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Field must not be empty !</div>";
                return $msg;

          }else if(!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email address ! </div>";
                return $msg;
         }else{


              $queryone = "SELECT * FROM tbl_admin WHERE useremail='$useremail'";
              $check_email = $this->db->select($queryone);
              if ($check_email) {
                
                      $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail already exist ! </div>";
                      return $msg;
      
              }else{

                  $query= "INSERT INTO tbl_admin(useremail,userpass) VALUES('$useremail','$userpass')";
                  $add_admin = $this->db->insert($query);
                  if ($add_admin) {
                        
                          $msg= "<div style='font-weight:bold'; class='alert alert-success'>
                          <strong>Success !</strong> Admin added successfully. </div>";
                          return $msg;   

                       }else{
                       
                           $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                           <strong>Error!</strong> Admin no added ! </div>";
                           return $msg;

                      }


              }



         }//end else

  }//end method




 //all admin list


  public function getalladmin(){

      $query = "SELECT * FROM tbl_admin ORDER BY id";
      $result = $this->db->select($query);
      return $result;
 
  }




  //delete admin


  public function deleteadmin($admindelid){



        $query = "DELETE FROM tbl_admin WHERE id='$admindelid'";
        $result = $this->db->delete($query);
        if ($result) {
           
             $msg= "<div style='font-weight:bold'; class='alert alert-success'>
             <strong>Success !</strong> Admin deleted successfully. </div>";
             return $msg;

        }else{

            $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
            <strong>Error!</strong> Admin no deleted ! </div>";
            return $msg;

        }


  }




 }
?>