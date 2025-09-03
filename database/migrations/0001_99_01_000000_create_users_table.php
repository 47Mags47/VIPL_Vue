<?php

use App\Models\Division;
use App\Models\UserRole;
use App\Models\UserStatus;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->boolean('password_expired')->default(false);

            $table->foreignId('division_id')->nullable()->constrained(Division::getTableName());
            $table->foreignId('status_id')->constrained(UserStatus::getTableName());
            $table->foreignId('role_id')->constrained(UserRole::getTableName());

            $table->rememberToken();

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
