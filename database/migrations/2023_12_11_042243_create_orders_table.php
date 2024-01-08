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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text("order_description");
            $table->dateTime("order_date");
            $table->double("total_amount", 8, 2);
            $table->unsignedBigInteger("customer_id");//->unique();//column for foreign key
            //method one for foreign key
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->onUpdate("cascade");
            //method two for foreign key
            //$table->foreignId("customer_id")->constrained("customers","id"); //foreign key by default is at id column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
