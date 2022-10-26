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
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_birth');
            $table->date('joining_date');
            $table->string('degree')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->text('note')->nullable();
            $table->char('status', 1)->comment('A = Active, I = Inactive');
            $table->bigInteger( 'specialist_id' )->unsigned();
            $table->foreign('specialist_id')->references('id')->on('specialists')->onDelete('cascade');
            $table->bigInteger( 'department_id' )->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->bigInteger( 'blood_id' )->unsigned();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->bigInteger( 'nationalitie_id' )->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->bigInteger( 'gender_id' )->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->string('file_name');
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
        Schema::dropIfExists('doctors');
    }
};
