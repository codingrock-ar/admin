<?php

namespace Application\Services;

use Application\DataAccess;

class PostService {
    private $postDAO;

    public function __construct($c) {
        $this->postDAO = new PostDAO($c);
    }

    public function getAllPosts() {
        return $this->postDAO->getAllPosts();
    }

    public function getPostById($id) {
        return $this->postDAO->getPostById($id);
    }

    public function createPost($title, $content) {
        return $this->postDAO->createPost($title, $content);
    }

    public function updatePost($id, $title, $content) {
        return $this->postDAO->updatePost($id, $title, $content);
    }

    public function deletePost($id) {
        return $this->postDAO->deletePost($id);
    }
}

?>