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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, column: 'user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->unsignedInteger('project_id');
            $table->json('fields');
            $table->boolean('manage_leads');
            $table->boolean('export_data');
            $table->boolean('manage_permissions');
            $table->boolean('manage_settings');
            $table->boolean('manage_project');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
