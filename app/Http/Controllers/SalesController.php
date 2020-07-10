<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Spare;
use App\Models\Store;
use App\Models\StoreSpare;
use App\User;
use Illuminate\Http\Request;
use Exception;

class SalesController extends Controller
{

    /**
     * Display a listing of the sales.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sales = Sale::with('client', 'store', 'user')->paginate(25);

        return view('admin.sales.index', compact('sales'));
    }

    public function calendar()
    {
        $sales = Sale::all();

        return view('admin.sales.calendar', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Clients = Client::all()->keyBy('id');
        $Stores = Store::pluck('name', 'id')->all();

        return view('admin.sales.create', compact('Clients', 'Stores'));
    }

    /**
     * Store a new sale in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $data['user_id'] = $request->user()->id;
            Sale::create($data);
            $id = Sale::orderBy('id', 'desc')->first()->id;
            return redirect()->route('sales.sale.show', $id)
                ->with('success_message', 'Venta se agrego correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Display the specified sale.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sale = Sale::with('client', 'store', 'user')->findOrFail($id);
        $store_spares = $sale->store->store_spares;

//        $categories = Category::all();
        return view('admin.sales.show', compact('sale', 'store_spares'));
    }

    /**
     * Show the form for editing the specified sale.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $Clients = Client::all()->keyBy('id');
        $Stores = Store::pluck('name', 'id')->all();

        return view('admin.sales.edit', compact('sale', 'Clients', 'Stores'));
    }

    /**
     * Update the specified sale in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $sale = Sale::findOrFail($id);
            $sale->update($data);

            return redirect()->route('sales.sale.index')
                ->with('success_message', 'Venta se actualizo correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Remove the specified sale from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sale = Sale::findOrFail($id);
            foreach ($sale->saleDetail as $detail){
                $store_spare = StoreSpare::where('spare_id', $detail->spare_id)
                    ->where('store_id',$sale->store_id)
                    ->first();
                $store_spare->quantity += $detail->quantity;
                $store_spare->save();
            }
            $sale->delete();

            return redirect()->route('sales.sale.index')
                ->with('success_message', 'Venta se elimino correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'client_id' => 'nullable',
            'store_id' => 'nullable'
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
