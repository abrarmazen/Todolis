<?php
require_once '../inc/connection.php';
require_once '../App.php';

//submit
if($request->checkpost("submit")){
    $title = $request->clean($request->post("title"));
   //validition name of column and value array of rolls 
   $validition->validate("title" , $title , ["Required","Str"]);
   $errors =  $validition->getError();
 // var_dump($errors);
 if(empty($errors)){
     //insert
     $stm=$conn->prepare("insert into `to-do-list` (`title`) values(:title)");
     $stm->bindParam(":title" , $title , PDO::PARAM_STR);
     $output = $stm->execute();
     if($output){
        $session ->set("success" ,'data insert success');
        $request->header("../index.php");

     }
 }else{
     $session ->set("errors" , $errors);
     $request->header("../index.php");
 }
}else{
    $request->header("../index.php");
}
//catc

//insert
//return errors
//redirect index
