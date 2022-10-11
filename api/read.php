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

//reding post
$data = $post->read();

$posts['success'] ='';
$posts['data']='';
$oscar = array();
// if there is post in database
if($data->rowCount())
{

    // re-arrange the post 
    while($row = $data->fetch(PDO::FETCH_OBJ))
    {

        array_push($oscar, $row);      
       
    }
    $posts['success']=1;
    $posts['data'] = $oscar;

} 
else
{
    // echo json_encode(['message'=>'no post found']);
    $posts['data'] = 'no data';
    $posts['success']=0;


}


        echo json_encode($posts);
        // echo json_encode($success);
?>
