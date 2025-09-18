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
        Schema::create('results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_id')->constrained('students');
            $table->integer('average');
            $table->integer('rank');
            $table->float('percentage');
            $table->foreignUuid('grade_level_id')->constrained('grade_levels');
            $table->foreignUuid('school_year_id')->constrained('school_years');
            $table->foreignUuid('school_id')->constrained('schools');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
