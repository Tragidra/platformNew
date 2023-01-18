<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController
{
    public function getImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $pathImage = $profile->profile_image;
        return $pathImage;
    }
    public function uploadImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $pathImage = $profile->profile_image;
    }
}
