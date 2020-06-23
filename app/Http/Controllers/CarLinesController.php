<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CarLine;
use Illuminate\Http\Request;
use Exception;

class CarLinesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the car lines.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $carLines = CarLine::paginate(25);

        return view('admin.car_lines.index', compact('carLines'));
    }

    /**
     * Show the form for creating a new car line.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.car_lines.create');
    }

    /**
     * Store a new car line in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            CarLine::create($data);

            return redirect()->route('car_lines.index')
                ->with('success_message', 'Linea de carro se agrego correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Display the specified car line.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $carLine = CarLine::findOrFail($id);

        return view('admin.car_lines.show', compact('carLine'));
    }

    /**
     * Show the form for editing the specified car line.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $carLine = CarLine::findOrFail($id);


        return view('admin.car_lines.edit', compact('carLine'));
    }

    /**
     * Update the specified car line in the storage.
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

            $carLine = CarLine::findOrFail($id);
            $carLine->update($data);

            return redirect()->route('car_lines.index')
                ->with('success_message', 'Linea de carro se actualizo correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Remove the specified car line from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $carLine = CarLine::findOrFail($id);
            $carLine->delete();

            return redirect()->route('car_lines.index')
                ->with('success_message', 'Linea de carro se elimino correctamente.');
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
                'name' => 'nullable|string|min:0|max:50',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
