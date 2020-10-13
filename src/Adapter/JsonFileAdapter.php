<?php

namespace App\Adapter;
use App\Base\FileAdapterInterface;
use \Exception;

class JsonFileAdapter implements FileAdapterInterface{
    public function find($key, $file, $sort = null){
        //check if file exists
        if(!file_exists($file)){
            throw new Exception('File does not exist.'); 
        }

        $json = file_get_contents($file, true);

        //check if file content is valid json        
        $decoded_content = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('File contains invalid json.');
        }

        $selected_content = $decoded_content[$key];

        //sort selected content or return unsorted
        if(empty($selected_content)){
            return [];
        } else if($sort !== null){
            $sorted_content = $this->sort($selected_content, $sort);
            return $sorted_content;
        } else {
            return $selected_content;
        }
    }

    //sorts an array
    protected function sort(array $array, $key) {
        usort($array, $this->sorter($key));
        return $array;
    }

    //defines ascending sorting mechanism for usort
    protected function sorter($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
}