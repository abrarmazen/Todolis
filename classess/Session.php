<?php
namespace htdocs\To\classes;
class Session{
    public function __costruct(){
        session_start();
    }
    //set
    public function set($key , $value){
        $_SESSION[$key] = $value;
    }
    //get 
    public function get($key){
        return( $_SESSION[$key]) ?  $_SESSION[$key] : "key not correcrt";
        
    }
    //remove 
    public function remove($key){
       unset($_SESSION[$key]);
    }
    //destroy
    public function destroy(){
        session_destroy();
    }
}
?>