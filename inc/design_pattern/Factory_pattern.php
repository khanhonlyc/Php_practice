<?PHP
abstract class Book{
    private $id;
    private $name;
    protected $type = 'programing';

    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getType(){
        return $this->type;
    }
}
class BookDesign extends Book{
    protected $type = "design";
}
class BookEnglish extends Book{
    protected $type = "english";
}
class BookPrograming extends Book{
    protected $type = "programing";
}
class BookController{
    private function factory($bookType, $idBook, $nameBook){
        $obj = null;
        $nameclass = "Book". ucwords($bookType);
        if(class_exists($nameclass)) $obj = new $nameclass($idBook, $nameBook);
        return $obj;
    }
    public function createBook($infoBook){
        $book = $this->factory($infoBook["booktype"], $infoBook["idbook"], $infoBook["namebook"]);
        return $book;
    }
    
}
$Color_design = new BookController();
$thongtin = $Color_design->createBook(["booktype"=>"design","idbook"=>"01", "namebook"=>"color design"]);
echo "ID: " . $thongtin->getId() . "<br />";
echo "Name: " . $thongtin->getName() . "<br />";
echo "Type: " . $thongtin->getType() . "<br />";

$Java_programing = new BookController();
$thongtin2 = $Color_design->createBook(["booktype"=>"programing","idbook"=>"02", "namebook"=>"Java programing"]);
echo "ID: " . $thongtin2->getId() . "<br />";
echo "Name: " . $thongtin2->getName() . "<br />";
echo "Type: " . $thongtin2->getType() . "<br />";
