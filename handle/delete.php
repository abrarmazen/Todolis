<?php
require_once "../inc/connection.php";
require_once "../App.php";
if($request->checkGet('id')){
    $id = $request->get("id");
    $stm =  $conn ->prepare("select id from `to-do-list` where `id` =:id");
    $stm->bindParam(":id" , $id);
    $stm->execute();
    if($stm->rowCount()>0){
         $stm=$conn->prepare("delete from `to-do-list` where `id` =:id ");
         $stm->bindParam(":id" , $id);
       $out =  $stm->execute();
       if($out){
        $session->set("success" , ["note sucessfuly delete"]);
        $request->header("../index.php");

       }else{
        $session->set("errors" , ["not found"]);
        $request->header("../index.php");
       }


    }else{
        $session->set("errors" , ["not found"]);
        $request->header("../index.php");
    }

}
else{
    $session->set("errors" , ["not found"]);
    $request->header("../index.php");
}
