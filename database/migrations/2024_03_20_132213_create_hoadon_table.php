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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id();
            $table->string('phuongthucthanhtoan');
            $table->decimal('tongtien', 10, 2);
            $table->date('ngaythanhtoan');
            $table->string('trangthai');
            $table->unsignedBigInteger('id_khachhang');
            $table->foreign('id_khachhang')->references('id')->on('users');
            $table->integer('soluongvedamua');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadon');
    }
};
