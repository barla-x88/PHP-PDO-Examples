<?php

require_once "../../vendor/autoload.php";

class Manager
{
    public function __construct(public int $id, public string $name)
    {
        
    }
}

class Department
{
    //can be null or type Manager
    public ?Manager $manager;

    public function __construct(public string $name)
    {
        
    }

    //will be called when this object is cloned
    public function __clone(): void
    {
       if (isset($this->manager)) {
        $this->manager = clone $this->manager;
       } 
    } 
}


// referencing the same object
// $department1 = new Department('IT');
// $department2 = $department1;
// $department2->name = "Sales";

//cloning
// $department1 = new Department('IT');
// $department2 = clone $department1;
// $department2->name = "Sales";
// dd($department1, $department2);

//deep cloning
$department1 = new Department('IT');
$department1->manager = new Manager(1, 'Alan Turing');
$department2 = clone $department1;

//Trying to change the $department2 manager
$department2->manager->name = 'Jack Ma';
$department2->manager->id = 2;

$department2->name = "Sales";
dd($department1, $department2);
