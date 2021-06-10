<?php

namespace App\Http\Controllers;

use App\Http\Resources\getResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\validateResource;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
                ->json(getResource('1/shops',Shop::limit(30)->get()))
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
            'name' => 'required|max:64',
            'query' => 'required|max:64',
            'latitude' => 'required|integer',
            'longtitude' => 'required|integer',
            'zoom' => 'required',
        ]);
        if ($validator->fails()) {
            return response()
                ->json(validateError('/shop', $validator->errors()))
                ->header('Content-Type', 'application/json; charset=utf-8');
        }

        $shop = Shop::create($request->all());
        
        
        return response()
            ->json(postResource('1/shops', $shop))
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
        
        $shop = Shop::find($id);
        if(!$shop){
            return response()
                    ->json(dataNotFound('1/shop/'.$id))
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
        $shop = Shop::find($id);
        if(!$shop){
            return response()
                    ->json(dataNotFound('1/shop/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
        }
        $validator = \Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:64',
            'query' => 'required|max:64',
            'latitude' => 'required|integer',
            'longtitude' => 'required|integer',
            'zoom' => 'required',
        ]);
        $shop->update($request->all());

        return response()
            ->json(updateResource('1/shops/'.$shop->id))
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
        $shop = Shop::find($id);
        if(!$shop){
            return response()
                    ->json(dataNotFound('1/shop/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
        }
        $shop->delete();
        return response()
                    ->json(deleteResource('1/shop/'.$id))
                    ->header('Content-Type', 'application/json; charset=utf-8');
    }
}
