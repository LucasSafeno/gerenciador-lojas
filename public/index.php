<?php
// bootstrap the application
require "../bootstrap.php";

use App\Router;

//Routes
require "../router/web.php";

Router::dispatch();
