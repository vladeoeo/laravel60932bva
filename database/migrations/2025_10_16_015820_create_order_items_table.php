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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id("order_item_id");
            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")->references("order_id")->on("orders");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("product_id")->on("goods");
            $table->integer("quantity");
            $table->integer("price_at_moment");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
