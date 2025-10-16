<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id("product_id");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("category_id")->on("categories");
            $table->string("name");
            $table->string("description");
            $table->integer("price");
            $table->integer("stock_quantity");
            $table->string("brand");
            $table->string("img_url");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
