<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        return UserResource::collection(User::all());
        // return new UserResource(User::all());
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $validate = $request->all();
        $validate[ 'password' ] = Hash::make( $request->password );
        User::create( $validate );
        return response()->json( 'User created successfully!' );
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */

    public function show( User $user ) {
        return new UserResource($user);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, User $user ) {
        $validate = $request->all();
        $validate[ 'password' ] = Hash::make( $request->password );
        $user->update( $validate );
        return response()->json( 'User updated successfully!' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */

    public function destroy( User $user ) {
        $user->delete();
        return response()->json( 'User deleted successfully!' );
    }
}
