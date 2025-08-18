<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use ReflectionClass;

abstract class Controller
{
    public function __construct()
    {
        ### Определяем, может ли пользователь совершить действие
        ##################################################
        $METHODS = [
            'index' => 'viewAny',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];

        preg_match("/[^@]*$/", request()->route()->action['controller'], $matches);
        $method = $METHODS[$matches[0]];

        preg_match("/.+?(?=Controller)/", new ReflectionClass($this)->getShortName(), $matches);
        $modelName = $matches[0];

        $modelClassName = "App\\Models\\$modelName";
        $policyClassName = "App\\Policies\\$modelName" . 'Policy';

        if (class_exists($modelClassName) and class_exists($policyClassName)) {
            $parameters = request()->route()->parameters;
            if (count($parameters) === 0 and !user()->can('viewAny', $modelClassName))
                return abort(403);

            if (count($parameters) > 0)
                foreach ($parameters as $key => $model) {
                    if ($model instanceof $modelClassName and !user()->can('viewAny', $modelClassName))
                        return abort(403);
                }
        } elseif (!class_exists($modelClassName))
            Log::error("Попытка проверить авторизацию пользователя провалилась. Не удалось найти класс модели", [
                'modelClassName' => $modelClassName,
                'policyClassName' => $policyClassName,
                'user' => user()->id,
            ]);
        elseif(!class_exists($policyClassName))
            Log::error("Попытка проверить авторизацию пользователя провалилась. Не удалось найти класс политики", [
                'modelClassName' => $modelClassName,
                'policyClassName' => $policyClassName,
                'user' => user()->id,
            ]);
    }
}
