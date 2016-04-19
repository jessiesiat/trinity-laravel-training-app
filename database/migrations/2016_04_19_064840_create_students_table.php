<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('department_id');
            $table->string('name');
            $table->text('address');
            $table->string('degree')->nullable();
            $table->string('contact_no');
            $table->string('email')->nullable();
            $table->date('enrolled')->nullable();
            $table->text('remarks')->nullable();
            $table->string('photo')->default('placeholder.png');
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
        Schema::drop('students');
    }
}
