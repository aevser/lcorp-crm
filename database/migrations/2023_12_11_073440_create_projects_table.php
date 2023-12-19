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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('settings');
            $table->string('api_token')->unique();
            $table->string('timezone')->nullable();
            $table->unsignedInteger('color')->nullable();
            $table->boolean('enabled')->nullable();
            $table->unsignedInteger('lead_validation_days')->nullable();
            $table->boolean('detect_region')->nullable();
            $table->boolean('calltracking')->nullable();
            $table->unsignedInteger('leads_today');
            $table->unsignedInteger('leads_total');
            $table->timestamps();

            $table->index([
                'user_id',
                'leads_today',
                'leads_total',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
