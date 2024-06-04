<?php 
class view{
    public static function show ($viewname, $data=null){
        include ("$viewname.php");
    }
}
?>