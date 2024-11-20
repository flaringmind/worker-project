<?php

declare(strict_types=1);

namespace App\Http\Filters\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class AgeTo
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('to')) {
            $builder->where('age', '<', request('to'));
        }

        return $next($builder);
    }
}
