<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('groupregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->string('delivery_address')->nullable();
            $table->string('referral_link')->unique()->nullable();
            $table->enum('payment_status', ['pending', 'completed'])->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('group_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupregistration_id')->constrained('groupregistrations')->onDelete('cascade');
            $table->string('participant_name');
            $table->string('parent_name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->boolean('paid')->default(false);
            $table->string('photo_painting_flag')->nullable(); // GPS-tagged
            $table->string('photo_holding_flag')->nullable();  // GPS-tagged
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('e_certificate_sent')->default(false);
            $table->enum('delivery_status', ['pending', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_participants');
        Schema::dropIfExists('groupregistrations');
    }
};
