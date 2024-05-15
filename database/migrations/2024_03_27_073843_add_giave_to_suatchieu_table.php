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
        Schema::table('suatchieu', function (Blueprint $table) {
            $table->integer('giave')->after('thoigianketthuc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suatchieu', function (Blueprint $table) {
            $table->dropColumn('giave'); // Xóa trường giá vé nếu cần rollback
        });
    }
};
