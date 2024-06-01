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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('namaproduk');
            $table->decimal('harga' );
            $table->integer('stock');
            $table->string('img');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
