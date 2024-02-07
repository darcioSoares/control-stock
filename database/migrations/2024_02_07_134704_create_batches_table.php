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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();

            $table->string('lot_number')->nullable();
            $table->string('production_information')->nullable();
            $table->string('batch_code')->nullable();
            $table->string('individual_serial_number')->nullable();
            $table->date('due_date');

            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->unsignedBigInteger('responsible_to_insert_id')->nullable();
            $table->foreign('responsible_to_insert_id')->references('id')->on('users');

            $table->unsignedBigInteger('last_updated_id')->nullable();
            $table->foreign('last_updated_id')->references('id')->on('users'); 
                 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
