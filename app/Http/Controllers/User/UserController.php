<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
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
