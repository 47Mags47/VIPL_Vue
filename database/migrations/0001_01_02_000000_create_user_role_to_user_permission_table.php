<?php

use App\Models\UserPermission;
use App\Models\UserRole;
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
        Schema::create('user_role_to_user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained(UserRole::getTableName());
            $table->foreignId('permission_id')->constrained(UserPermission::getTableName());

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_user_permissions');
    }
};
