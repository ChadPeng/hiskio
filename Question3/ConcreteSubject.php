<?php
namespace createSubject;

use Subject\Subject;
use Observer\Observer;

include_once ('Subject.php');
include_once ('Observer.php');

class ConcreteSubject extends Subject{
    private $observers = array();

    //添加
    function attach(Observer $observer){
        $this->observers[] = $observer;
    }

    //移除
    function detach(Observer $observer){
        $key=array_search($observer, $this->observers);
        if($key !== false){
            unset($this->observers[$key]);
        }
    }

    function notify(){
        foreach($this->observers as $observer){
            $observer->notify();
        }
    }
}
