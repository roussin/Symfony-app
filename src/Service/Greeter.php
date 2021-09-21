<?php

namespace App\Service;

// modification du fichier config\services.yaml pour pouvoir passer le paramètre $name

class Greeter 
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function greet() 
    {
        return "Hello $this->name !";
    }
}