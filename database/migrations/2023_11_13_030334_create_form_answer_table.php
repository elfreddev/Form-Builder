<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_answer', function (Blueprint $table) {
            $table->id();
            $table->integer('form_id');
            $table->text('questionaire_answers')->nullable();    
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
        Schema::dropIfExists('form_answer');
    }
}
