<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('daily_program_answers', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('student_id');

        $table->date('date');

        $table->string('question_id');

        $table->string('answer_text');

        $table->integer('points')->default(0);

        $table->string('set_name')->nullable();

        $table->timestamps();

        $table->foreign('student_id')
              ->references('id')
              ->on('student_profiles')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_program_answers');
    }
};
