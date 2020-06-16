<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Spare;
use App\Models\Store;
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
        $sales = Sale::with('client','store','user')->paginate(25);

        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Clients = Client::all()->keyBy('id');
        $Stores = Store::pluck('name','id')->all();

        return view('admin.sales.create', compact('Clients','Stores'));
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

            Sale::create($data);

            return redirect()->route('sales.sale.index')
                ->with('success_message', 'Sale was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
        $sale = Sale::with('client','store','user')->findOrFail($id);
        $spares = Spare::all();

        return view('admin.sales.show', compact('sale', 'spares'));
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
        $Stores = Store::pluck('name','id')->all();

        return view('admin.sales.edit', compact('sale','Clients','Stores'));
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
                ->with('success_message', 'Sale was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
            $sale->delete();

            return redirect()->route('sales.sale.index')
                ->with('success_message', 'Sale was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
