<?php

namespace App\Models\Scopes;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveSchoolYearScope implements Scope
{


    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {

        $builder->where('school_year_id', $this->activeSchoolYearId());
    }

    private function activeSchoolYearId(){
        return Helper::activeSchoolYear()->id;
    }


}
