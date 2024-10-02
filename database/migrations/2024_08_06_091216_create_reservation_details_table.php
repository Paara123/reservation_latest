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
        Schema::create('reservation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('reservation_date_from');
            $table->date('reservation_date_to');
            $table->string('reservation_time_slot');
            $table->json('reservation_location');
            $table->string('program_name');
            $table->integer('number_of_participants');
            $table->string('payment_method');
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->text('contact_person_address');
            $table->json('resource_persons');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_details');
    }
};
