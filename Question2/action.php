<?php
if(!empty($_GET['id'])){
    require 'common.php';
    session_start();
    $id = $_GET['id'];

    $arrData = (isset($arrPro[$id])) ? $arrPro[$id] : false;

    if (!$arrData){
        header('Location:index.php');
    }

    $result[$id] = $arrData;
    $result[$id]['count'] = 1;

    if(empty($_SESSION['shopcar'])){
        $_SESSION['shopcar'] = $result;
        header('Location:index.php');
    }else{
        $arrData = $_SESSION['shopcar'];

        foreach ($arrData as $key => $value){
            if ($key === (int)$id){
                $arrData[$key]['count'] = $value['count'] + 1;
            }else if (in_array($id , array_keys($arrData))){
                continue;
            }else{
                $arrData = $arrData + $result;
            }
        }

        $_SESSION['shopcar'] = $arrData;
        header('Location:index.php');
    }
}else{
    echo "购物车没有商品!";
}
