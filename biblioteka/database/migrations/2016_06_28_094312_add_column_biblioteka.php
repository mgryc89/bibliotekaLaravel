<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBiblioteka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biblioteka', function (Blueprint $table) {
            $table->text('opis')->after('tytul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biblioteka', function (Blueprint $table) {
            $table->dropColumn('opis');
        });
    }
}
