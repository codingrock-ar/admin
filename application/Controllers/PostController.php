<?php

namespace Application\Controllers;

use Application\Utilities;
use Application\Services;

class PostController extends BaseController {
    private $postService;

    public function __construct($c) {
        $this->c = $c;
        $this->postService = $c['PostService'];
    }

    public function getAllPosts() {
        try {
            $posts = $this->postService->getAllPosts();
            if ($posts->num_rows > 0) {
                $postsArray = $posts->fetch_all(MYSQLI_ASSOC);
                $this->successResponse($postsArray);
            } else {
                $this->errorResponse("No posts found", 404);
            }
        } catch (Exception $e) {
            $this->errorResponse("Server error");
        }
    }

    // Another methods to handle create, update, delete, and post retrieve
}

?>