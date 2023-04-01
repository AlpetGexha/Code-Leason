<?php

interface WhereInterface
{
    public function where(string $column, string $operator, $value): self;

    public function orWhere(string $column, string $operator, $value): self;

    public function whereIn(string $column, array $values): self;

    public function whereNotIn(string $column, array $values): self;

    public function whereBetween(string $column, $min, $max): self;

    public function whereNotBetween(string $column, $min, $max): self;

    public function orWhereIn(string $column, array $values): self;

    public function orWhereBetween(string $column, $min, $max): self;
}
