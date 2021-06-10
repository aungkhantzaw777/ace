<?php

namespace App\Http\Controllers;

use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use App\Models\Shop;
use Illuminate\Http\Request;

class CouponShopController extends Controller
{
    public function shops(Request $request)
    {
        
        $coupon = CouponResource::make(Coupon::find($request->coupon_id));
        return response()
                ->json(getResource('1/coupons/'.$request->coupon_id.'/shops',$coupon))
                ->header('Content-Type', 'application/json; charset=utf-8');

        
    }

    public function shopcoupon(Request $request)
    {
        $coupon = Coupon::find($request->coupon_id);
        $coupon->shops = $coupon->shops()->where('id' , $request->shop_id);
        
        return response()
                ->json(getResource('1/coupons/'.$request->coupon_id.'/shops',$coupon))
                ->header('Content-Type', 'application/json; charset=utf-8');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'shop_id' => 'required',
            'coupon_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()
                ->json(shopCouponError('/coupons/'. $this->coupon_id .'/shops', $validator->errors()))
                ->header('Content-Type', 'application/json; charset=utf-8');
        }

        $coupon = Coupon::find($request->coupon_id);
        if (! $coupon->shops->contains($request->shop_id)) {
            $coupon->shops()->attach($request->shop_id);
        }else {
            return response()
                ->json(duplicateKey('1/coupons/'. $request->shop_id.'/shops'))
                ->header('Content-Type', 'application/json; charset=utf-8');
        }
        

        return response()
                ->json(postResource('1/coupons/'. $request->coupon_id .'/shops',$coupon))
                ->header('Content-Type', 'application/json; charset=utf-8');
            
        
    }

    public function destory(Request $request)
    {
        $coupon = Coupon::find($request->coupon_id);
        if(!$coupon){
            return response()
                    ->json(dataNotFound('1/coupons/'.$request->coupon_id.'shops'.$request->shop_id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
        }
        $coupon = Coupon::find($request->coupon_id);
        $coupon->shops()->detach($request->shop_id);

        return response()
                ->json(deleteResource('1/coupons/'. $request->coupon_id .'/shops'.$request->shop_id))
                ->header('Content-Type', 'application/json; charset=utf-8');
    }
}
