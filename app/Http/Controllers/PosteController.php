<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosteRequest;
use App\Models\Poste;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PosteController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $postes = Poste::latest()->paginate( 10 );
        return view( 'Postes.index', compact( 'postes' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return view( 'Postes.create' );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store( PosteRequest $request, Upload $upload ) {
        $validate = $request->validated();
        $validate['user_id']=Auth::id();
        $upload->uploadImage ( $request, $validate, 'poste' );
        // $validate[ 'image' ] = $request->file( 'image' )->store( 'poste' );
        
        Poste::create( $validate );
        return redirect()->route( 'postes.index' )->with( 'success', 'poste created successfully!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    
    public function show( Poste $poste ) {
        $this->authorize("view",$poste);//using policy
        return redirect()->route("postes.index");
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Poste  $poste
    * @return \Illuminate\Http\Response
    */

    public function edit( Poste $poste ) {
        Gate::authorize("update",$poste);//using Gate
        return view("Postes.edit",compact("poste"));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Poste  $poste
    * @return \Illuminate\Http\Response
    */

    public function update( PosteRequest $request, Poste $poste ,Upload $upload) {
        Gate::authorize("update",$poste);
        $validate = $request->validated();
        $validate['user_id']=Auth::id();
        $upload->uploadImage ( $request, $validate, 'poste' );
        // $validate[ 'image' ] = $request->file( 'image' )->store( 'poste', 'public' );

        $poste->update( $validate );
        // $poste->fill( $validate )->save();

        return to_route( 'postes.index' )->with( 'success', 'poste updated successfully!' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Poste  $poste
    * @return \Illuminate\Http\Response
    */

    public function destroy( Poste $poste ) {
        $poste->delete();
        return redirect()->route( 'postes.index' )->with( 'success', 'poste deleted successfully!' );
    }

}
