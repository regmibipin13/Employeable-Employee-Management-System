<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');

            $table->bigInteger('designation_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->text('academic_qualification')->nullable();
            $table->longText('bio')->nullable();

            $table->enum('salary_type',['daily','weekly','monthly','yearly']);
            $table->bigInteger('salary');

            $table->dateTime('started_from');
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
        Schema::dropIfExists('employees');
    }
}
