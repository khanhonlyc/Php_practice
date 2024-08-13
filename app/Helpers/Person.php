<?php
namespace App\Helpers;
use App\Traits\Singleton;
class Person
{
    use Singleton;
    // public $test = self::getData();
    public $name = 'QK';

    function getName()
    {
        return $this->name;
    }
    function setName($newName)
    {
        $this->name = $newName;
    }
}
