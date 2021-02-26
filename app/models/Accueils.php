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
}
