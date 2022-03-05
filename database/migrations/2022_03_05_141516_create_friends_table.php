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
        Schema::create('friends', function (Blueprint $table) {
            $table->primary(['user_id','friend_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->timestamps();

            // Many to many connections
            $table->foreign('user_id')->references('id')->on('users') 
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('friend_id')->references('id')->on('users') 
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
};
