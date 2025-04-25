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
        Schema::create('bankdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('holder_id');
            $table->string('name');
            $table->string('role');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bankdetails');
    }
};
