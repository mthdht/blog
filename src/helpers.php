<?php


function dump($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}


function dd($a)
{
    dump($a);
    die();
}