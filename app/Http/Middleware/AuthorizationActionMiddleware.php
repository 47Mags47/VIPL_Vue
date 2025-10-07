<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationActionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array('auth', $request->route()->middleware()))
            return $next($request);

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

        $controller = request()->route()->getAction('controller');

        preg_match("/.*(?=@)/", $controller, $matches);
        $controllerClass = $matches[0];

        preg_match("/[^@]*$/", $controller, $matches);

        if (!array_key_exists($matches[0], $METHODS)) {
            Log::info("Пропущена проверка неизвестного метода" . '"' . $matches[0] . '"', [
                'user' => user()->id,
            ]);
            return $next($request);
        }

        $method = $METHODS[$matches[0]];

        preg_match("/.+?(?=Controller)/", new ReflectionClass($controllerClass)->getShortName(), $matches);
        $modelName = $matches[0];

        $modelClassName = "App\\Models\\$modelName";
        $policyClassName = "App\\Policies\\$modelName" . 'Policy';

        if (class_exists($modelClassName) and class_exists($policyClassName)) {
            $parameters = request()->route()->parameters;

            if (count($parameters) === 0 and user()->cannot($method, $modelClassName))
                return abort(403);

            if (count($parameters) > 0 and array_key_exists($modelName, $parameters) and user()->cannot($method, $parameters[$modelName]))
                return abort(403);
        } elseif (!class_exists($modelClassName))
            Log::info("Попытка проверить авторизацию пользователя провалилась. Не удалось найти класс модели", [
                'modelClassName' => $modelClassName,
                'policyClassName' => $policyClassName,
                'user' => user()->id,
            ]);
        elseif (!class_exists($policyClassName))
            Log::error("Попытка проверить авторизацию пользователя провалилась. Не удалось найти класс политики", [
                'modelClassName' => $modelClassName,
                'policyClassName' => $policyClassName,
                'user' => user()->id,
            ]);

        return $next($request);
    }
}
