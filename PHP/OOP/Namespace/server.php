<?php

namespace Html;

class Table
{
    public $title = "";
    public $numRows = 0;

    public function msg()
    {
        echo "<p>Tabela '{$this->title}' ka {$this->numRows} rreshta </p>";
    }
}

class Row
{
    public $numCells = 0;

    public function msg()
    {
        echo "<p>Numri i rreshtave ka {$this->numCells} Qelisa.</p>";
    }
}
