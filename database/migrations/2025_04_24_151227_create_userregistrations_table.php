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
        Schema::create('userregistrations', function (Blueprint $table) {
            $table->id();

            // User Info
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->string('location')->nullable();

            // Certificate & Payment Info
            $table->enum('certificate_option', ['none', 'e-certificate', 'e-certificate+printed'])->default('none');
            $table->decimal('certificate_price', 8, 2)->default(0.00);
            $table->string('payment_status')->default('pending'); // pending, paid
            $table->timestamp('payment_date')->nullable();

            // Printed Certificate Delivery
            $table->string('delivery_address')->nullable();
            $table->string('delivery_status')->default('not_ordered'); // not_ordered, ordered, delivered

            // Login-related
            $table->rememberToken();
            $table->timestamps();
        });

        // Participant Table
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userregistration_id')->constrained('userregistrations')->onDelete('cascade');

            $table->string('profile_picture')->nullable();
            $table->string('participant_name');
            $table->string('parent_name');
            $table->string('email');
            $table->string('mobile');

            // Certificate Details
            $table->enum('certificate_option', ['e-certificate', 'e-certificate+printed']);
            $table->string('delivery_address')->nullable();
            $table->string('delivery_status')->default('not_ordered');

            // Photos (GPS-tagged)
            $table->string('photo_flag')->nullable(); // Flag only
            $table->string('photo_with_flag')->nullable(); // Participant holding flag

            // Face Match
            $table->boolean('face_verified')->default(false);
            $table->enum('face_status', ['pending', 'approved', 'rejected'])->default('pending');

            // Certificate access
            $table->boolean('can_download_certificate')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
        Schema::dropIfExists('userregistrations');
    }
};
