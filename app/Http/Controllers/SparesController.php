<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpareResource;
use App\Models\Brand;
use App\Models\CarLine;
use App\Models\Category;
use App\Models\Spare;
use App\Models\Store;
use Illuminate\Http\Request;
use Exception;
use DB;
use Illuminate\View\View;

class SparesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the spares.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $spares = Spare::all();
        $categories = Category::pluck('name');
        $brands = Brand::pluck('name');
        $stores = Store::pluck('name', 'id');
        return view('admin.spares.index', compact('spares', 'categories', 'brands', 'stores'));
    }
    public function getSpare(Request $request)
    {
        return Spare::with('category')
            ->with('brand')
            ->with('stores')
            ->with('store_spare')
            ->with('car_lines')
            ->find($request->get('id'));
    }
    public function getStoresAndQuantities(Request $request){
        $key = $request->get('id');
        $stores = DB::table("spares")
            ->select('stores.name as name', 'store_spare.quantity')
            ->join('store_spare', 'store_spare.spare_id', '=', 'spares.id')
            ->join('stores', 'stores.id', '=', 'store_spare.store_id')
            ->where('spares.id', 'like', "%{$key}%")->get();
        return $stores;
    }

    public function list()
    {
        $categories = Category::pluck('name');
        $brands = Brand::pluck('name');
        $stores = Store::pluck('name', 'id');
        $spares = SpareResource::collection(Spare::all());
        return view('admin.spares.list', compact('categories', 'brands', 'stores', 'spares'));
    }
    /**
     * Show the form for creating a new spare.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Categories = Category::pluck('name', 'id')->all();
        $CarLines = CarLine::pluck('name', 'id')->all();
        $Brands = Brand::all();
        return view('admin.spares.create', compact('Categories', 'CarLines', 'Brands'));
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

            $data = $this->validation($request);
            $data['quantity'] = 0;
            $spare = Spare::create($data);

//            Adding car lines
            if ($request['car_lines']) {
                $values = array_values($request['car_lines']);
                $lastSpare = Spare::orderBy('id', 'desc')->first();
                $lastSpare->car_lines()->sync($values);
            }

            return redirect()->route('spares.index')
                ->with('success_message', 'Repuesto agregado correctamente.');
        } catch (Exception $exception) {
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
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
        $spare = Spare::with('category', 'carline', 'brand')->findOrFail($id);

        return view('admin.spares.show', compact('spare'));
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
        $Categories = Category::pluck('name', 'id')->all();
        $CarLines = CarLine::pluck('name', 'id')->all();
        $Brands = Brand::all();

        return view('admin.spares.edit', compact('spare', 'Categories', 'CarLines', 'Brands'));
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

            $data = $this->validation($request, $id);

            $spare = Spare::findOrFail($id);
            $spare->update($data);
            if ($request['car_lines']) {
                $values = array_values($request['car_lines']);
                $spare->car_lines()->sync($values);
            }

            return redirect()->route('spares.index')
                ->with('success_message', 'Repuesto actualizado.');
        } catch (Exception $exception) {
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
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

            return redirect()->route('spares.index')
                ->with('success_message', 'Repuesto eliminado.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Request $request
     * @param string $id
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validation(Request $request, $id = '')
    {
        $rules = [
            'code' => 'nullable|string|min:0|max:50|unique:spares,code,' . $id,
            'category_id' => 'nullable',
            'car_line_id' => 'nullable',
            'brand_id' => 'nullable',
            'description' => 'nullable|string|min:0|max:255',
            'nationality' => 'nullable|string|min:0|max:60',
            'measure' => 'nullable|string|min:0|max:50',
            'product_code' => 'nullable|string|min:0|max:30|unique:spares,product_code,' . $id,
            'original_code' => 'nullable|string|min:0|max:50|unique:spares,original_code,' . $id,
            'price' => 'required|numeric|min:-999999.99|max:999999.99',
            'price_m' => 'required|numeric|min:-999999.99|max:999999.99',
            'investment' => 'required|numeric|min:-999999.99|max:999999.99',
            'image' => 'nullable|min:0|max:2000',
        ];

        $data = $this->validate($request, $rules);
        return $data;
    }

    public function searchSpare(Request $request) {
        $key = $request->get('search');
        $spares = DB::table("spares")
            ->select('spares.id as id', 'categories.name as category', 'brands.name as brand', 'spares.description',
                'spares.code', 'spares.measure', 'spares.investment', 'spares.price', 'spares.original_code')
            ->join('categories', 'categories.id', '=', 'spares.category_id')
            ->join('brands', 'brands.id', '=', 'spares.brand_id')
            ->where('brands.name', 'like', "%{$key}%")
            ->orWhere('categories.name', 'like', "%{$key}%")
            ->orWhere('spares.original_code', 'like', "%{$key}%")
            ->orWhere('spares.code', 'like', "%{$key}%")
            ->orWhere('spares.description', 'like', "%{$key}%")
            ->orWhere('spares.measure', 'like', "%{$key}%")
            ->paginate(10);
        return $spares;
    }
    public function filter(Request $request)
    {
        $categories = Category::pluck('name');
        $brands = Brand::pluck('name');
        $stores = Store::pluck('name', 'id');

        $filters = array_filter($request->all(), function ($value) {
            return !is_null($value);
        });
        // Filter products
        $spares = Spare::all();
        $spares = $spares->filter(function ($product) use ($filters) {
            foreach ($filters as $key => $filter) {
                if (strripos($product[$key], $filter) === false) {
                    return false;
                }
            }
            return true;
        });
        return view('admin.spares.index', compact('spares','categories', 'brands', 'stores'));
    }

}
