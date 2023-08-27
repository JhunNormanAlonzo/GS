<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifyRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id');
    }
}
