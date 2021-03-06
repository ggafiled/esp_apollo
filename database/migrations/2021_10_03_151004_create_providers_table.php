<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_key')->nullable();
            $table->string('provider_secret_key')->nullable();
            $table->bigInteger('releases_current_version')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('provider_name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('releases_current_version')->references('id')->on('releases')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}