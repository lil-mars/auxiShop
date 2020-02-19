<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param null $products
     * @return \Illuminate\Http\Response
     */
    public function index($products = null)
    {
        if (is_null($products)){
            $products = Product::all();
        }
        return view('admin.product.index',compact('products'));
    }

    public function filter(Request $request) {
        // Deleting null filters and token
        $filters = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });
        unset($filters['_token']);

        // Filter products
        $products = Product::all();
        $products = $products->filter(function ($product) use ($filters) {
            foreach ($filters as $key => $filter ) {
                if (strripos($product[$key],$filter) === false){
                    return false;
                }
            }
            return true;
        });
        return view('admin.product.index', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
