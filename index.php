<!DOCTYPE html>
<html>
<head>
    <title>Upload File Example</title>
</head>
<?php
//  print_r($_FILES);
//  $target_file = 'images/';
//  @move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target_file);
// echo $_SESSION['token'];
// if($_SESSION['token']== $_POST['token']){
//     echo 123;
// }else{
//     $_SESSION['token'] == $_POST['token'];
// }
@unlink('images/hoa.jpg');
print_r(glob('images/*'));
if(!$_SERVER['REQUEST_METHOD'] === 'POST') {  // if received any post data
    // process $_POST values, 
    // save data to DB,
    // ...
    echo "da an nut"; 
 }
 else{
    echo "chua an nut";
 }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_FILES);
    
    // Đảm bảo thư mục đích tồn tại
    $target_dir = 'images/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Lấy tên tệp gốc và tạo đường dẫn đích đầy đủ
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    
    // Kiểm tra và di chuyển tệp tải lên
    if (@move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "File has been uploaded successfully.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// $data = "Hello, World!";
// file_put_contents('example.txt', $data);
// $data2 = "-------------------->>>>>>>>>>>>>>";
// file_put_contents('example.txt', $data2, FILE_APPEND);

 ?>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="hidden" id="token" name="token" value="<?php echo time()?>">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>

<?php


// // spl_autoload('Loader');
// spl_autoload_register('Loader');

// function Loader($className) {
//     // Đường dẫn tới thư mục chứa các lớp
//     $path = "Helpers/";
    
//     // Thay thế namespace separator bằng DIRECTORY_SEPARATOR (thường là / hoặc \)
//     $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    
//     // Đường dẫn đầy đủ tới file lớp
//     $fullpath = $path . $className . ".class.php";
    
//     // Kiểm tra và nạp file nếu tồn tại
//     if (file_exists($fullpath)) {
//         include_once $fullpath;
//     } else {
//         echo "File không tồn tại: " . $fullpath;
//     }
// }
// // include_once './Helpers./Giohang.class.php';
// echo 123;
// echo $giohang2;



// require './vendor/autoload.php';
// function my_autoloader($class) {
//     // require 'Helpers/'.$class . '.class.php';
//     echo $class;
// }
// spl_autoload_register('my_autoloader');
// use App\Controllers\PersonController as PersonController;
// use App\Helpers\Giohang;
// use App\Helpers\Person;

// $abc = new Person();
// $giohang = new Giohang();
// echo $abc->getName();
// echo $abc::getData();



// // Hàm tạo chuỗi ngẫu nhiên
// function generateRandomString($length = 10) {
//     return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
// }

// // Đường dẫn thư mục lưu trữ hình ảnh
// $dir = 'images/';
// $type = 'jpg'; // Giả sử bạn đã xác định loại tệp trước đó

// // Tạo tên tệp ngẫu nhiên với phần mở rộng
// $file = generateRandomString() . '.' . $type;
// $absolutePath = __DIR__ . '/' . $dir; // Đường dẫn tuyệt đối đến thư mục lưu trữ
// $relativePath = $dir . $file;

// // Kiểm tra nếu thư mục không tồn tại thì tạo mới
// if (!file_exists($absolutePath)) {
//     mkdir($absolutePath, 0755, true);
// }

// // Lưu tệp vào đường dẫn tương đối
// file_put_contents($absolutePath . '/' . $file, "abcd");

// echo "File saved at: " . $relativePath;
