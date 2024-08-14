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

abstract class EmployeeDecorator implements EmployeeComponent{
    protected $employeeComponent;
    public function __construct(EmployeeComponent $ec){
        $this->employeeComponent = $ec;
    }
    public function getName():string{
        return $this->employeeComponent->getName();
    }
    public function join(\DateTime $data):void{
        echo $this->employeeComponent->getName()."join". $data->format('d/m/Y');
    }
    public function terminate(\DateTime $data):void{
        echo $this->employeeComponent->getName()."terminate". $data->format('d/m/Y');
    }
}
class TeamMember extends EmployeeDecorator{
    public function reportTask():void{
        echo $this->getName()."bao cao cong viec";
    }
    public function coordinateWithOthers():void{
        echo $this->getName()." phối hợp cùng thành viên khác";
    }
    public function doTask():void{
        $date = new DateTime('2024-08-15');
        $this->employeeComponent->doTask();
        $this->reportTask();
        $this->coordinateWithOthers();
        $this->join($date);
        // $this->planning();
        // $this->motivate();
        // $this->monitor();
    }
}
// $employee = new EmployeeConcreteComponet("Nguyen Van A");
// $teamMember = new TeamMember($employee);
// $teamMember->doTask();



// ----------------------------------

interface Logger{
    public function  log($msg);
}
abstract class Decorator_pattern implements Logger{
    protected $logger;
    abstract public function log($msg);
    public function __construct(Logger $logger){
        $this->logger = $logger;
    }
}
class FileLogger implements Logger{
    public function log($msg){
        echo "<h3>Error on file: {$msg}</h3>";
    }
}
class EmailLogger extends Decorator_pattern{
    public function log($msg){
        $this->logger->log($msg);
        echo "<h3>Error on email: {$msg}</h3>";
    }
}
class DatabaseLogger extends Decorator_pattern{
    public function log($msg){
        $this->logger->log($msg);
        echo "<h3>Error on Database: {$msg}</h3>";
    }
}
$log = new FileLogger();
$log = new EmailLogger($log);
$log = new DatabaseLogger($log);
$log->log('saving');