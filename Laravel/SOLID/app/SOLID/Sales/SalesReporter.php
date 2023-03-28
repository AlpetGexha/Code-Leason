<?php

namespace App\SOLID\Sales;

use App\SOLID\Sales\Interfaces\SalesInterface;

class SalesReporter
{
    public function __construct(
        public SalesReposibility $repo
    ){}

    public function between($startDate, $endDate, SalesInterface $format)
    {
        $betweenLastMonth = $this->repo->between($startDate, $endDate);

        return $format->output($betweenLastMonth);
    }
}
