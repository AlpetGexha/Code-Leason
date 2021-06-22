<?php

abstract class Car {
    // ka properties
    protected $name;
    protected $modal;

    //ka konstruktorin
    public function __construct($name, $modal){
        $this->name = $name;
        $this->modal = $modal;
    }

    //perdoret abstract para funksionit
    abstract public function getName();
}
    //perdoret extends //vetem 1 exteds
    class SportCar extends Car{
        public function __construct($name, $modal)
        {
            parent::__construct($name, $modal);
        }

        public function getName(){
            echo $this->name;
        }
    }

    $sc = new SportCar("Mercedes","2.0");

