<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu as M;

class Dish extends Model
{
    use HasFactory;
    public function menuInfo()
    {
        return $this->belongsTo(M::class, 'menu_id', 'id');
    }
}
