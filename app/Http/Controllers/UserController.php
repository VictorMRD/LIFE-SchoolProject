<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    /* Agregamos View|RedirectResponse debido a que lo que se espera que le regresemos por default
        al usuario era una vista, pero en este caso estamos redirigiendolo a una ruta. Con esto agregado
        podemos devolver cualquiera de las 2 opciones sin problemas. */
    public function index(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        
        return view('index');
    }

    public function login() : View|RedirectResponse{
        if (Session::has('user')) {
            return redirect()->route('index');
        }
        return view('login');
    }
    
    public function user_profile(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        return view('profile');
    }
    public function administrator(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            return redirect()->route('index');

        }
        if(Session::get('role') == "user"){
            return redirect()->route('index');
        }
        return view('administrator');
    }
    public function votaciones(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            return redirect()->route('index');
        }
        if(Session::get('role') == "user"){
            return redirect()->route('login');
        }
        return view('votaciones');
    }
    public function frases(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        if(Session::get('role') == "user"){
            return redirect()->route('login');
        }
        return view('frases');
    }
    public function paravotar(): View|RedirectResponse
    {
        if (!Session::has('user')) {
            
            return redirect()->route('login');
        }
        return view('paravotarr');
    }
}
