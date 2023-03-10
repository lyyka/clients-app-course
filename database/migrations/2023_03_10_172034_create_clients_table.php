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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Podaci:
            // 1. Ime
            $table->string('first_name');

            // 2. Prezime
            $table->string('last_name');

            // 3. Email adresa
            $table->string('email')->unique();

            // 4. Broj telefona
            $table->string('phone_number')->nullable();

            // 5. Datum rodjenja
            $table->date('date_of_birth')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
