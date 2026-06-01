<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'content'])]
#[Hidden(['content'])]

class Category extends Model
{
    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }
}
