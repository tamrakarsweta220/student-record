<?php

function to($path=''){

    if(empty($path)) return false;

    $redirectPath=$path.'.php';

    header('Location:'.$redirectPath);
    exit();
}


function imagePath($imagePath='')
{

    return  trim($_SERVER['DOCUMENT_ROOT'].'/php10amcrud/'.$imagePath).'/';

}