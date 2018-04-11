<?php

//样式
function route_class(){
    return str_replace('.','-',Route::currentRouteName());
}