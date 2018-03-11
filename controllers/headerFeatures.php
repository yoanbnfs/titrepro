<?php

if (isset($_POST['searches'])) {
    include '../models/dataBase.php';
    include '../models/features.php';

    $search = new features();

    $keyword = $_POST['searches'];
    $searchesList = $search->getSearchResult($keyword);
    $encode = json_encode($searchesList);
    echo $encode;

} else {
    if ($_SERVER['PHP_SELF'] == '/index.php'){
        include 'models/dataBase.php';
        include 'models/features.php';
    } else {
        include '../models/dataBase.php';
        include '../models/features.php';
        
    }
    $searchesList = '';
}



    