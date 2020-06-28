<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(25);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.categories.create');
    }

    /**
     * Store a new category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->validation($request);

            Category::create($data);

            return redirect()->route('categories.index')
                ->with('success_message', 'Categoria se agrego correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }
    public function storeAndBack(Request $request) {
        try {
            $data = $this->validation($request);

            $cat = Category::create($data);
            return back();
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);


        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->validation($request);

            $category = Category::findOrFail($id);
            $category->update($data);

            return redirect()->route('categories.index')
                ->with('success_message', 'Categoria se actualizo correctamente.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Error inesperado mientras se intentaba realizar tu peticion.']);
        }
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.index')
                ->with('success_message', 'Categoria se elimino correctamente.');
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
    protected function validation(Request $request)
    {
        $rules = [
                'name' => 'nullable|string|min:0|max:50',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
