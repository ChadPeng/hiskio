<?php
session_start();

$id = $_GET['id'];

if(!empty($id)){
    $arrData = $_SESSION['shopcar'];

    if (isset($arrData[$id])){
        $arrData[$id]['count']++;
    }

    $_SESSION['shopcar'] = $arrData;

    header('Location:spcar.php');
}
