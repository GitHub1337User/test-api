<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'id' => $this->resource->id,
        'name' => $this->resource->name,
        'email' => $this->resource->email,
//            'bookings'=>new BookingCollection($this->resource->bookings)
            'bookings'=>$this->when(Route::current()->getName()=='user-bookings', function ()
            {
                return new BookingCollection($this->resource->bookings);
            })
        ];
//        return parent::toArray($request);
    }
}
