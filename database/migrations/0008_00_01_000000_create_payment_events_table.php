<?php

use App\Models\Payment;
use App\Models\PaymentEventStatus;
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
        Schema::create('payment_events', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->foreignId('payment_id')->constrained(Payment::getTableName());
            $table->foreignId('status_id')->constrained(PaymentEventStatus::getTableName());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_events');
    }
};
