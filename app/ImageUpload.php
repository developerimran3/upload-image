<?php

namespace Developer\Imran\Pioneer;

trait ImageUpload
{
    protected function move(array $file, $path = 'media/', $ext = ['jpg', 'jpeg', 'png', 'gif'])
    {

        // file manage 
        $tmp_name  = $file['tmp_name'];
        $file_name = $file['name'];

        // get file extension  
        $file_arr = explode('.', $file_name);
        $file_ext =  strtolower(end($file_arr));

        // file name unique 
        $unique_filename =  time() . '_' . rand(1000, 10000) . '_' . str_shuffle('12345') . '.' . $file_ext;

        //dir check
        if (is_dir($path)) {
            mkdir($path);
        }

        //ext check
        if (in_array($file_ext, $ext)) {
            echo "Invalid file Format";
            return;
        }
        // uplaod file 
        move_uploaded_file($tmp_name, $path . $unique_filename);

        // return file name 
        return $unique_filename;
    }
}
