<?php
namespace htdocs\To\classes\validition;
require_once 'Required.php';
require_once 'Str.php';
class Validition{
   private $errors= [];
    public function validate($key , $value , $rules){
        foreach($rules as $rule)
        {
            $rule = "htdocs\To\classes\\validition\\".$rule;
            $object = new $rule;
          $error =  $object->check($key , $value);
          if($error != false){
              $this->errors[] =$error;

          }
        }
    }
    public function getError(){
        return $this->errors;
    }
}