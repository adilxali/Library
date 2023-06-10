<?php
function active($url){
    return $_SERVER['REQUEST_URI'] === $url ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
}
?>