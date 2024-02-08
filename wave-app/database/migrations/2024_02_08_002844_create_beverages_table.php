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
        Schema::create('beverages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->string('content');
            $table->double('price', 8, 2);
            $table->boolean('published');
            $table->boolean('special');
            //foreign key of string category
            //foreign key should be unique, primary key or not, but is always unique
            $table->string('item_category');
            $table->foreign('item_category')->references('category')->on('categories')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();

            //add images column later
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beverages');
    }
};
