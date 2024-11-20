<?php

declare(strict_types=1);

namespace App\Http\Filters\Var1;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    const TITLE = 'title';
    const VIEW = 'view';

    public function getCallbacks(): array
    {
        return [
            self::TITLE => 'title',
            self::VIEW => 'view',
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function view(Builder $builder, $value)
    {
        $builder->where('view', 'like', "%{$value}%");
    }

}
