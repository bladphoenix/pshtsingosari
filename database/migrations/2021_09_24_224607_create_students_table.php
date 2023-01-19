<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignUuid('parent_id');
            $table->unsignedBigInteger('rayon_id')->unsigned();
            $table->unsignedBigInteger('level_id')->unsigned();
            $table->enum('religion', ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'])->default('Islam');
            $table->string('birth_place');
            $table->string('dob');
            $table->string('address');
            $table->integer('weight');
            $table->integer('height');
            $table->string('blood_type');
            $table->string('disease')->nullable();
            $table->mediumText('note')->nullable();
            $table->string('certificate');
            $table->string('school');
            $table->string('class');
            $table->enum('status', ['active', 'new', 'suspended'])->default('new');
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
