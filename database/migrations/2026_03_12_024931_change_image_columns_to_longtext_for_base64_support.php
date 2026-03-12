<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeImageColumnsToLongtextForBase64Support extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('ALTER TABLE products MODIFY image LONGTEXT NULL');
        \DB::statement('ALTER TABLE product_categories MODIFY hero_image LONGTEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('ALTER TABLE products MODIFY image VARCHAR(255) NULL');
        \DB::statement('ALTER TABLE product_categories MODIFY hero_image VARCHAR(255) NULL');
    }
}
