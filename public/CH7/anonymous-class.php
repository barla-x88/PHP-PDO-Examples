<?php
require_once "../../vendor/autoload.php";

// $newClass = new class {
//     public string $name = 'Anonymous Class';

//     public function getName(): string
//     {
//         return $this->name;
//     }
// };


// $name = $newClass->getName();

// dd($name);

interface Logger
{
    public function log(string $text);
}

class AppErrorHandler
{
    public function __construct(private Logger $logger)
    {
        
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }
}

$appErrorHandler = new AppErrorHandler(new class implements Logger {
    public function log(string $text)
    {
        print $text;
    }
});

$appErrorHandler->getLogger()->log("This is example error message. \n");