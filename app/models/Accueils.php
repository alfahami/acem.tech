<?php
class Accueils {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM posts ORDER BY published_at DESC LIMIT 5');

        return $this->db->resultSet();
    }

    public function PostsByUsers(){
        $this->db->query("SELECT p.*, u.id, u.firstname, u.lastname, u.bio, u.created_at, u.picture_name
                               FROM posts p INNER JOIN users u ON
                               p.user_id = u.id ORDER BY p.published_at DESC");
        $this->db->execute();
        return $this->db->resultSet();
    }
}
