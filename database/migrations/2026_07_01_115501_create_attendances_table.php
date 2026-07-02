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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();

            $table->date('date');

            // Finger IN / OUT
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();

            // Calculated fields
            $table->string('working_hours')->nullable();
            $table->integer('late_minutes')->default(0);

            // Status
            $table->enum('status', ['present','absent','late','leave'])->default('present');

            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
