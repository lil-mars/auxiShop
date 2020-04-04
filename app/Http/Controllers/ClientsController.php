<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
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
        $clientsObjects = Clients::paginate(25);

        return view('clients.index', compact('clientsObjects'));
    }

    /**
     * Show the form for creating a new clients.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('clients.create');
    }

    /**
     * Store a new clients in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Clients::create($data);

            return redirect()->route('clients.clients.index')
                ->with('success_message', 'Clients was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified clients.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clients = Clients::findOrFail($id);

        return view('clients.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified clients.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clients = Clients::findOrFail($id);
        

        return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified clients in the storage.
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
            
            $clients = Clients::findOrFail($id);
            $clients->update($data);

            return redirect()->route('clients.clients.index')
                ->with('success_message', 'Clients was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified clients from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clients = Clients::findOrFail($id);
            $clients->delete();

            return redirect()->route('clients.clients.index')
                ->with('success_message', 'Clients was successfully deleted.');
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
                'company_name' => 'nullable|string|min:0|max:20',
            'father_last_name' => 'nullable|string|min:0|max:20',
            'mother_last_name' => 'nullable|string|min:0|max:20',
            'second_name' => 'nullable|string|min:0|max:20',
            'name' => 'nullable|string|min:0|max:20',
            'occupation' => 'nullable|string|min:0|max:30',
            'address' => 'nullable|string|min:0|max:20',
            'phone' => 'nullable|string|min:0|max:20',
            'fax' => 'nullable|string|min:0|max:20', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
