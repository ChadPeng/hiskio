<?php
header("Content-type:text/html;Charset=utf-8");

use createSubject\ConcreteSubject;
use Observer\Observer;

include_once ('Observer.php');
include_once ('ConcreteSubject.php');

class PcHome extends Observer{
    function notify(){
        echo "Pchome 已收到商品發佈通知.</br>";
    }
}
class Yahoo extends Observer{
    function notify(){
        echo "Yahoo 已收到商品發佈通知.</br>";
    }
}
class Ruten extends Observer{
    function notify(){
        echo "Ruten 已收到商品發佈通知.</br>";
    }
}

class Shopee extends Observer{
    function notify(){
        echo "Shopee 已收到商品發佈通知.</br>";
    }
}

$PcHome = new PcHome();
$Yahoo = new Yahoo();
$Ruten = new Ruten();
$Shopee = new Shopee();

$concreteSubject = new ConcreteSubject();
$concreteSubject->attach($PcHome);
$concreteSubject->attach($Yahoo);
$concreteSubject->attach($Ruten);
//移除Yahoo
$concreteSubject->detach($Yahoo);
$concreteSubject->attach($Shopee);

if ($_GET['notify']){
    $concreteSubject->notify();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>發送訊息</title>
    <style type="text/css">

    </style>
</head>
<body>
<section>
    <div class='top'>
        <a href='question3.php?notify=1'>Run PHP Function</a>
    </div>
</body>
</html>


