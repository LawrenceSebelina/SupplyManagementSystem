<?php $route = isset($_GET['route']) ? $_GET['route'] :'dashboard'; ?>
<?php 
    if (!file_exists($route.'.php')) {
        include_once '../includes/mainFunction/404.php';
    } else {
        include_once $route.'.php';
    }
?>