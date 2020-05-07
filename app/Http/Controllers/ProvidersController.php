<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use Exception;

class ProvidersController extends Controller
{

    /**
     * Display a listing of the providers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $providers = Provider::paginate(25);

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new provider.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.providers.create');
    }

    /**
     * Store a new provider in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Provider::create($data);

            return redirect()->route('providers.provider.index')
                ->with('success_message', 'Provider was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified provider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $provider = Provider::findOrFail($id);

        return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified provider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);


        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update the specified provider in the storage.
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

            $provider = Provider::findOrFail($id);
            $provider->update($data);

            return redirect()->route('providers.provider.index')
                ->with('success_message', 'Provider was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified provider from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $provider = Provider::findOrFail($id);
            $provider->delete();

            return redirect()->route('providers.provider.index')
                ->with('success_message', 'Provider was successfully deleted.');
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
            'company_name' => 'nullable|string|min:0|max:40',
            'name' => 'nullable|string|min:0|max:40',
            'last_name' => 'nullable|string|min:0|max:40',
            'occupation' => 'nullable|string|min:0|max:60',
            'address' => 'nullable|string|min:0|max:255',
            'city' => 'nullable|string|min:0|max:20',
            'postal_code' => 'nullable|string|min:0|max:30',
            'country' => 'nullable|string|min:0|max:40',
            'phone' => 'nullable|string|min:0|max:20',
            'fax' => 'nullable|string|min:0|max:20',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
