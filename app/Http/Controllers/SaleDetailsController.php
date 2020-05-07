<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Spare;
use Illuminate\Http\Request;
use Exception;

class SaleDetailsController extends Controller
{

    /**
     * Display a listing of the sale details.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $saleDetailsObjects = SaleDetail::with('spare','sale')->paginate(25);

        return view('sale_details.index', compact('saleDetailsObjects'));
    }

    /**
     * Show the form for creating a new sale details.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Spares = Spare::pluck('code','id')->all();
        $Sales = Sale::pluck('total_price','id')->all();

        return view('sale_details.create', compact('Spares','Sales'));
    }

    /**
     * Store a new sale details in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $data = $this->getData($request);
            SaleDetail::create($data);
            $sale = Sale::find($request->sale_id);
            $sale->total_price += $request->real_price;
            $sale->total_amount += $request->quantity;
            $sale->save();

            $spare = Spare::find($request->spare_id);
            $spare->quantity -= $request->quantity;
            $spare->save();


            return redirect()->route('sales.sale.show',[$request->sale_id])
                ->with('success_message', 'Sale Details was successfully added.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified sale details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $saleDetails = SaleDetail::with('spare','sale')->findOrFail($id);

        return view('sale_details.show', compact('saleDetails'));
    }

    /**
     * Show the form for editing the specified sale details.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $saleDetails = SaleDetail::findOrFail($id);
        $Spares = Spare::pluck('code','id')->all();
        $Sales = Sale::pluck('total_price','id')->all();

        return view('sale_details.edit', compact('saleDetails','Spares','Sales'));
    }

    /**
     * Update the specified sale details in the storage.
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

            $saleDetails = SaleDetail::findOrFail($id);
            $saleDetails->update($data);

            return redirect()->route('sale_details.sale_details.index')
                ->with('success_message', 'Sale Details was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified sale details from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id, $deatil_id)
    {
        try {
            $saleDetails = SaleDetail::findOrFail($deatil_id);
            $sale = Sale::find($id);
            $sale->total_price -= $saleDetails->real_price;
            $sale->total_amount -= $saleDetails->quantity;
            $sale->save();

            $spare = $saleDetails->spare;
            $spare->quantity += $saleDetails->quantity;
            $spare->save();

            $saleDetails->delete();

            return back()
                ->with('success_message', 'Sale Details was successfully deleted.');
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
            'spare_id' => 'required',
            'sale_id' => 'required',
            'price' => 'required|numeric|min:0.5|max:999999.99',
            'quantity' => 'required|numeric|min:0.5|max:2147483647',
            'discount' => 'nullable|numeric|min:0.5|max:999999.99',
            'real_price' => 'required|numeric|min:0.5|max:999999.99',
        ];

        $data = $request->validate($rules);

        return $data;
    }

}
