<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{

//6) Получить список броней конкретного пользователя

    public function index()
    {
        $users = User::paginate(3);
        return new UserCollection($users);
    }
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    public function getBookings($id){
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
}
