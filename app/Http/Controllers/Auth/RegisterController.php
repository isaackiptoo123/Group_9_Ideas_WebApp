<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'role_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Password::min(8)
        //             ->mixedCase()
        //             ->letters()
        //             ->numbers()
        //             ->symbols()
        //             ->uncompromised(),
        //     'password_confirmation' => 'required',
        //     ],
        // ]);
        
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
            'phone_number' => $request->phone,
            'birth_date' => $request->birth_date,
            'ideas' => $request->investment,
            
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
    }

    public function newadmin(){
        return view('usermanagement.new_admin');
    }
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);     
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
            'phone_number' => $request->phone,
            'birth_date' => $request->birth_date,
            'ideas' => $request->investment,
            
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect('add_Admin');
    }

}
