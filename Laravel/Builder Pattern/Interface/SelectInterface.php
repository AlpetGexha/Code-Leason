<?php

interface SelectInterface
{
    public function select(string ...$columns): self;

    public function orderBy(string $column, string $direction = 'ASC'): self;

    public function limit(int $limit): self;

    public function offset(int $offset): self;
}
