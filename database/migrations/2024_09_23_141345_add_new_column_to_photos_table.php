<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            // Misalnya menambah kolom baru
            // $table->string('new_column')->nullable();
        });
    }

    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            // Hapus kolom baru jika perlu
            // $table->dropColumn('new_column');
        });
    }
};
