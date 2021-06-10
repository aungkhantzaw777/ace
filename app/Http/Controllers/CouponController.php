<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
                ->json(getResource('1/coupons',Coupon::limit(30)->get()))
                ->header('Content-Type', 'application/json; charset=utf-8');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'discount_type' => 'in:percentage,fix-amount',
            'amount' => 'required|integer',
            'code' => 'required|integer',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'coupon_type' => 'in:public,private',
            'user_count' => 'required',
        ]);
        if ($validator->fails()) {
            return response()
                ->json(couponValidation('/coupon', $validator->errors()))
                ->header('Content-Type', 'application/json; charset=utf-8');
        }

        $coupon = Coupon::create($request->all());
        

        return response()
            ->json(postResource('1/coupons',$coupon))
            ->header('Content-Type', 'application/json; charset=utf-8');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Coupon::find($id);
        if(!$shop){
            return response()
                    ->json(dataNotFound('1/coupons/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
        } 
        return response()
            ->json(showResource('1/shops/'.$shop->id, $shop))
            ->header('Content-Type', 'application/json; charset=utf-8');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Shop::find($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'discount_type' => 'in:percentage,fix-amount',
            'amount' => 'required|integer',
            'code' => 'required|integer',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'coupon_type' => 'in:public,private',
            'user_count' => 'required',
        ]);
        if ($validator->fails()) {
            return response()
                ->json(couponValidation('1/coupon/'.$id, $validator->errors()))
                ->header('Content-Type', 'application/json; charset=utf-8');
        }
        $coupon->update($request->all());

        
        return response()
            ->json(updateResource('1/coupons/'.$coupon->id))
            ->header('Content-Type', 'application/json; charset=utf-8');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if(!$coupon){
            return response()
                    ->json(dataNotFound('1/coupons/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
        }
        $coupon->delete();
        return response()
                    ->json(deleteResource('1/coupns/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
    }
}
