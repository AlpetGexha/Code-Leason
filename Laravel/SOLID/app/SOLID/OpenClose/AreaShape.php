<?php

namespace App\SOLID\OpenClose;

class AreaShape
{
    // If we dont use open/close
    public function badCalculate($shapes)
    {
        $result = 0;
        foreach ($shapes as $shape) {
            if ($shape instanceof Circle) {
                $result = $shape->radius * $shape->radius * pi();
            } elseif ($shape instanceof Rectangle) {
                $result = $shape->width * $shape->height;
            } elseif ($shape instanceof Square) {
                $result = $shape->width * $shape->width;
            }
        }

        return $result;
    }

    // If we use open/close
    public function goodCalculate($shapes)
    {
        $result = 0;
        foreach ($shapes as $shape) {
            $result = $shape->area();
        }

        return $result;
    }
}
