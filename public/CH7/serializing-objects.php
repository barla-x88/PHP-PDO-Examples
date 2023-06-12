<?php

require_once "../../vendor/autoload.php";

class Manager
{
    public function __construct(public int $id, public string $name)
    {
        
    }
}

class Department implements Serializable
{
    //can be null or type Manager
    public ?Manager $manager;

    public function __construct(public string $name)
    {
        
    }

    public function serialize()
    {
        return json_encode([
            'name' => $this->name,
            'manager' => $this->manager,
            'manager_class' => get_class($this->manager)

        ]);
    }

    public function unserialize(string $data)
    {
        $jsonDepartment = json_decode($data);

        $this->name = $jsonDepartment->name;
        $this->manager = new $jsonDepartment->manager_class($jsonDepartment->manager->id, $jsonDepartment->manager->name);
    }


    // public function __sleep()
    // {
    //     return ['name'];
    // }

}

$department1 = new Department('IT');
$department1->manager = new Manager( 1,'Bill Gates');

$department1String = serialize($department1);

dd(unserialize($department1String));
// dd($department1String);

// $department2 = unserialize($department1String);
// $department2->manager = new Manager( 2,'Rick Johnson');

// dd($department1, $department2);

// Creating deep clone

// $department2 = unserialize(serialize($department1));
// $department2->manager->name = 'Bruce Lee';
// dd($department1, $department2);

// __sleep() magic method