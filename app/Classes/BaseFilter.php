<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseFilter
{
    protected Builder $builder;
    protected readonly Request $request;

    /**
     * @param FormRequest $request
     */
    public function __construct()
    {
        $this->request = request();
    }

    /**
     * Применение фильтров к запросу
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        if ($this->request->input('filters.search'))
            $this->builder = $this->search($this->request->input('filters.search'));

        foreach ($this->request->input('filter') ?? [] as $method => $value) {
            if ($value === null) {
                continue;
            }

            $methodName = Str::camel($method);

            if (method_exists($this, $methodName)) {
                $this->builder = $this->{$methodName}($value);
            }
        }

        return $this->builder;
    }

    /**
     * @param string $value - Строка для поиска
     */
    public function search(string $value): Builder
    {
        return $this->builder->where(function ($query) use ($value) {
            $model = $query->getModel();

            foreach ($model->searched as $searchColumn) {
                if (in_array($searchColumn, $model::getTableColumns()))
                    $query->orWhereLike($searchColumn, '%' . $value . '%');
            }
        });
    }
}
