<?php
class Singleton {
    // Biến lưu trữ thể hiện duy nhất của lớp.
    private static $instance = null;

    // Phương thức static để lấy thể hiện duy nhất của lớp.
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    // Đảm bảo rằng hàm khởi tạo không thể gọi từ bên ngoài (Private Constructor).
    private function __construct() {
        // Khởi tạo cần thiết
    }

    // Ngăn cản clone đối tượng từ bên ngoài
    private function __clone() { }

    // Ví dụ về một phương thức trong lớp Singleton
    public function sayHello() {
        echo "Hello, I am a Singleton!";
    }
}

$singleton = Singleton::getInstance();
$singleton->sayHello();

