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
        Schema::create('ghe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_phongchieu');
            $table->foreign('id_phongchieu')->references('id')->on('phongchieu');
            $table->string('tenghe');
            $table->string('trangthai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghe');
    }
};
