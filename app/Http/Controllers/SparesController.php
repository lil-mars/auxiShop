<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarLine;
use App\Models\Category;
use App\Models\Spare;
use Illuminate\Http\Request;
use Exception;

class SparesController extends Controller
{

    /**
     * Display a listing of the spares.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $spares = Spare::with('category','carline','brand')->paginate(25);

        return view('spares.index', compact('spares'));
    }

    /**
     * Show the form for creating a new spare.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Categories = Category::pluck('name','id')->all();
$CarLines = CarLine::pluck('name','id')->all();
$Brands = Brand::pluck('name','id')->all();
        
        return view('spares.create', compact('Categories','CarLines','Brands'));
    }

    /**
     * Store a new spare in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Spare::create($data);

            return redirect()->route('spares.spare.index')
                ->with('success_message', 'Spare was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified spare.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $spare = Spare::with('category','carline','brand')->findOrFail($id);

        return view('spares.show', compact('spare'));
    }

    /**
     * Show the form for editing the specified spare.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $spare = Spare::findOrFail($id);
        $Categories = Category::pluck('name','id')->all();
$CarLines = CarLine::pluck('name','id')->all();
$Brands = Brand::pluck('name','id')->all();

        return view('spares.edit', compact('spare','Categories','CarLines','Brands'));
    }

    /**
     * Update the specified spare in the storage.
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
            
            $spare = Spare::findOrFail($id);
            $spare->update($data);

            return redirect()->route('spares.spare.index')
                ->with('success_message', 'Spare was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified spare from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $spare = Spare::findOrFail($id);
            $spare->delete();

            return redirect()->route('spares.spare.index')
                ->with('success_message', 'Spare was successfully deleted.');
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
                'code' => 'nullable|string|min:0|max:50',
            'category_id' => 'nullable',
            'car_line_id' => 'nullable',
            'brand_id' => 'nullable',
            'description' => 'nullable|string|min:0|max:255',
            'nationality' => 'nullable|string|min:0|max:60',
            'measure' => 'nullable|string|min:0|max:50',
            'product_code' => 'nullable|string|min:0|max:30',
            'original_code' => 'nullable|string|min:0|max:50',
            'quantity' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'price' => 'required|numeric|min:-999999.99|max:999999.99',
            'price_m' => 'required|numeric|min:-999999.99|max:999999.99',
            'investment' => 'required|numeric|min:-999999.99|max:999999.99',
            'image' => 'nullable|numeric|string|min:0|max:255', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
