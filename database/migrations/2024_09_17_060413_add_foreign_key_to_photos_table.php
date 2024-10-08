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
            if (Schema::hasColumn('photos', 'user_id')) {
                // Menambahkan foreign key constraint jika kolom user_id sudah ada
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            if (Schema::hasColumn('photos', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
        });
    }
};
