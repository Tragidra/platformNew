<?php

namespace App\Http\Controllers\Profile;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    private $nice_extenstions = [
        'jpg', 'jpeg', 'png', 'gif'
    ];

    public function changeImage(Request $request){ //Будем скорее всего работать на сервере, на локалке не работает, причины этой фантасмагории мне неведомы
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
        $func_image = 'image' . $extension;
        $image = $func_name($file);
        $size = min(imagesx($image), imagesy($image));
        $image = imagecrop($image, ['x' => (imagesx($image) - $size) / 2, 'y' => (imagesy($image) - $size) / 2,
            'width' => $size, 'height' => $size]);
        $func_image($image, fopen($file, 'w'));
//        Storage::put('public/profile_images', $image);
        $path = $file->store('public/profile_images');
        $profile = Profile::where('user_id',$user->id)->first();
        $path = "storage/".$path;
        $path = str_replace('/public','', $path);
        $profile->profile_image = $path;
        $profile->profile_image = "/storage/".$path;
        $profile->save();
        return [
            'status' => 'ok',
            'url' => $path
        ];
    }

//    public function changeImage(Request $request){
//        $user = $request->user();
//        $file = $request->image;
//        $extension = $file->getClientOriginalExtension();
//        if (!in_array($extension, $this->nice_extenstions)) {
//            return [
//                'status' => 'error',
//                'message' => 'wrong file extension - ' . $extension
//            ];
//        }
//        $filename = Storage::put('storage/profile_images', $file);
//        return([
//         'url' => 'да']);
//    }

        public function getImage(Request $request){
        $user = $request->user();
        $profile = Profile::where('user_id', $user->id)->first();
        $pathImage = $profile->profile_image;
        return[
            'path_to_image' => $pathImage,
            'status' => 'ok'];
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
