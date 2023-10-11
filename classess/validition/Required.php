<?php
namespace htdocs\To\classes\validition;
//tom make immplement to interface
//1 require
require_once 'Validetor.php';
//2 use name space
use  htdocs\To\classes\validition\Validetor;
class Required implements Validetor{
    public function check($key , $value){
        if(empty($value)){
            return "this $key is requered";

        }else{
            return false;
        }

    }
}

?>