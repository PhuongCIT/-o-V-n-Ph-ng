<?php

namespace App\Libraries;

class Upload
{
    public static function saveFile($args = [])
    {
        $uploadOk = true;
        $message = "";
        if (is_array($args) && array_key_exists('path_dir', $args) == true && array_key_exists('file', $args) == true) {
            $path_dir = $args['path_dir'];
            $file = $args['file'];
            $file_name = $file['name'];
            $path_file_name = $path_dir . basename($file_name);
            $type_file = strtolower(pathinfo($path_file_name, PATHINFO_EXTENSION));
            $extention = null;
            $maxsize = null;
            $rename = null;
            if (array_key_exists('extention', $args) == true) {
                $extention = $args['extention'];
            }
            if (array_key_exists('maxsize', $args) == true) {
                $maxsize = $args['maxsize'];
            }
            if (array_key_exists('rename', $args) == true) {
                $rename = $args['rename'];
                $path_file_name = $path_dir . $rename . '.' . $type_file;
                $file_name = $rename . '.' . $type_file;
            }
            //check extention
            if (!in_array($type_file, $extention)) {
                $uploadOk = false; //không hộ trỡ
                $message = 'không hộ trợ định dạng';
            }
            //check exists
            if (file_exists($path_file_name)) {
                $uploadOk = false; //tập tin đã tồn tại
                $message = 'tập tin đã tồn tại';
            }
            //check  Size
            if ($file['size'] > $maxsize) {
                $uploadOk = false;
                $message = 'kích thước quá lớn';
            }
        } else {
            $uploadOk = false;
            $message = 'Tham số truyền vào không đúng';
        }
        if ($uploadOk == true) {
            if (move_uploaded_file($file['tmp_name'], $path_file_name)) {
                $message = $file_name;
                $uploadOk = true;
            }
        }
        return ['success' => $uploadOk, 'result' => $message];
    }
    public static function deleteFile($args = [])
    {
        if (is_array($args) && array_key_exists('path_dir', $args) == true && array_key_exists('file', $args) == true) {
            $path_file_name = $args['path_dir'] . basename($args['file']);
            unlink($path_file_name);
        }
    }
}
