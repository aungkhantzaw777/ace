<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    use HasFactory;
    public $guarded = [];

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
    public function admin()
    {
        return $this->belongTo(Admin::class);
    }
}
