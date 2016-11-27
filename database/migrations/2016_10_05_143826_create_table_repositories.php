<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRepositories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Repositories', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['csv', 'doc', 'docx', 'pdf', 'html', 'txt']);
            $table->string('link');
            $table->string('descriptions');
            $table->integer('user_id')->unsigned();
            $table->boolean('primary');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Repository');
    }
}
