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
        Schema::table('orders', function (Blueprint $table) {

            $table->unsignedBigInteger('rider_id')->nullable()->after('user_id');

            $table->string('otp')->nullable();
            $table->timestamp('otp_expire')->nullable();

            $table->foreign('rider_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropForeign(['rider_id']);

            $table->dropColumn([
                'rider_id',
                'otp',
                'otp_expire'
            ]);
        });
    }
};
