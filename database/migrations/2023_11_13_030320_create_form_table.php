<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('code', 255)->nullable();
            $table->dateTime('effective_date_from', $precision = 0);
            $table->dateTime('effective_date_to', $precision = 0);
            $table->integer('project_id');
            $table->text('contributors')->nullable();
            $table->integer('author_id');
            $table->text('questionaire')->nullable();
            $table->tinyInteger('status')->nullable()->default(1)->comment('1 = Active, 2 = Inactive');
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
        Schema::dropIfExists('form');
    }
}
