<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::any('/debug-upload', function (Request $request) {
    if ($request->isMethod('post')) {
        $info = [
            'ini_file' => php_ini_loaded_file(), // SHOW THE CONFIG FILE
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'post_max_size' => ini_get('post_max_size'),
            'has_file' => $request->hasFile('test_file'),
            'all_files' => $_FILES,
        ];

        if ($request->hasFile('test_file')) {
            $file = $request->file('test_file');
            $info['file_error'] = $file->getError();
            $info['file_error_message'] = $file->getErrorMessage();
            $info['file_size'] = $file->getSize();
            $info['file_mime'] = $file->getMimeType();
        }

        return $info;
    }

    return '
    <form action="/debug-upload" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <input type="file" name="test_file">
        <button type="submit">Test Upload</button>
    </form>
    ';
});
