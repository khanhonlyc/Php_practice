<?php
namespace App\Traits;

trait Singleton {
    private static $data;

    protected static function initialize() {
        if (self::$data === null) {
            self::$data = 'Nguyen';
        }
    }

    public static function getData() {
        self::initialize();
        return self::$data;
    }
}