<?php

interface JoinInterface
{
    public function join(string $table, string $column1, string $operator, string $column2): self;

    public function leftJoin(string $table, string $column1, string $operator, string $column2): self;

    public function rightJoin(string $table, string $column1, string $operator, string $column2): self;
}
