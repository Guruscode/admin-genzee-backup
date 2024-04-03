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
        Schema::create('fake_users', function (Blueprint $table) {
            $table->string('uid');
            $table->string('about');
            $table->string('age');
            $table->string('alcohol');
            $table->double('balance')->default('0.0');
            $table->string('bodyType');
            $table->string('children');
            $table->string('city');
            $table->string('chatList'); //
            $table->string('company');
            $table->string('country');
            $table->string('dob');
            $table->string('figureType');
            $table->string('gender');
            $table->string('genotype');
            $table->string('height');
            $table->boolean('hideAccount')->default(false);
            $table->string('hobbies'); //Later
            $table->string('languages'); //This also
            $table->string('lastOnline');
            $table->double('latitude');
            $table->string('likes'); //
            $table->double('longitude');
            $table->string('name');
            $table->boolean('notification')->default(false);
            $table->boolean('online')->default(false);
            $table->boolean('paid')->default(false);
            $table->string('partnerType');
            $table->string('phoneNumber');
            $table->string('position');
            $table->string('preference');
            $table->string('profileImage');
            $table->string('profileViews'); //This also
            $table->string('smoking');
            $table->string('specialty');
            $table->string('state');
            $table->string('status');
            $table->string('university');
            $table->boolean('verified')->default(true);
            $table->string('weight');
            $table->string('email');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fake_users');
    }
};
