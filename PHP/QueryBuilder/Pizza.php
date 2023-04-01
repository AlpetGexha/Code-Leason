<?php

class PizzaBuilder
{
    private $size;
    private $cheese;
    private $pepperoni;
    private $bacon;

    public function __construct($size)
    {
        $this->size = $size;
    }

    public function addCheese()
    {
        $this->cheese = true;

        return $this;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;

        return $this;
    }

    public function addBacon()
    {
        $this->bacon = true;

        return $this;
    }

    public function build()
    {
        return new Pizza($this->size, $this->cheese, $this->pepperoni, $this->bacon);
    }
}

class Pizza
{
    public function __construct(
        private string $size,
        private string $cheese,
        private string $pepperoni,
        private string $bacon
    ) {
    }

    public function getDescription()
    {
        $description = "This is a {$this->size} pizza with";
        if ($this->cheese) {
            $description .= ' cheese';
        }
        if ($this->pepperoni) {
            $description .= ' pepperoni';
        }
        if ($this->bacon) {
            $description .= ' bacon';
        }
        $description .= '.';

        return $description;
    }
}

// Usage
$pizza = (new PizzaBuilder('large'))
    ->addCheese()
    ->addPepperoni()
    ->addBacon()
    ->build();
echo $pizza->getDescription();
// Output: "This is a large pizza with cheese pepperoni bacon."
