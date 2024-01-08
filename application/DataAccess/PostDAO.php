<?php

namespace Application\DataAccess;

use Application\Utilities;

class PostDAO {
    private $db;

    public function __construct($c) {
        $this->db = $c['db'];
    }

    public function getAllPosts() {
        $sql = "SELECT * FROM posts";
        return $this->db->executeQuery($sql);
    }

    public function getPostById($id) {
        $sql = "SELECT * FROM posts WHERE id = $id";
        return $this->db->executeQuery($sql);
    }

    public function createPost($title, $content) {
        $title = $this->db->conn->real_escape_string($title);
        $content = $this->db->conn->real_escape_string($content);
        $datetime = $dt = date('Y-m-d h:i:s');
        $slug = slugify($title);

        $sql = "INSERT INTO posts (title, content, slug, datetime) VALUES ('$title', '$content', '$slug', '$datetime')";
        return $this->db->executeQuery($sql);
    }

    public function updatePost($id, $title, $content) {
        $title = $this->db->conn->real_escape_string($title);
        $content = $this->db->conn->real_escape_string($content);
        $datetime = $dt = date('Y-m-d h:i:s');
        $slug = slugify($title);

        $sql = "UPDATE posts SET title='$title', content='$content', slug='$slug', datetime='$datetime' WHERE ID = $id";
        return $this->db->executeQuery($sql);
    }

    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE ID = $id";
        return $this->db->executeQuery($sql);
    }
}

?>