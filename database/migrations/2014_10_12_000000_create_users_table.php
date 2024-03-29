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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->tinyInteger('actived')->default(1);
            $table->string('roles')->nullable();
            $table->string('avatar')->nullable()->default('users/user.png');

            // $table->unsignedBigInteger('company_id');
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            // $table->unsignedBigInteger('responsible_to_insert_id')->nullable();
            // $table->foreign('responsible_to_insert_id')->references('id')->on('users');

            // $table->unsignedBigInteger('last_updated_id')->nullable();
            // $table->foreign('last_updated_id')->references('id')->on('users'); 

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
