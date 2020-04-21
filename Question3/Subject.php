<?php
namespace Subject;

use Observer\Observer;

include_once ('Observer.php');

abstract class Subject{
    abstract function attach(Observer $observer); //添加
    abstract function detach(Observer $observer); //移除
    abstract function notify(); //送通知
}
