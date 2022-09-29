<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant as R;
use App\Models\Dish as D;
use App\Models\Menu as M;
use App\Models\User as U;

class Order extends Model
{
    use HasFactory;

    const STATUSES = [
        1 => 'Pending',
        2 => 'Approved',
        3 => 'Cancelled'
    ];

    public function restInfo()
    {
        return $this->belongsTo(R::class, 'restaurant_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo(M::class, 'menu_id', 'id');
    }
    public function dishInfo()
    {
        return $this->belongsTo(D::class, 'dish_id', 'id');
    }
    public function userInfo()
    {
        return $this->belongsTo(U::class, 'user_id', 'id');
    }
}
