<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/htdocs/Activity/router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/htdocs/Activity/homepage', 'homepage.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/register', 'register.php');

get('/htdocs/Activity/single', 'single.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/login', 'login.php');

get('/htdocs/Activity/login', 'login.php');

any('/404','/Page404.php');
