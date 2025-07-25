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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('university_id')->constrained()->onDelete('cascade'); // الجامعة
            $table->foreignId('college_id')->constrained()->onDelete('cascade');    // الكلية
            $table->foreignId('major_id')->constrained()->onDelete('cascade');      // التخصص

            $table->string('name_ar');
            $table->string('name_en');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
