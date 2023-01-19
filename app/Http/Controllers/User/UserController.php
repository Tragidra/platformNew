<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request){
        return $request->user();
    }

    public function getUsersForState(Request $request)
    {
        $service = new UserService($request->user());

        return [
            'users' => $service->getConnectionsForUser(),
            'roles' => $service->getRoles()
        ];
    }
}
