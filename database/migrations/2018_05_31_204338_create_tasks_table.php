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
            $table->increments('id');
            $table->string('language', 30)->default('php');
            $table->string('theme', 30)->default('array');
            $table->text('task_desc');
            $table->string('short_desc', 100)->default('Сумма');
            $table->string('task_view', 100);
            $table->text('check_code');
            $table->integer('difficulty')->default(1);
            $table->string('author', 30)->default('Max');
            $table->boolean('is_published')->default(0);
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
