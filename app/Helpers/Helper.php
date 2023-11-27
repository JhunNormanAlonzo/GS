<?php

namespace App\Helpers;

use App\Models\SchoolYear;

class Helper
{
    public static function activeSchoolYear(){
        return SchoolYear::where('is_active', true)->first();
    }

}
