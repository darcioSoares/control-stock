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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('cnpj')->unique();
            
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();           
                        
            $table->string('social_reason')->nullable();
            $table->string('fantasy_name')->nullable();        

            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('status')->nullable();
           
          
            $table->unsignedBigInteger('responsible_to_insert_id')->nullable();
            $table->foreign('responsible_to_insert_id')->references('id')->on('users');

            $table->unsignedBigInteger('last_updated_id')->nullable();
            $table->foreign('last_updated_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
