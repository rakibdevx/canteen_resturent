<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum('label', ['delivery', 'billing'])->default('delivery');
            $table->string('building_name')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_no')->nullable();
            $table->string('department')->nullable();
            $table->string('campus')->nullable();
            $table->text('notes')->nullable();

            // Optional flags
            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
