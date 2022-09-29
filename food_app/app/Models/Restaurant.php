<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu as M;

class Restaurant extends Model
{
    use HasFactory;

    public function menus()
    {
        return $this->hasMany(M::class, 'restaurant_id', 'id');
    }
}