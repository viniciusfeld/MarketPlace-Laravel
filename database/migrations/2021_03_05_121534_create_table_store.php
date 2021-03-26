<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->string('description');
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('slug');



            $table->timestamps(); //Usuarios (users) -> Lojas

            $table->foreign('user_id')->references('id')->on('users');  //nome da chave estrangeira: stores_user_id_foreign

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
