<?php
require_once 'init.php';

$webHook = $sender->setWebHook('webHook.php');
echo $webHook;

if ($webHook){
    echo $webHook;
}