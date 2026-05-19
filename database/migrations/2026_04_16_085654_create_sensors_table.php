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
    // Membuat tabel "sensors"
    Schema::create('sensors', function (Blueprint $table) {
        $table->id(); // Primary key (auto increment)
        $table->float('suhu'); // Kolom untuk menyimpan suhu
        $table->float('kelembaban'); // Kolom untuk menyimpan kelembaban
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}
};
