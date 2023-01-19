<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController
{
    private $nice_extenstions = [
        'jpg', 'jpeg', 'png', 'gif'
    ];

    public function changeImage(Request $request){
        $user = $request->user();
        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        if (!in_array($extension, $this->nice_extenstions)) {
            return [
                'status' => 'error',
                'message' => 'wrong file extension - ' . $extension
            ];
        }
        $extension = ($extension == 'jpg' ? 'jpeg' : $extension);
        $func_name = 'imagecreatefrom' . $extension;
        $image = $func_name($file);
        $size = min(imagesx($image), imagesy($image));
        $image = imagecrop($image, ['x' => (imagesx($image) - $size) / 2, 'y' => (imagesy($image) - $size) / 2,
            'width' => $size, 'height' => $size]);
        ('image'.$extension)($image, fopen($file, 'w'));
        $path = $file->store('profile_images');
        $profile = Profile::where('user_id',$user->id)->first();
        $profile->profile_image = "storage/".$path;
        $profile->save();
        return [
            'status' => 'ok',
            'url' => "storage/".$path
        ];
    }

    public function getImage(Request $request){
        $profile = Profile::where('user_id', $request->input('id'))->first();
        $pathImage = $profile->profile_image;
        return[
            'path_to_image' => $pathImage,
            'status' => 'ok'];
    }

    public function uploadImage(Request $request){
        $profile = Profile::where('user_id', $request->input('id'))->first();
        $profile->profile_image = $request->input('path');
        $profile->save();
        return[
          'status' => 'ok'
        ];
    }

    public function deleteImage(Request $request){
        $profile = Profile::where('user_id', $request->input('id'))->first();
        $profile->profile_image = null;
        $profile->save();
        return[
            'status' => 'ok'
        ];
    }

    public function saveInfo(Request $request){
        $profile = Profile::where('user_id', $request->input('id'))->first();
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
    public function getInfoProfile(Request $request){
        $profile = Profile::find($request->input('id'));
        return[
            'profile' => $profile,
            'status' => 'ok'
        ];
    }
}
