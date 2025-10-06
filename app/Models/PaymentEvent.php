<?php

namespace App\Models;

use App\Classes\BaseModel;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class PaymentEvent extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PaymentEventFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    ### Методы
    ##################################################
    public static function fromPeriod(Carbon|CarbonImmutable $dateStart, Carbon|CarbonImmutable $dateEnd): Collection
    {
        $period = collect(
            $dateStart
                ->toPeriod($dateEnd, '1 day')
                ->map(fn($date) => [$date->format('d.m.Y') => collect([])])
        )->collapse();

        $events = self::whereBetween('date', [$dateStart, $dateEnd])->get()->map(fn($event) => getResource($event))->groupBy(fn($event) => $event->date->format('d.m.Y'));

        return $period->merge($events);
    }

    ### Связи
    ##################################################
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(PaymentEventStatus::class, 'status_id');
    }
}
