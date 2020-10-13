<?php

namespace App\Base;

interface FileAdapterInterface {
    public function find($key, $file, $sort);
}