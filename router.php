<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];  
$routes = [
    '/' => './login.php',
    '/dashboard' => './dashboard.php',
    '/students' => './students.php',
    '/regstd' => './register_student.php',
    '/books' => './books.php',
    '/addbook' => './add_book.php',
    '/issuebook' => './issue_book.php',
    '/transactions' => './trans.php',
    '/logout' => './logout.php',
    '/login' => './login.php',
];


function routeToController($uri, $routes){
    

    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
}
routeToController($uri, $routes);
?>