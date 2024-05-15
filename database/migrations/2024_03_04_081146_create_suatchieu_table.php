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
        Schema::create('suatchieu', function (Blueprint $table) {
         
                $table->id();
                $table->unsignedBigInteger('id_phongchieu');
                $table->foreign('id_phongchieu')->references('id')->on('phongchieu');
                $table->dateTime('thoigianchieu');
                $table->unsignedBigInteger('id_phim');
                $table->foreign('id_phim')->references('id')->on('phim');
                $table->dateTime('thoigianketthuc');
              
                $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suatchieu');
    }
};
