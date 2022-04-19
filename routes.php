<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");
// require_once(__DIR__ . "/router.php");

// ##################################################
// ##################################################
// ##################################################

get('/', 'index.php');
get('/names', 'rest-api/brasseries/readNames.php');
get('/names/$Nom_raison_sociale', 'rest-api/brasseries/readOneName.php');
get('/permis/$No_Permis', 'rest-api/brasseries/readOneNoPermis.php');
// post('/add', 'rest-api/brasseries/add.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
