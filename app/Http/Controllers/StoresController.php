<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Spare;
use App\Models\Store;
use App\Models\StoreSpare;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

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

    public function storeQuantities(Request $request, $store_id)
    {
        try {
            $now =date(now());
            for ($index = 0; $index < count($request->states); $index++) {
                $spare_store = StoreSpare::updateOrCreate(
                    ['spare_id' => $request->states[$index], 'store_id'=> $store_id],
                    ['quantity' => $request->quantities[$index], 'updated_at'=> $now]
                );
                $spare = Spare::find($request->states[$index]);
                $spare->update_quantity();
            }

            return back()->with('success_message', 'Cantidades agregadas a la tienda.');
        }catch (Exception $exception) {
            return back()->withInput()
                ->with('error_message', 'Error inesperado mientras se intentaba realizar tu peticion.');
        }
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
        if (Auth::user()->role->id == 1) {
            $store = Store::findOrFail($id);
            $spares = Spare::all();
            return view('admin.stores.list.edit', compact('store', 'spares'));
        }
        $store = Store::findOrFail($id);
        return view('admin.stores.list.index', compact('store'));
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
            foreach ($store->store_spares as $store_spare) {
                $spare = Spare::find($store_spare->spare_id);
                $spare->quantity += $store_spare->quantity;
                $spare->save();
            }
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
