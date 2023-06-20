<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];  
$routes = [
    "/" => "./view/login.view.php",
    "/dashboard" => "./view/dashboard.view.php",
    "/students" => "./view/students.view.php",
    "/regstd" => "./view/register_student.view.php",
    "/books" => "./view/Books.view.php",
    "/addbook" => "./view/add_book.view.php",
    "/issuebook" => "./view/issue_book.view.php",
    "/transactions" => "./view/trans.view.php",
    "/logout" => "./view/logout.php",
    "/login" => "./view/login.view.php",
];


function routeToController($uri, $routes){
    

    if(array_key_exists($uri, $routes)){
        require $routes[$uri];  
    }
}
routeToController($uri, $routes);
?>