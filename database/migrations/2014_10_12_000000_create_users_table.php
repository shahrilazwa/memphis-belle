<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama');
                $table->string('nokp', 12)->unique();
                $table->string('emel');
                $table->string('notel',15);
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->unsignedTinyInteger('idJenisPengguna')->nullable();
                $table->string('photo')->nullable();
                $table->integer('aktif')->default(0); //0: menunggu pengesahan, 1: aktif, 2: tidak aktif
                $table->boolean('admin')->default(false);
                $table->unsignedInteger('create_by')->nullable();
                $table->boolean('approved')->default(false);
                $table->unsignedInteger('approved_by')->nullable();
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
