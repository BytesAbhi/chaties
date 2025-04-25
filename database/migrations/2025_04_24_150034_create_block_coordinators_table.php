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
        Schema::create('block', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->text('address')->nullable();
            $table->string('block');
            $table->string('role')->default('Block Coordinator');
            $table->unsignedBigInteger('distt_coord');
            $table->rememberToken();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('distt_coord')->references('id')->on('vendors')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block');
    }
};
