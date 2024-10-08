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
    Schema::table('likes', function (Blueprint $table) {
        $table->foreignId('photo_id')->constrained()->after('user_id')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('likes', function (Blueprint $table) {
        $table->dropForeign(['photo_id']);
        $table->dropColumn('photo_id');
    });
}
};
