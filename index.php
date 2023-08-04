<?php

require "vendor/autoload.php";

// Define the route mings
$routes = [
    "/" => "src/controllers/index.php",
    "/edit_task" => "src/controllers/edit_task.php"
];


// Get the current URL path without query parameters
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$request_path = strtok($request_uri, '?');
$path = '/' . trim(str_replace($base_path, '', $request_path), '/');


// Check if the path exists in the routes array
if (isset($routes[$path])) {

    // Include the file that modifies the include path
    require __DIR__ . '/modify_include_path.php';

    // If the path exists, include the corresponding controller file
    include $routes[$path];

} else {
    // If the path is not found in the routes array, handle a 404 error
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}
