<?php

require_once "../../vendor/autoload.php";


class Math
{
    public function __construct(public int $a, public int $b) {}

    public function sum(): int
    {
        return $this->a + $this->b;
    }
}

class Geometry extends Math
{
    public function __construct(int $a, int $b)
    {
        parent::__construct($a, $b);
    }

    public function sum(): int
    {
        return $this->a + $this->b;
    }
}

$math1 = new Math(5, 10);
$math2 = new Geometry(5, 10);

$result = $math1 == $math2;

dd($result);

