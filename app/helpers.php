<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

if (! function_exists('user')) {
    /**
     * Возвращает текущего пользователя
     * @return User - текущий пользователь
     */
    function user(): User
    {
        $user = Auth::user() ?? new User();

        return $user;
    }
}

if (!function_exists('getResource')) {
    /**
     * Преобразут модель, запрос или класс в готовый ресурс
     * Если Возникает ошибка, проверяй существует ли клас ресурса вообще и правильно ли он рассположен
     *
     * @param string|Model|Builder $model модель, запрос или класс для преобразования
     * @param null|string $mode Мод выгрузки [paginate, full]
     * @return ResourceCollection|JsonResource готовый ресурс
     */
    function getResource(string|Model|Builder|Relation $model, null|string $mode = 'paginate'): ResourceCollection|JsonResource
    {
        $PAGINATE_SIZE = 50;
        $MODS = [
            'paginate' => [
                'method' => 'paginate',
                'params' => [
                    $PAGINATE_SIZE,
                ]
            ],
            'full' => [
                'method' => 'get',
                'params' => []
            ],
        ];

        if (!array_key_exists($mode, $MODS))
            throw new Exception('Invalid method mode:' . $mode);


        if ($model instanceof Model)
            return $model->toresource();

        if ($model instanceof Builder or $model instanceof Relation)
            return $model->{$MODS[$mode]['method']}(...$MODS[$mode]['params'])->toResourceCollection();

        return $model::filter()->{$MODS[$mode]['method']}(...$MODS[$mode]['params'])->toResourceCollection();
    }
}
