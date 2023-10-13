<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function dashboard(){
        return view('frontend.customer.index');
    }
    public function profile(){
        return view('frontend.customer.profile');
    }
    public function update_profile(ProfileRequest $request){
        // dd($request->all());
        $user = auth()->user();
        $data['firstname'] = $request->first_name;
        $data['lastname'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->mobile;

        if (!empty($request->password) && !Hash::check($request->password, $user->password)) {
            $data['password'] = bcrypt($request->password);
        }

        if ($user_image = $request->file('user_image')) {
            if ($user->image != '') {
                if (File::exists('images/users/' . $user->image)){
                    unlink('images/users/' . $user->image);
                }
            }
            $file_name = $user->full_name . '.' . $user_image->extension();
            $path = public_path('images/users/'. $file_name);
            Image::make($user_image->getRealPath())->resize(300, null, function ($constraints) {
                $constraints->aspectRatio();
            })->save($path, 100);
            $data['image'] = $file_name;
        }

        $user->update($data);
        toast('Profile updated', 'success');
        return back();
    }
    public function remove_profile_image(){
        $user = auth()->user();
        if ($user->image != '') {
            if (File::exists('images/users/' . $user->image)){
                unlink('images/users/' . $user->image);
            }
        }
        $user->image = null;
        $user->save();
        toast('Profile image deleted', 'success');
        return back();
    }
    public function addresses(){
        return view('frontend.customer.addresses');
    }
    public function orders(){
        return view('frontend.customer.orders');
    }
}
