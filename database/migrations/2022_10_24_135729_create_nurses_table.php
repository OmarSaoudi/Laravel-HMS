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
        Schema::create('nurses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_birth');
            $table->date('joining_date');
            $table->string('address');
            $table->string('phone');
            $table->text('note')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger( 'blood_id' )->unsigned();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->bigInteger( 'nationalitie_id' )->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->string('nurses_images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
};
