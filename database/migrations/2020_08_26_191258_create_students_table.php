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
            $table->char('first_name',15);
            $table->char('last_name',15);
            $table->string('email',20);
            $table->float('pocket_money',10,2);
            $table->string('password');
            $table->tinyInteger('age');
            $table->string('city',15);
            $table->string('state',15);
            $table->bigInteger('zip_code');
            $table->string('country',15);
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
        Schema::dropIfExists('students');
    }
}
