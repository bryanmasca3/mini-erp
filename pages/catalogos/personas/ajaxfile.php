<?php

   $destination_path = getcwd().DIRECTORY_SEPARATOR;
  
   $response = 0;
   for ($i = 0; $i < count($_FILES); $i++) {
         $target_path = $destination_path.basename($_FILES["file_".$i]["name"]);
         if(move_uploaded_file($_FILES['file_'.$i]['tmp_name'],$target_path)){
            $response = 1;
         }          
   }      
   echo $response;
   exit;

?>