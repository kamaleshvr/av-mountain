<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$products = App\Models\Product::all();
foreach ($products as $p) {
    echo "ID: " . $p->id . " | Name: " . $p->name . " | Image Length: " . strlen($p->image ?? '') . "\n";
    if (strlen($p->image ?? '') > 100) {
        echo "   Start: " . substr($p->image, 0, 50) . "...\n";
    }
}

$categories = App\Models\ProductCategory::all();
foreach ($categories as $c) {
    echo "Cat ID: " . $c->id . " | Name: " . $c->name . " | Hero Length: " . strlen($c->hero_image ?? '') . "\n";
}
