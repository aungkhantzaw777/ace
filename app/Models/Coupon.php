<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public $guarded = [];

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
    public function admin()
    {
        return $this->belongTo(Admin::class);
    }
}
