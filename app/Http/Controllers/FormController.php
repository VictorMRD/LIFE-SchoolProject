<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Emotions; // Corrected the reference to the User model
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Added the Hash facade for password hashing
use Illuminate\Support\Facades\Session;


class FormController extends Controller
{
    //
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users', // unique rule added for username
            'age' => 'required|numeric|max:100',
            'email' => 'required|email|unique:users', // unique rule added for email
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $name = $request->input('name');
        $age = $request->input('age');
        $password = $request->input('password');
        $email = $request->input('email');
    
        $emotion = new Emotions;
        $emotion->Ira = 0;
        $emotion->Disgusto = 0;
        $emotion->Tristeza = 0;
        $emotion->Felicidad = 0;
        $emotion->Sorpresa = 0;
        $emotion->Miedo = 0;
        $emotion->save();

        $account = new User;
        $account->name = $name; // Updated the property name to match the User model
        $account->age = $age;
        $account->email = $email;
        $account->password = Hash::make($password); // Hash the password
        $account->position = 1; // add the position
        $account->alert = "";
        $account->emotions_id = $emotion->id;
        $account->save();
    
        return redirect()->route('index');
    }
    

    public function login(Request $request)
    {
        logger()->debug('Login Attempt', $request->only('name', 'password'));
        
        $credentials = $request->only('name', 'password'); // Updated the field name to match the User model
        if (Auth::attempt($credentials)) {
            // Authentication successful
            // You can perform additional actions or redirect the user here
            $request->session()->regenerate(); // Regenerate session ID to prevent session fixation attacks
            $user = Auth::user(); 
            if($user->banned == "yes"){
                return redirect()->back()->withErrors(['username' => 'Estas baneado.']);
            }
            $request->session()->put('user', $user->name); // Store the username in the session
            $request->session()->put('position', $user->position);
            $request->session()->put('id', $user->id);
            $request->session()->put('email', $user->email);
            $request->session()->put('age', $user->age);
            $request->session()->put('description', $user->description);
            $request->session()->put('role', $user->role);
            $request->session()->put('alert', $user->alert);
            $request->session()->put('emotions_id', $user->emotions_id);
            
            $user->status = "online";
            $user->save();
            $request->session()->put('status', $user->status);
           
            return redirect()->route('index');
        }
        
        // Authentication failed
        // You can redirect back with an error message or handle it according to your requirements
        return redirect()->back()->withErrors(['username' => 'Invalid credentials']);
    }
    
    public function logout(Request $request){
        $user = Auth::user();
        if($user){
            $user->status = "offline";
            $user->save();
            Session::flush();
            return redirect()->route('login');
        }
        Session::flush();
        return redirect()->route('login');
    }
}
