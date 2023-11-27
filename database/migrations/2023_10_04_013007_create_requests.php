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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('lastname', 20);
            $table->string('email', 100);
            $table->string('address', 100);
            $table->string('city', 30);
            $table->tinyInteger('state_id');
            $table->string('zip_code', 5);
            $table->foreignId('service_id')->constrained('services');
            $table->date('service_date');
            $table->string('notes', 1000);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
