<?php
define("HOST", getenv('DB_HOST') ?: 'localhost');
define("DB_NAME", getenv('DB_NAME') ?: 'emprestimo_plus');
define("DB_USER", getenv('DB_USER') ?: 'root');
define("DB_PASSWORD", getenv('DB_PASSWORD') ?: 'L@t160819');
define("BASE_URL", getenv('BASE_URL') ?: 'http://localhost/emprestimo_plus');
define("ASSETS_URL", BASE_URL . '/assets');
define("VIEWS_PATH", __DIR__ . '/../Views/');
define("CONTROLLERS_PATH", __DIR__ . '/../Controllers/');
define("MODELS_PATH", __DIR__ . '/../Models/');
define("HELPERS_PATH", __DIR__ . '/../Helpers/');
