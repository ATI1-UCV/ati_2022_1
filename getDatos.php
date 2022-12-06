<?php
    if(!isset($x)){
        $x = 1;
    }else{
        $x += 1;
    }
    setcookie("x", $x);

    function getDatos($myci) {
        $str = $myci +'/perfil.json';
        $json = file_get_contents($str);
        return $json;
        
    }



?>