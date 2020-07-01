<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Spare;
use App\Models\Store;
use App\Models\StoreSpare;
use Illuminate\Http\Request;
use Exception;

class StoresController extends Controller
{

    /**
     * Display a listing of the stores.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $stores = Store::paginate(25);
        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new store.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.stores.create');
    }

    /**
     * Store a new store in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Store::create($data);

            return redirect()->route('stores.store.index')
                ->with('success_message', 'Tienda se agrego correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    public function storeQuantities(Request $request, $store)
    {
        $request['store_id'] = $store;
        $spare = Spare::find($request['spare_id']);
        //Check quantity
        if ($spare->quantity < $request['quantity'] || $request['quantity'] < 1 ) {
            return back()->with('error_message', 'Cantidad asignada imposible.');
        }

        $spare->quantity -= $request['quantity'];
        $spare->save();
        // Creating store_spare or updating
        if (StoreSpare::where('spare_id', $request['spare_id'])->exists()) {
            $store_spare = StoreSpare::where('spare_id', $request['spare_id'])->first();

            $store_spare->quantity += $request['quantity'];
            $store_spare->save();

        } else {

            StoreSpare::create($request->all());
        }
        return back()->with('success_message', 'Cantidad agregada a la tienda.');

    }

    /**
     * Display the specified store.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $store = Store::findOrFail($id);
        $spares = Spare::all();
        return view('admin.stores.show', compact('store', 'spares'));
    }

    public function list($id)
    {
        $store = Store::findOrFail($id);
        $categories = Category::all();
        return view('admin.stores.list', compact('store', 'categories'));
    }

    /**
     * Show the form for editing the specified store.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);

        return view('admin.stores.edit', compact('store'));
    }

    /**
     * Update the specified store in the storage.
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

            $store = Store::findOrFail($id);
            $store->update($data);

            return redirect()->route('stores.store.index')
                ->with('success_message', 'Tienda se actualizo correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Remove the specified store from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $store = Store::findOrFail($id);
            $store->delete();

            return redirect()->route('stores.store.index')
                ->with('success_message', 'Tienda se elimino correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    public function destroyQuantities($id)
    {
        $store_spare = StoreSpare::findOrFail($id);
//        Adding quantities
        $spare = Spare::find($store_spare->spare_id);
        $spare->quantity += $store_spare->quantity;
        $spare->save();
//        Deleting register
        $store_spare->delete();
        return back()->with('success_message', 'Cantidad eliminada !');
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
            'name' => 'nullable|string|min:0|max:40',
            'address' => 'nullable|string|min:0|max:255',
            'phone' => 'nullable|string|min:0|max:20',
            'status' => 'nullable|string|min:0|max:20',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
