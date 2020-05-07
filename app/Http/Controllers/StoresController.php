<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Store;
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
                ->with('success_message', 'Store was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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

        return view('admin.stores.show', compact('store'));
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
                ->with('success_message', 'Store was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
                ->with('success_message', 'Store was successfully deleted.');
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
                'name' => 'nullable|string|min:0|max:40',
            'address' => 'nullable|string|min:0|max:255',
            'phone' => 'nullable|string|min:0|max:20',
            'status' => 'nullable|string|min:0|max:20',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
