<?php
/**
 * Tính trừu tượng tập trung vào việc giấu chi tiết triển khai
 * và chỉ cung cấp giao diện để tương tác với đối tượng.
 * Cung cấp giao diện trừu tượng mà các lớp con phải tuân theo.
 * Được sử dụng để ẩn chi tiết thực hiện và chỉ cung cấp những
 * gì cần thiết.
 */
abstract class Animal{
    public $name = "";
    abstract protected function makeSound();
    protected function getname(){
        echo $this->name;
    }
}
class Dog extends Animal{
    public function __construct(){
        $this->name = "Dog";
    }
    function makeSound(){
        echo $this->getname()." >>>> Go Go Go <br >";
    }
}
class Cat extends Animal{
    public function __construct(){
        $this->name = "Cat";
    }
    function makeSound(){
        echo $this->getname()." >>>> Meo Meo Meo <br >";
    }
}
$dog = new Dog();
$cat = new Cat();

/**
 * Cho phép đối tượng có thể có nhiều biểu hiện khác nhau thông 
 * qua một giao diện chung.
 * Được sử dụng để cho phép sử dụng linh hoạt nhiều đối tượng 
 * khác nhau.
 * Cung cấp khả năng cho các lớp con thực hiện các hành vi khác 
 * nhau của cùng một phương thức.
 */

function MakeAnimalSound(Animal $animal){
    $animal->makeSound();
}
MakeAnimalSound($dog);
MakeAnimalSound($cat);