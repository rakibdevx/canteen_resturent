<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('order_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('price_per_floor', 8, 2)->default(10.00);
            $table->integer('distance_limit_in_floor')->default(10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_settings');
    }
}
