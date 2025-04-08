<?php 

if (!function_exists('dd')){
    function dd(...$data){
        echo "<body bgcolor='black'>";
        echo "<pre style='background-color-black; color:#0dbb2a; font-family: monospace'>";
        print_r($data);
        echo "</pre>";
        exit();
    }
}

?>