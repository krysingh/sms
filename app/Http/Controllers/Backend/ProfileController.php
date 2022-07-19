<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class ProfileController extends Controller
{
    public function UserProfile(){
        $id=Auth::user()->id;
        $userProfile=User::find($id);
        return view('backend.user.user_profile',compact('userProfile'));
    }

    public function UserProfileEdit(){
        $id=Auth::user()->id;
        $userProfileEdit=User::find($id);
        return view('backend.user.edit_profile',compact('userProfileEdit'));
    }

    public function UserProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->gender=$request->gender;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/user_profile'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_profile/'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        $notification=[
            'message'=>'Profile Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('user.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('backend.user.password_change_view');
    }

    public function UpdatePassword(Request $request){
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);
       // dd($request->oldpassword);
       $hashpassword=Auth::user()->password;
        // dd($hashpassword);
        // dd($request->oldpassword);
        if(Hash::check($request->oldpassword,$hashpassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
        
    }
}