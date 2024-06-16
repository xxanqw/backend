<?php
class FileHandler {
    public static $dir = "text";

    public static function read($filename) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($filepath)) {
            return file_get_contents($filepath);
        } else {
            return "Файл не існує.";
        }
    }

    public static function write($filename, $content) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filepath, $content);
    }

    public static function clear($filename) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($filepath)) {
            file_put_contents($filepath, '');
        }
    }
}
