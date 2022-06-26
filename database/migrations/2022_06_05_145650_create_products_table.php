<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->biginteger('cate_id');
            $table->biginteger('shop_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumtext('small_desc');
            $table->longtext('desc');
            $table->string('origin_price');
            $table->string('selling_price');
            $table->string('image');
            $table->biginteger('user_id');
            $table->string('quantity');
            $table->string('tax');
            $table->tinyinteger('status')->default(0);
            $table->tinyinteger('trending')->default(0);;
            $table->mediumtext('meta_title');
            $table->mediumtext('meta_desc');
            $table->mediumtext('meta_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
