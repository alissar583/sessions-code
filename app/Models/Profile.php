<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['age'])]

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
