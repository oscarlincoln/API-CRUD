<?php

error_reporting(E_ALL);
ini_set('display_error', 1);

class Post
{
    //post properties
    public $id;
    public $category_id;
    public $title;
    public $body;
    public $author;
    public $created_at;
    public $name;

    //database data
    private $connection;
    private $table = 'post';

    public function __construct($db)
    {
        $this->connection = $db;
    }


    //method to read all the post from the database
    public function read()
    {
       

        //query for reading the post from table
        $query = 'SELECT categories.name as category, post.id,post.category_id,post.title,post.body,post.author,post.created_at FROM '.$this->table.' post LEFT JOIN categories ON post.category_id = categories.id ORDER BY post.created_at DESC';

       

        $post =$this->connection->prepare($query);
        $post->execute();
        return $post;
    }
}