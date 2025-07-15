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
        Schema::create('offline_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detox_plan_id')->constrained()->onDelete('cascade');
            $table->string('activity_name'); // Tambahkan ini karena sebelumnya hilang
            $table->text('description')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_activities');
    }
};
