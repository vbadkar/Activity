<?php

require_once(__DIR__ . "/router.php");

get('/', 'homepage.php');

get('/homepage', 'homepage.php');

get('/login', 'login.php');

get('/register', 'register.php');

get('/single/$id', 'single.php');

get('/about', 'about.php');

get('/contact', 'contact.php');

any('/404', '/Page404.php');
