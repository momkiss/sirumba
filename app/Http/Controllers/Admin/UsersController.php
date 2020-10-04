<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users','roles'));
    }

    public function create()
    {
        $roles = \App\Role::all();
        return view('admin.users.tambah', compact('roles'));
    }


    public function postDaftar(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $data = $request->all();

        $check = $this->tambah($data);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {

        $roles = Role::all();
        return view('admin.users.edit')->with([
                'user'  => $user,
                'roles' => $roles
        ]);
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index');
    }

	public function tambah(array $data)
	{
        $user =   User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
      
        $role = Role::select('id')->where('name', 'operator')->first();

        $user->roles()->attach($role);
        return $user;
	}

    public function destroy(User $user)
    {
        // if(Gate::denies('delete-users')){
        //     return redirect(route('users.index'));
        // }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }
}
