<?php

require_once '../inc/connection.php';
require_once '../App.php';
//check submit , id
if($request -> checkGet("id") && $request->checkpost("submit")){
    $id = $request->get("id");
    $title = $request->clean($request->post("title"));
    //validition
    //$validition -> validate("title" , $title , ["Requered" , "str"]);
    $validition->validate("title" , $title , ["Required","Str"]);
    $errors = $validition->getError();
    if(empty($errors)){
        $stm =  $conn ->prepare("select id from `to-do-list` where `id` =:id");
        $stm->bindParam(":id" , $id , PDO::PARAM_INT);
        $stm->execute();
        if($stm->rowCount()>0){

      $stm =  $conn ->prepare("update `to-do-list` set `title` =:title where id=:id");
      $stm->bindParam(":title" , $title , PDO::PARAM_STR);
      $stm->bindParam(":id" , $id , PDO::PARAM_INT);
     $out = $stm->execute();
     if($out){
        $session->set("success" , "date update successfuly");
        $request->header("../index.php");

     }else{
        $session->set("errors" , ["error"]);
        $request->header("../index.php");

     }}else{
        $session->set("errors" , ["not found"]);
        $request->header("../index.php");
     }

    }else{
        $session->set("errors" , $errors);
        $request->header("../edit.php?id=$id");
    }
}else{
    $request->header("../index.php");
}
