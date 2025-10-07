<?php

use App\Models\User;
use App\Models\Permission;
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
        Schema::create('user_to_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(User::getTableName());
            $table->foreignId('permission_id')->constrained(Permission::getTableName());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_to_permissions');
    }
};
