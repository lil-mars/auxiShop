<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\Spare;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;


class PurchasesController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the purchases.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $purchases = Purchase::with('provider')->orderBy('created_at', 'desc')->get();
        return view('admin.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new purchase.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Providers = Provider::all()->keyBy('id');
        return view('admin.purchases.create', compact('Providers'));
    }

    /**
     * Store a new purchase in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            DB::connection()->enableQueryLog();
            $data = $this->getData($request);
            Purchase::create($data);
            $queries = DB::getQueryLog();
            return redirect()->route('purchases.purchase.index')
                ->with('success_message', 'Compra se agrego correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Display the specified purchase.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $purchase = Purchase::with('provider')->findOrFail($id);
        $categories = Category::all();
        return view('admin.purchases.show', compact('purchase', 'categories'));
    }

    /**
     * Show the form for editing the specified purchase.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $Providers = Provider::all()->keyBy('id');

        return view('admin.purchases.edit', compact('purchase','Providers'));
    }

    /**
     * Update the specified purchase in the storage.
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

            $purchase = Purchase::findOrFail($id);
            $purchase->update($data);

            return redirect()->route('purchases.purchase.index')
                ->with('success_message', 'Compra se actualizo correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Remove the specified purchase from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            foreach ($purchase->purchase_spare as $purchase_spare){
                $spare = $purchase_spare->spare;
//                $spare->quantity -= $purchase_spare->quantity;
//                $spare->save();
            }
            $purchase->delete();

            return redirect()->route('purchases.purchase.index')
                ->with('success_message', 'Compra se elimino correctamente.');
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
            'provider_id' => 'nullable',
            'contact' => 'nullable|string|min:0|max:255',
            'total_price' => 'nullable|numeric|min:-999999.99|max:999999.99',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
