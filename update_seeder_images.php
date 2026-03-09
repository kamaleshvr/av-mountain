<?php

/**
 * Migration helper to update ProductSeeder.php
 * Replaces hardcoded Unsplash image URLs with the actual uploaded local filenames
 * from public/images/products and public/images/categories.
 */

$seederPath = __DIR__ . '/database/seeders/ProductSeeder.php';
$seederContent = file_get_contents($seederPath);

// Categories
$categoryMapping = [
    'Coconuts' => '1771645551_bjjZ6HRNCx.jpeg',
    'Grains' => 'RdtORrfHdc5I70fxdTqaGCLXTQHHjxasow9pQ4mQ.jpg',
    'Pulses' => '1771645567_fu2PiX83rG.jpeg',
    'Vegetables' => '1772971462_HysxKF762Q.jpeg',
];

// Products
$productMapping = [
    'Whole Coconut' => '1771169395_vY0uwstyaz.jpeg',
    'Semi-Husked Coconut' => '1771169407_VvdXS5bfob.jpeg',
    'De-Husked Coconut' => '1771169417_8kVTBIgruZ.jpeg',
    'Tender Coconut' => '1771169428_wfStwT8tup.jpeg',
    'Copra' => '1771169538_zprr8It8es.jpeg',
    
    'Rice (Basmati & Non-Basmati)' => '1771169719_ti83I2Hn8A.jpeg',
    'Wheat' => '1771169742_D5MD1UHmQq.jpeg',
    'Millets' => '1771169759_zQ9dvlIoze.jpeg',
    'Maize (Corn)' => '1771169780_sN7wL9Abnl.jpeg',
    'Barley' => '1771169864_rF6Y0b1Irp.jpeg',
    'Sorghum (Jowar)' => '1771169900_mwKEUqBEZk.jpeg',
    
    'Chickpeas (Kabuli & Desi)' => '1771169931_9IEN27lfAl.jpeg',
    'Lentils (Red, Green, Yellow)' => '1771169956_WTaUgXwqmo.jpeg',
    'Kidney Beans (Rajma)' => '1771170017_nQKk2fqBtI.jpeg',
    'Black Gram (Urad)' => 'dbMWVFiIRqJVG3UU1fj25V2r6hK7Slx9tBIZcIf0.jpg',
    'Green Gram (Moong)' => 'S6zGJdRi4jHokJkw1ZiN5joCeREpV5OtSd53nz5L.jpg',
    
    'Red Onion' => '1771175851_O2zSN4DMGX.jpeg',
    'Potato' => '1772971477_0kfgxu4Vwx.jpeg', // Fallbacks to existing
    'Tomato' => '1772971462_HysxKF762Q.jpeg',
];

// Replace Category Images
foreach ($categoryMapping as $catName => $filename) {
    $search = "'name' => '$catName',\n                'status' => true,\n                'hero_image' => 'https://images.unsplash.com/[^']+',";
    $replace = "'name' => '$catName',\n                'status' => true,\n                'hero_image' => '/images/categories/$filename',";
    $seederContent = preg_replace("#$search#", $replace, $seederContent);
}

// Replace Product Images
foreach ($productMapping as $prodName => $filename) {
    // Escape parenthesis for regex
    $escapedName = preg_quote($prodName, '#');
    $search = "'name' => '$escapedName',\n                'description' => '[^]+',\n                'image' => 'https://images.unsplash.com/[^']+',";
    // We use a simpler regex that just finds the block for the specific product and replaces the image line
    
    $pattern = "/('name'\s*=>\s*'" . $escapedName . "',\s*'description'\s*=>\s*'.*?',\s*)'image'\s*=>\s*'https:\/\/images\.unsplash\.com\/[^']+',/s";
    $replacement = "$1'image' => '/images/products/$filename',";
    $seederContent = preg_replace($pattern, $replacement, $seederContent);
}

file_put_contents($seederPath, $seederContent);
echo "Seeder updated successfully.\n";
