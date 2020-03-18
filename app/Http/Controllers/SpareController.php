<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Spare;
use Illuminate\Http\Request;

class SpareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spares = Spare::all();
        return view('admin.spare.index',compact('spares'));
    }
    public function filter(Request $request) {
        $filters = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });
        // Filter products
        $spares = Spare::all();
        $spares = $spares->filter(function ($product) use ($filters) {
            foreach ($filters as $key => $filter ) {
                if (strripos($product[$key],$filter) === false){
                    return false;
                }
            }
            return true;
        });
        return view('admin.spare.index', compact('spares'));
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
     * @param  \App\Models\Spare  $spare
     * @return \Illuminate\Http\Response
     */
    public function show(Spare $spare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spare  $spare
     * @return \Illuminate\Http\Response
     */
    public function edit(Spare $spare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spare  $spare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spare $spare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spare  $spare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spare $spare)
    {
        //
    }
}
