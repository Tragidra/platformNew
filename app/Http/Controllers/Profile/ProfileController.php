<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController
{
    public function getImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $pathImage = $profile->profile_image;
        return[
            'path_to_image' => $pathImage,
            'status' => 'ok'];
    }

    public function uploadImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $profile->profile_image = $request->input('path');
        $profile->save();
        return[
          'status' => 'ok'
        ];
    }

    public function deleteImage(Request $request){
        $profile = Profile::find($request->input('id'));
        $profile->profile_image = null;
        $profile->save();
        return[
            'status' => 'ok'
        ];
    }

    public function saveInfo(Request $request){
        $profile = Profile::find($request->input('id'));
        $user = User::find($request->input('id'));
        $request->input('name');
        if($request->input('name') !== null){
            $user->name = $request->input('name');
        }   if($request->input('phone') !== null){
            $user->phone = $request->input('phone');
        }   if($request->input('about') !== null){
            $profile->about = $request->input('about');
        }
        $profile->save();
        $user->save();
        return[
            'status' => 'ok'
        ];
    }
}
