<?php

namespace App\SOLID\OpenClose;
use App\SOLID\OpenClose\Interfaces\ShapeInterface;

class Square implements ShapeInterface
{
    public $width;

    public function __construct($width)
    {
        $this->width = $width;
    }

    public function area()
    {
        return $this->width * $this->width;
    }
}
