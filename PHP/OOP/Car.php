<?php


class Car{
    public $name, $tipi, $cmimi;

    public function __construct($name, $tipi, $cmimi)
    {
        $this->name = $name;
        $this->tipi = $tipi;
        $this->cmimi = $cmimi;
    }
    public function __toString()
    {
        return "Emri". $this->name . "<br>". "Tipi: ". $this->tipi. "<br>" . "Cmimi: ". $this->cmimi;
    }

    public static function getAll(){
        echo '"Emri". $this->name . "<br>". "Tipi: ". $this->tipi. "<br>" . "Cmimi: ". $this->cmimi';
    }
}