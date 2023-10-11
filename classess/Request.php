<?php
namespace htdocs\To\classes;
class Request {
    public function get($key)
    {
        return(isset($_GET[$key]))?$_GET[$key]:"key not found";
    }
    public function post($key)
    {
        return(isset($_POST[$key]))? $_POST[$key]:"key";
    }
    //handle post issset request and return true or false
    public function checkpost($key){
        return isset($_POST[$key]);
    }
    //clean
    public function clean($key){
        return trim(htmlspecialchars($key));
    }
    public function checkGet($key){
        return isset($_GET[$key]);

    }
    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD'];

    }
   
    //header location
    public function header($file){
        return header("location:$file");
    }
}

?>