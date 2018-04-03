<?php

if (isset($_POST['searches'])) {
    include_once '../models/dataBase.php';
    include_once '../models/features.php';

    $search = new features();

    $keyword = $_POST['searches'];
    $searchesList = $search->getSearchResult($keyword);
    $encode = json_encode($searchesList);
    echo $encode;

} else {
    if ($_SERVER['PHP_SELF'] == '/index.php'){
        include_once 'models/dataBase.php';
        include_once 'models/features.php';
    } else {
        include_once '../models/dataBase.php';
        include_once '../models/features.php';
        
    }
    $searchesList = '';
}



    