<?php

namespace App\Services;
use App\Http\Requests\PosteRequest;

class Upload
 {
    public function uploadImage( PosteRequest $request, array &$validate, $name ) {
        unset( $validate[ 'image' ] );
        if ( $request->hasFile( 'image' ) ) {
            $validate[ 'image' ] = $request->file( 'image' )->store( $name, 'public' );
        }
    }
}
