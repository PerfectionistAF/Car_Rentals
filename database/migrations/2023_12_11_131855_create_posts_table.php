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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //automatically set to primary key and autoincrement
            //if primary() is used, error set multiple primary keys 
            $table->string("post_title", 50)->index("POST_INDEX"); //length 50 characters and set column to index
            $table->text("post_content");
            $table->date("post_date");
            $table->unsignedBigInteger("user_id");//column for foreign key
            $table->foreign("user_id")->references("id")->on("users");//->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
