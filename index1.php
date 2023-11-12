<?php
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        echo implode('/', $url) . "Lawrence" . '<br />';

        $page = end($url);

        if (empty($page)){
            include('home.php');
        }
        else{
            $filename = $page . '.php';
            if(file_exists($filename)){
                include($filename);
            }
            else{
                include('404.php');
            }
        }
    }
    else{
        include('home.php');
    }
?>
