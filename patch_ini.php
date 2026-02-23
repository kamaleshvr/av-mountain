<?php
$iniPath = php_ini_loaded_file();
if (!$iniPath) {
    echo "Error: No loaded php.ini file found.\n";
    exit(1);
}

echo "Found php.ini at: $iniPath\n";

$content = file_get_contents($iniPath);
if ($content === false) {
    echo "Error: Could not read php.ini\n";
    exit(1);
}

// Regex to replace the values reliably
$patterns = [
    '/^\s*upload_max_filesize\s*=\s*\d+[KMG]?/m' => 'upload_max_filesize = 100M',
    '/^\s*post_max_size\s*=\s*\d+[KMG]?/m' => 'post_max_size = 100M',
];

$newContent = preg_replace(array_keys($patterns), array_values($patterns), $content);

if ($newContent === null) {
    echo "Error: Regex replacement failed.\n";
    exit(1);
}

if ($content === $newContent) {
    echo "Warning: No changes were made. Limits might already be 100M or patterns didn't match.\n";
} else {
    // Create backup
    copy($iniPath, $iniPath . '.bak');
    
    // Write new content
    if (file_put_contents($iniPath, $newContent) !== false) {
        echo "Success: Updated upload_max_filesize and post_max_size to 100M.\n";
    } else {
        echo "Error: Could not write to php.ini. Check permissions.\n";
        exit(1);
    }
}
