<?php

declare(strict_types=1);

namespace App\Http\Filters\Var1;

use Illuminate\Database\Eloquent\Builder;

class WorkerFilter extends AbstractFilter
{
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const DESCRIPTION = 'description';
    const AGE_FROM = 'from';
    const AGE_TO = 'to';
    const IS_MARRIED = 'is_married';

    public function getCallbacks(): array
    {
        return [
            self::FIRST_NAME => 'firstName',
            self::LAST_NAME => 'lastName',
            self::EMAIL => 'email',
            self::DESCRIPTION => 'description',
            self::AGE_FROM => 'ageFrom',
            self::AGE_TO => 'ageTo',
            self::IS_MARRIED => 'isMarried',
        ];
    }

    public function firstName(Builder $builder, $value)
    {
        $builder->where('first_name', 'like', "%{$value}%");
    }

    public function lastName(Builder $builder, $value)
    {
        $builder->where('last_name', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function ageFrom(Builder $builder, $value)
    {
        $builder->where('from', '>', $value);
    }

    public function ageTo(Builder $builder, $value)
    {
        $builder->where('to', '<', $value);
    }

    public function isMarried(Builder $builder, $value)
    {
        $builder->where('is_married', true);
    }

}
