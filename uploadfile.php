<?php
   if(isset($_FILES['myFile'])){
      $errors= array();
      $file_name = $_FILES['myFile']['name'];
      $file_size =$_FILES['myFile']['size'];
      $file_tmp =$_FILES['myFile']['tmp_name'];
      $file_type=$_FILES['myFile']['type'];
      $explode = explode('.',$_FILES['myFile']['name']);
      $text = end($explode);
      $file_ext=strtolower($text);
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<!-- <html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="myFile" />
         <input type="submit"/>
      </form>
      
   </body>
</html> -->