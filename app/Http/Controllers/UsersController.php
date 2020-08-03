<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::with('role')->paginate(25);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Roles = Role::pluck('name','id')->all();

        return view('admin.users.create', compact('Roles'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $real_pass = $data['password'];
            $data['password'] = bcrypt($real_pass);
            User::create($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'Usuario se agrego correctamente.');
        } catch (Exception $exception) {
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $Roles = Role::pluck('name','id')->all();

        return view('admin.users.edit', compact('user','Roles'));
    }

    public function stores($id)
    {
        $user = User::findOrFail($id);
        $stores = Store::all();
        return view('admin.users.stores', compact('user', 'stores'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request, $id);

            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'Usuario se actualizo correctamente.');
        } catch (Exception $exception) {
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }


    public function setStores(Request $request, $user_id) {
        try {
            $user = User::find($user_id);
            $user->stores()->sync($request->stores);
            return redirect()->route('users.user.index')
                ->with('success_message', 'Se asignaron las tiendas correctamente !');
        } catch (Exception $exception){
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }
    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                ->with('success_message', 'Usuario se elimino correctamente.');
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
    protected function getData(Request $request, $id = '')
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'nullable|string|min:0|max:255',
            'email' => 'required|string|min:1|max:255|unique:users,email,' . $id,
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password' => 'string|min:1|max:255',
            'remember_token' => 'nullable|string|min:0|max:100',
            'role_id' => 'nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }


    public function editPassword($id, Request $request) {
        $user = User::findOrFail($id);
        return view('admin.users.editPassword', compact('user'));
    }

    public function updatePassword($id, Request $request) {
        try {
            $data = $this->validatePassword($request);
            $user = User::findOrFail($id);

            $data['password'] = bcrypt($data['password']);
            $user->update($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'Contraseña actualizada');
        } catch (Exception $exception) {
            $errors = $exception->errors();
            return back()->withInput()
                ->withErrors($errors);
        }
    }

    private function validatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|string|min:1|max:255',
        ];
        $data = $request->validate($rules);
        return $data;
    }

}
