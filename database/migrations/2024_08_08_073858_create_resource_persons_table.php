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
        Schema::create('resource_persons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->integer('resource_person_id')->unique(); // Numeric ID
            $table->string('resource_person_name');
            $table->bigInteger('resource_person_contact_no'); // Integer contact number
            $table->string('resource_person_email')->unique();
            $table->text('resource_person_address');
            $table->text('expertise_fields');
            $table->string('institute');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_persons');
    }
};
