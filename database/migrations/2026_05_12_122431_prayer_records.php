<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prayer_records',function(Blueprint $table){
        $table->id();

        $table->foreignId('student_id')->constrained('student_profiles')->onDelete('cascade');
        $table->foreignId('teacher_id')->constrained('teacher_profiles')->onDelete('cascade');
        $table->date('date');
        $table->string('prayer_name');
        $table->string('status');
        $table->integer('points')->default(0);
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_records');
    }
};
