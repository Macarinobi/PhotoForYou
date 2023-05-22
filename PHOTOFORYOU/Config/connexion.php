<?php

try {
    $bd = new PDO("mysql:host=localhost;dbname=photoforyou;charset=utf8","root","" );
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    $e->getMessage(); 
}