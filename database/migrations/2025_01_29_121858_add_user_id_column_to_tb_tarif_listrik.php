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
        Schema::table('tb_tarif_listrik', function (Blueprint $table) {
            $table->foreignId('tbuser_id')->after('tarif_perkwh')->references('id')->on('tbpelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_tarif_listrik', function (Blueprint $table) {
            $table->dropColumn('tbuser_id');
        });
    }
};
