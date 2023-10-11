<?php
namespace htdocs\To\classes\validition;
//tom make immplement to interface
//1 require
require_once 'Validetor.php';
//2 use name space
use  htdocs\To\classes\validition\Validetor;
class Str implements Validetor{
    public function check($key , $value){
        if(is_numeric($value)){
            return "this $key must be string";
        }else{
            return false;
        }
        
    }
}

?>