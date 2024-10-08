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
        Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->foreignId('list_id')->references('id')->on('lists')->onDelete('cascade');
			$table->string('title', 255);
			$table->text('description')->nullable();
			$table->boolean('is_done')->default(false);
			$table->boolean('is_daily_habit')->default(false);
			$table->dateTime('due')->nullable();
			$table->integer('priority')->default('0');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
