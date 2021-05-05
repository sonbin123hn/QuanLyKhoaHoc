<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInforCollumDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infor_temps', function (Blueprint $table) {
            $table->float('price')->after('id_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infor_temps', function (Blueprint $table) {
            Schema::dropIfExists('infor_temps');
        });
    }
}
