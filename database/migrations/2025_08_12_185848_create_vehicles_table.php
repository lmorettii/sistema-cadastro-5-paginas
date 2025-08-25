
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate')->unique();
            $table->string('make');
            $table->string('model');
            $table->integer('year')->nullable();
            $table->string('category')->nullable();
            $table->decimal('daily_rate', 10, 2)->default(0);
            $table->enum('status', ['available','rented','maintenance'])->default('available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
