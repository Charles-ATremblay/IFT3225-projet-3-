<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/api/router.php");
// require_once(__DIR__ . "/router.php");

// ##################################################
// ##################################################
// ##################################################

get('/api/names', 'api/brasseries/readNames.php');
get('/api/names/$Nom_raison_sociale', 'api/brasseries/readNamePrefix.php');
get('/api/permis/$No_Permis', 'api/brasseries/readOneNoPermis.php');
post('/api/add/$name/$address/$ville/$code_postal/$courriel', 'api/brasseries/add.php');

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','api/views/404.php');
