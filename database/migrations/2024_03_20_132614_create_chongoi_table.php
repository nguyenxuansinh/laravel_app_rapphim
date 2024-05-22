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
        Schema::create('chongoi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ghe');
            $table->string('trangthai');
            $table->unsignedBigInteger('id_thanhtoan');
            $table->unsignedBigInteger('id_suatchieu');
            
            $table->timestamps();

            /*$table->foreign('id_ghe')->references('id')->on('ghe');*/
            $table->foreign('id_thanhtoan')->references('id')->on('hoadon');
            $table->foreign('id_suatchieu')->references('id')->on('suatchieu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chongoi');
    }
};
