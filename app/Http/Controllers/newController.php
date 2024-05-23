<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NewController extends Controller {
    public function __construct() {
        // $this->middleware( 'auth' )->only( 'log-out' );
    }

    public function index( request $request ) {
        $nom = $request->lastName;
        $prenom = $request->firstName;
        $Modules = [ 'php', 'js', 'python' ];
        // $Modules = [];
        return view( 'page', compact( 'nom', 'prenom', 'Modules' ) );
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function login() {
        return view( 'Users.login' );
    }

    public function auth( Request $request ) {
        $validated = $request->validate( [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ] );
        if ( Auth::attempt( $validated ) ) {
            $request->session()->regenerate();
            $user = Auth::user();
            return to_route( 'users.show', $user )->with( 'success', 'connected' );
        } else {
            return back()->with( 'error', 'login or password incorrect' )->onlyInput( 'email' );
        }
    }

    public function logout() {
        // Session::flash();
        Auth::logout();
        return to_route( 'login' )->with( 'success', 'desconnected' );
    }
}
