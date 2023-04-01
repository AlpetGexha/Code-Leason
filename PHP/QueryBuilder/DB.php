<?php

class DB
{
    /**
     * @var int Track the number of times the database is called
     */
    private static int $instanceCount = 0;

    /**
     * @var DB|null Store a single instance of the database
     */
    private static DB $database = null;

    /**
     * @var PDO The PDO object for database access
     */
    private PDO $pdo;

    /**
     * @var string The name of the database table to interact with
     */
    private string $table;

    /**
     * @var string The SQL query to execute
     */
    private string $sql = '';

    /**
     * @var array The values to bind to the SQL query
     */
    private array $bindings = [];

    /**
     * @var array The conditions to apply to the WHERE clause of the query
     */
    private array $wheres = [];

    /**
     * @var array The conditions to apply to the JOIN clause of the query
     */
    private array $joins = [];

    /**
     * @var array The columns to select in the query
     */
    private array $select = ['*'];

    /**
     * @var array The columns to order the query by
     */
    private array $orderBy = [];

    /**
     * @var int  The maximum number of rows to return
     */
    private ?int $limit = null;

    /**
     * @var int The number of rows to skip before returning rows
     */
    private ?int $offset = null;

    // private function __construct(private PDO $pdo, private string $table){}

    private function __construct(PDO $pdo, string $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        self::$instanceCount++;
    }

    /**
     * First method to calling the object
     * this make call database
     * and get name of table
     *
     * @param  string  $table - database table name Apply a WHERE clause to the query
     */
    public static function table(string $table): self
    {
        $options = [
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=query_builder', 'root', '', $options);

        // singleton pattern
        if (! isset(self::$database)) {
            self::$database = new self($pdo, $table);
        }

        return self::$database;
    }

    public static function getInstanceCount(): int
    {
        return self::$instanceCount;
    }

    public function where(string $column, string $operator, $value): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
            'type' => 'and',
        ];

