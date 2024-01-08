<?php

namespace Application\Controllers;

use Application\Utilities;

class MainController extends BaseController {
    public function __construct($c) {}

    public function index() {
        $this->errorResponse("Server error");
    }
}

?>