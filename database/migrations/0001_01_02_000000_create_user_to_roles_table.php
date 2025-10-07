<?php

use App\Models\User;
use App\Models\Role;
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
        Schema::create('user_to_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(User::getTableName());
            $table->foreignId('role_id')->constrained(Role::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_to_roles');
    }
};
