<?php

function navBarClass($routeName, $class){
    $currentRouteName = Request()->route()->getName();
    if($currentRouteName == $routeName){
        return $class;
    }
}


function generateReferal($auth, $nChar){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.,@-_/';
    $referal = '' ;
    for($i=0; $i < $nChar; $i++){
        $referal .= $char[rand(0,strlen($char)-1)];
    }
        return $auth.$referal;
}