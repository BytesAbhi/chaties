<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->text('address')->nullable();
            $table->string('district');
            $table->string('role')->default('District Coordinator');
            $table->unsignedBigInteger('vendor_id');
            $table->rememberToken();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('district');
    }
};
