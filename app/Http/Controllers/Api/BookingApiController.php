<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingApiController extends Controller
{

    public function index($status){

        if($status == 'confirmed'){
            $bookings = Booking::orderBy('status_id','asc')->paginate(5);
        }
        else{
            $bookings = Booking::orderBy('status_id','desc')->paginate(5);
        }
        return new BookingCollection($bookings);
    }
    public function getBooking($id){

        $booking = Booking::findOrFail($id);
        return new BookingResource($booking);
    }
    public function delete($id){
        Booking::findOrFail($id)->delete();
    }
    public function patch($id, Request $request){
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status_id' => ($request['status'] == 1 || $request['status'] == 2) ? $request['status'] : $booking->status_id,
        ]);
        $booking->save();
        return new BookingResource($booking);

    }
    public function create(Request $request){
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'arrived' => now(),
            'status_id' => 2,
        ]);
        return new BookingResource($booking);
    }

}
