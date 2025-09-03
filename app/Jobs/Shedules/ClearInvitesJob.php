<?php

namespace App\Jobs\Shedules;

use App\Models\Invite;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ClearInvitesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct() {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Запущена очистка приглашений");

        Invite::where('created_at', '<', now()->subDay(0)->toDateTimeString())->delete();

        Log::info("Очистка приглашений завершена");
    }
}
