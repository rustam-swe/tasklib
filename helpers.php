<?php 

if (!function_exists('dd')){
    function dd(...$data){
        echo "<body style='background-color: black'>";
        echo "<pre style='background-color-black; color:#0dbb2a; font-family: monospace'>";
        print_r($data);
        echo "</pre>";
        exit();
    }
}

?>
