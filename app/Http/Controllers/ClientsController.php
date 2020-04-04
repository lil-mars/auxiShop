<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;

class ClientsController extends Controller
{

    /**
     * Display a listing of the clients.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientsObjects = Client::all();

        return view('admin.clients.index', compact('clientsObjects'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('admin.clients.create');
    }

    /**
     * Store a new client in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Client::create($data);

            return redirect()->route('clients.client.index')
                ->with('success_message', 'Client was successfully added.');
        } catch (Exception $exception) {

            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Display the specified client.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);


        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified client in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request,$id);

            $client = Client::findOrFail($id);
            $client->update($data);

            return redirect()->route('clients.client.index')
                ->with('success_message', 'Client was successfully updated.');
        } catch (Exception $exception) {

            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Remove the specified client from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->route('clients.client.index')
                ->with('success_message', 'Client was successfully deleted.');
        } catch (Exception $exception) {

            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request,$id='')
    {
        $rules = [
            'company_name' => 'required|string|min:0|max:20',
            'father_last_name' => 'required|string|min:0|max:20',
            'mother_last_name' => 'nullable|string|min:0|max:20',
            'second_name' => 'nullable|string|min:0|max:20',
            'name' => 'required|string|min:0|max:20',
            'occupation' => 'nullable|string|min:0|max:30',
            'address' => 'nullable|string|min:0|max:100',
            'phone' => 'nullable|string|min:0|max:20',
            'fax' => 'nullable|string|min:0|max:20',
            'ci' => 'required|string|min:1|max:30|unique:clients,ci,'.$id,
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
