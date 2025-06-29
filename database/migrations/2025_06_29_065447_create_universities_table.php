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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');       
            $table->string('name_en');       
            $table->string('abbreviation')->nullable();  // اختصار مثل (IUG)
            $table->string('city');         
            $table->string('address')->nullable();      
            $table->string('website')->nullable();      
            $table->string('email')->nullable();         
            $table->string('phone')->nullable();        
            $table->text('description')->nullable();  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
