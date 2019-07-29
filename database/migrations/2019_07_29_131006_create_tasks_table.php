<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');

            $table->dateTime('deadline');
            $table->unsignedInteger('expected_working_hours');
            $table->string('status')->default('unassigned');

            // the project which the task belongs to
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');

            // the user who should do the task
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('tasks');
    }
}
