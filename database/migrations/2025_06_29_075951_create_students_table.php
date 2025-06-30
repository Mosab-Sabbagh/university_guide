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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('university_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('college_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('set null');

            $table->string('student_number')->nullable(); // الرقم الجامعي
            $table->date('enrollment_date')->nullable();  // تاريخ الالتحاق
            $table->string('level')->nullable();           // المستوى الأكاديمي (مثلاً سنة أولى)
            $table->string('profile_image')->nullable(); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
