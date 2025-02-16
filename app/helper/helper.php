<?php

function navBarClass($routeName, $class){
    $currentRouteName = Request()->route()->getName();
    if($currentRouteName == $routeName){
        return $class;
    }
}