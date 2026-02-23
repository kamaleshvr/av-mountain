<?php
use Illuminate\Support\Facades\Route;

Route::get('/check-config', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size'),
        'memory_limit' => ini_get('memory_limit'),
        'max_execution_time' => ini_get('max_execution_time'),
        'php_ini_file' => php_ini_loaded_file(),
    ];
});
