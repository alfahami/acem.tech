<?php

/**
 * Class Post
 *
 * @package \\${NAMESPACE}
 */
class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts(user_id, title, body, category, img_name) VALUES(:user_id, :title, :body, :category, :img_name)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':img_name', $data['filename']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostsByUser($user_id)
    {
        $this->db->query("SELECT p.*, u.id as userID, u.firstname as fname, u.lastname as lname
                               FROM posts p INNER JOIN users u ON 
                               p.user_id = u.id WHERE u.id = :user_id ORDER BY p.published_at DESC");
        $this->db->bind(':user_id', $user_id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getPostById($post_id){
        $this->db->query("SELECT * FROM posts WHERE id = :post_id");
        $this->db->bind('post_id', $post_id);

        return $this->db->single();
    }

    public function deletePost($post_id){
        $this->db->query("DELETE FROM posts WHERE id = :post_id");
        $this->db->bind(':post_id', $post_id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
