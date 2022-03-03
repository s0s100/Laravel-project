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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('weight',8,2);
            $table->dateTime('date_of_birth')->nullable();
            // Caused an error :(
            // $table->unsignedBigInteger('enclosure_id')->unique();
            $table->unsignedBigInteger('enclosure_id');
            // $table->unsignedBigInteger('keeper_id');
            $table->timestamps();

            // One to many
            $table->foreign('enclosure_id')->references('id')->on('enclosures')
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
        Schema::dropIfExists('animals');
    }
};
