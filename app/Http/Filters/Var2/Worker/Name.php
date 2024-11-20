<?php

declare(strict_types=1);

namespace App\Http\Filters\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class Name
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('first_name')) {
            $builder->where('first_name', request('first_name'));
        }

        return $next($builder);
    }
}
