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
        $func_local_save = 'image'.$extension;
        $image = $func_name($file);
        $func_local_save($image,(string)random_int(10,15));
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
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
        $pathImage = $profile->profile_image;
        return[
            'path_to_image' => $pathImage,
            'status' => 'ok'];
    }

    public function uploadImage(Request $request){
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
        $profile->profile_image = $request->input('path');
        $profile->save();
        return[
          'status' => 'ok'
        ];
    }

    public function deleteImage(Request $request){
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
        $profile->profile_image = null;
        $profile->save();
        return[
            'status' => 'ok'
        ];
    }

    public function saveInfo(Request $request){
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
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
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
        return[
            'profile' => $profile,
            'status' => 'ok'
        ];
    }
}
