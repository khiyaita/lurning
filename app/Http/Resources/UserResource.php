<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */

    public function toArray( $request ) {
        // dd( parent::toArray( $request ) );
        $values = parent::toArray( $request );
        // $values[ 'Mohcine' ] = 'Khiyaita';
        $values[ 'image' ] = url( '/storage/'.$values[ 'image' ] );
        $values[ 'password' ] = $this->password;
        $values[ 'created_at' ] = date_format( date_create( $this->created_at ), 'd-m-Y' ) ;
        unset( $values[ 'id' ] );
        return $values;
    }

    public static function collection( $resource ) {
        $values = parent::collection( $resource )->additional( [
            'count'=>$resource->count(),
        ] );
        return $values;
    }
}
