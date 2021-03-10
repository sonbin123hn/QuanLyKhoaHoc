<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->integer('is_admin')->comment('1:boss 2: admin 3: member ')->default(2);
            $table->string('phone',11)->nullable();
            $table->string('address')->nullable();
            $table->text('avatar')->nullable();
            $table->boolean('status')->comment('fal: lock ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
}