        return $this;
    }

    public function orWhere(string $column, string $operator, $value): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
            'type' => 'or',
        ];

        return $this;
    }

    public function whereIn(string $column, array $values): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'IN',
            'value' => $values,
            'type' => 'and',
        ];

        return $this;
    }

    public function whereNotIn(string $column, array $values): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'NOT IN',
            'value' => $values,
            'type' => 'and',
        ];

        return $this;
    }

    public function whereBetween(string $column, $min, $max): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'BETWEEN',
            'value' => [$min, $max],
            'type' => 'and',
        ];

        return $this;
    }

    public function whereNotBetween(string $column, $min, $max): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'NOT BETWEEN',
            'value' => [$min, $max],
            'type' => 'and',
        ];

        return $this;
    }

    public function orWhereIn(string $column, array $values): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'IN',
            'value' => $values,
            'type' => 'or',
        ];

        return $this;
    }

    public function orWhereBetween(string $column, $min, $max): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'BETWEEN',
            'value' => [$min, $max],
            'type' => 'or',
        ];

        return $this;
    }

    public function orWhereNotIn(string $column, array $values): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'NOT IN',
            'value' => $values,
            'type' => 'or',
        ];

        return $this;
    }

    public function orWhereNotBetween(string $column, $min, $max): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => 'NOT BETWEEN',
            'value' => [$min, $max],
            'type' => 'or',
        ];

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function select(array $column)
    {
        $this->select = $column;

        return $this;
    }

    public function join(string $table, string $first, string $operator, string $second, string $type = 'inner'): self
    {
        $this->joins[] = [
            'table' => $table,
            'first' => $first,
            'operator' => $operator,
            'second' => $second,
            'type' => $type,
        ];

        return $this;
    }

    public function leftJoin(string $table, string $firstColumn, string $operator, string $secondColumn): self
    {
        $this->joins[] = [
            'table' => $table,
            'firstColumn' => $firstColumn,
            'operator' => $operator,
            'secondColumn' => $secondColumn,
            'type' => 'left',
        ];

        return $this;
    }

    public function rightJoin(string $table, string $firstColumn, string $operator, string $secondColumn): self
    {
        $this->joins[] = [
            'table' => $table,
            'firstColumn' => $firstColumn,
            'operator' => $operator,
            'secondColumn' => $secondColumn,
            'type' => 'right',
        ];

        return $this;
    }

    public function orderBy(string $column, string $direction = 'asc'): self
    {
        $this->orderBy[] = [
            'column' => $column,
            'direction' => $direction,
        ];

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function get(): array
    {
        $this->buildSelectStatement();

        $statement = $this->pdo->prepare($this->sql);
        $statement->execute($this->bindings);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        // Get the total number of records
        $count = $this->count();

        // Calculate the number of pages
        $lastPage = (int) ceil($count / $perPage);

        // Determine the current page
        if (is_null($page)) {
            $page = isset($_GET[$pageName]) ? (int) $_GET[$pageName] : 1;
        }

        // Make sure the page is within bounds
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $lastPage) {
            $page = $lastPage;
        }

        // Calculate the offset
        $offset = ($page - 1) * $perPage;

        // Set the limit and offset on the query
        $this->limit($perPage)->offset($offset);

        // Get the records for the current page
        $records = $this->get($columns);

        // Return the records and pagination information
        return [
            'data' => $records,
            'current_page' => $page,
            'last_page' => $lastPage,
            'per_page' => $perPage,
            'total' => $count,
        ];
    }

    public function update(array $values): bool
    {
        $set = implode(',', array_map(fn ($column) => "{$column}=?", array_keys($values)));

        $this->builWdhereClauses();

        $sql = "UPDATE {$this->table} SET {$set} {$this->sql}";
        $statement = $this->pdo->prepare($sql);

        $success = $statement->execute(array_merge(array_values($values), $this->bindings));

        return $success;
    }

    public function delete(): bool
    {
        $this->builWdhereClauses();

        $sql = "DELETE FROM {$this->table} {$this->sql}";
        $statement = $this->pdo->prepare($sql);

        $success = $statement->execute($this->bindings);

        return $success;
    }

    public function insert(array $values): bool
    {
        $columns = implode(',', array_keys($values));
        $placeholders = implode(',', array_fill(0, count($values), '?'));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $statement = $this->pdo->prepare($sql);

        $success = $statement->execute(array_values($values));

        return $success;
    }

    public function count(): int
    {
        $this->buildSelectStatement();

        $statement = $this->pdo->prepare($this->sql);
        $statement->execute($this->bindings);

        return $statement->rowCount();
    }

    public function groupBy(string $column): self
    {
        $this->sql .= "GROUP BY {$column} ";

        return $this;
    }

    public function union(DB $query, bool $all = false): self
    {
        $this->sql .= 'UNION ';

        if ($all) {
            $this->sql .= 'ALL ';
        }

        $this->sql .= '(' . $query->toSql() . ') ';

        $this->bindings = array_merge($this->bindings, $query->getBindings());

        return $this;
    }

    public function toSql(): string
    {
        $this->buildSelectStatement();

        return $this->sql;
    }

    public function getBindings(): array
    {
        $bindings = $this->bindings;

        foreach ($this->joins as $join) {
            $bindings = array_merge($bindings, $join['bindings']);
        }

        return $bindings;
    }

    public function dd()
    {
        echo '<pre>';
        var_dump($this->get());
        echo '</pre>';
        exit();
    }

    private function buildSelectStatement(): void
    {
        $this->sql = 'SELECT ' . implode(', ', $this->select) . " FROM {$this->table} ";

        $this->buildJoinClauses();

        $this->builWdhereClauses();

        $this->buildOrderByClause();

        $this->buildLimitClause();

        $this->buildOffsetClause();
    }

    private function buildJoinClauses(): void
    {
        foreach ($this->joins as $join) {
            $this->sql .= "{$join['type']} JOIN {$join['table']} ON {$join['first']} {$join['operator']} {$join['second']} ";
        }
    }

    private function builWdhereClauses(): void
    {
        if (! empty($this->wheres)) {
            $this->sql .= 'WHERE ';

            foreach ($this->wheres as $key => $where) {
                if ($key > 0) {
                    $this->sql .= " {$where['type']} ";
                }

                if (is_array($where['value'])) {
                    $this->sql .= "{$where['column']} {$where['operator']} (";
                    foreach ($where['value'] as $key => $value) {
                        if ($key > 0) {
                            $this->sql .= ', ';
                        }
                        $this->sql .= '?';
                        $this->bindings[] = $value;
                    }
                    $this->sql .= ') ';
                } else {
                    $this->sql .= "{$where['column']} {$where['operator']} ? ";
                    $this->bindings[] = $where['value'];
                }
            }
        }
    }

    private function buildOrderByClause(): void
    {
        if (! empty($this->orderBy)) {
            $this->sql .= 'ORDER BY ';

            foreach ($this->orderBy as $key => $order) {
                if ($key > 0) {
                    $this->sql .= ', ';
                }
                $this->sql .= "{$order['column']} {$order['direction']} ";
            }
        }
    }

    private function buildLimitClause(): void
    {
        if ($this->limit !== null) {
            $this->sql .= "LIMIT {$this->limit}";
        }
    }

    private function buildOffsetClause(): void
    {
        if ($this->offset !== null) {
            $this->sql .= "OFFSET {$this->offset}";
        }
    }

    public function __call($method, array $parameters)
    {
        if ($method == 'table' || $method == 'get' && self::$instanceCount > 1) {
            throw new Exception('You can call table method only once');
        }

        return $this->$method(...$parameters);
        // make sure that function get()
    }
}
