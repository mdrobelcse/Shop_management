<?php 
  
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   include_once ($filepath.'/../libs/Session.php');

 ?>

<?php

 /*
*Category class
*/
 class Category{
 	
 	 private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

    } 


   //add new category

    public function addnewcat($catname){

          $catname  = $this->fm->validation($catname);
          $catname=mysqli_real_escape_string($this->db->link,$catname);

          if (empty($catname)){
               
                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
                return $msg;
          }else{


               $query = "INSERT INTO tbl_cat(catname) VALUES('$catname')";
               $inserted_row = $this->db->insert($query);
               if ($inserted_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Category added succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Category not added ! </div>";
                    return $msg;
               }

          }


    }


    //category list

    public function getallcat(){

          $query = "SELECT * FROM tbl_cat ORDER BY cat_id DESC";
          $selected_row = $this->db->select($query);
          return $selected_row; 
    }

    //get cat by id

    public function getcatbyid($editcatid){

        $query = "SELECT * FROM tbl_cat WHERE cat_id='$editcatid'";
        $selected_row = $this->db->select($query);
        return $selected_row; 

    }


    //update category

    public function updatecat($catname, $editcatid){

      $catname=mysqli_real_escape_string($this->db->link,$catname);
       
       if (empty($catname)){
               
                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> field must not be empty ! </div>";
                return $msg;
          }else{

              $query = "UPDATE tbl_cat
              
                SET catname='$catname'
                WHERE cat_id='$editcatid'";

                $updated_row = $this->db->update($query);
              if($updated_row) {
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Category updated succesfully </div>";
                   return $msg;
                }else{
               
                   $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Category not updated ! </div>";
                    return $msg;

                }

          }
    }

    //delete category by id

    public function deletecatbyid($delcatid){

         $query ="DELETE FROM tbl_cat WHERE cat_id='$delcatid'";
         $deleted_row = $this->db->delete($query);
         if ($deleted_row) {
             $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> Category deleted succesfully </div>";
            return $msg;
         }else{

              $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Category not updated ! </div>";
              return $msg;
         }

    }








 }
?>