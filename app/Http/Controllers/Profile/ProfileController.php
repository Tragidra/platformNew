<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController
{
    public function ChangeProfileImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $pathImage = $profile->
    }
}
