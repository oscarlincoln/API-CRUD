<?php

error_reporting(E_ALL);
ini_set('display_error', 1);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');

// including the required files 
include_once('../config/database.php');
include_once('../model/post.php');

//connecting to tye database
$database = new Database;
$db = $database->connect();

$post = new Post($db);

// creating database
