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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, column: 'user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('create_projects');
            $table->boolean('manage_users');
            $table->boolean('manage_permissions');
            $table->boolean('edit_projects');
            $table->boolean('global_settings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
