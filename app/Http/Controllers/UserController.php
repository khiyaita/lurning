<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function __construct(){
        // $this->middleware('admin')->only('index');// except()
    }
    public function index() {
        $users = User::paginate( 12 );
        return view( 'Users.index', compact( 'users' ) );

    }

    public function show( User $user ) {
        $postes=Poste::all();
        return view( 'Users.show', compact( 'user' ,'postes') );

    }

    public function create() {
        $countries = array( 'Morocco', 'France', 'Spain', 'Canada', 'Japan', 'Australia', 'Brazil', 'Germany', 'China', 'India', 'United States' );
        return view( 'Users.create', compact( 'countries' ) );

    }

    public function store( userRequest $request ) {
        $validate = $request->validated();
        $validate[ 'password' ] = Hash::make( $request->password );
        $validate[ 'image' ] = $request->file( 'image' )->store( 'user' );
        User::create( $validate );
        return redirect()->route( 'users.index' )->with( 'success', 'User created successfully!' );
    }

    public function edit( User $user ) {
        $countries = array( 'Morocco', 'France', 'Spain', 'Canada', 'Japan', 'Australia', 'Brazil', 'Germany', 'China', 'India', 'United States' );
        return view( 'Users.edit', compact( 'user', 'countries' ) );
    }

    public function update( userRequest $request, User $user ) {
        $validate = $request->validated();
        $validate[ 'password' ] = Hash::make( $request->password );
        $validate[ 'image' ] = $request->file( 'image' )->store( 'user', 'public' );

        $user->update( $validate );
        // $user->fill( $validate )->save();

        return to_route( 'users.show', $user )->with( 'success', 'User updated successfully!' );
    }

    public function destroy( User $user ) {
        $user->delete();
        return redirect()->route( 'users.index' )->with( 'success', 'User deleted successfully!' );
    }
}
