<?php
session_start();

$id = $_GET['id'];

if(!empty($id)){
    $arrData = $_SESSION['shopcar'];

    if (isset($arrData[$id])){
        if ($arrData[$id]['count'] > 1){
            $arrData[$id]['count']--;
        }else{
            unset($arrData[$id]);
        }
    }

    $_SESSION['shopcar'] = $arrData;

    header('Location:spcar.php');
}
