<?php

interface QueryBuilderInterface
{
    public static function table(string $table): self;

    public function select(array $columns = ['*']): self;

    public function from(string $table): self;

    public function where(string $column, string $operator, $value): self;

    public function andWhere(string $column, string $operator, $value): self;

    public function orWhere(string $column, string $operator, $value): self;

    public function whereIn(string $column, array $values): self;

    public function whereNotIn(string $column, array $values): self;

    public function whereBetween(string $column, $min, $max): self;

    public function whereNotBetween(string $column, $min, $max): self;

    public function join(string $table, string $first, string $operator, string $second): self;

    public function orderBy(string $column, string $direction = 'asc'): self;

    public function limit(int $limit): self;

    public function offset(int $offset): self;

    public function get(): array;
}
