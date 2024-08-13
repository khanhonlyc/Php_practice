<?php
interface EmployeeComponent{
    public function getName():string;
    public function doTask():void;
    public function join(\DateTime $data):void;
    public function terminate(\DateTime $data):void;
}
class EmployeeConcreteComponet implements EmployeeComponent{
    protected $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function getName():string{
        return $this->name;
    }
    public function doTask():void{
        echo $this->name."lam cong viec hang ngay";
    }
    public function join(\DateTime $data):void{
        echo $this->name."tham gia du an luc". $data->format('d/m/Y');
    }
    public function terminate(\DateTime $data):void{
        echo $this->name."roi du an luc". $data->format('d/m/Y');
    }
}