<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
        $data['allData']=User::all();
        return view('backend.user.view',$data);
    }
    public function UserAdd(){
        return view('backend.user.add');
    }
    public function UserStore(Request $res){
        $validateData=$res->validate([
            'usertype'=>'required',
            'email'=>'required|unique:users',
            'name'=>'required'
        ]);

        $data=new User();
        $data->usertype=$res->usertype;
        $data->email=$res->email;
        $data->name=$res->name;
        $data->password=bcrypt($res->password);
        $data->save();
        $notification=[
            'message'=>'Data Inserted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('user.view')->with($notification);
    }
    public function UserEdit($id){
        $data['editData']=User::find($id);
        return view('backend.user.edit',$data);
    }
    public function UserUpdate(Request $res,$id){
        $data=User::find($id);
        $data->usertype=$res->usertype;
        $data->email=$res->email;
        $data->name=$res->name;
        $data->password=bcrypt($res->password);
        $data->save();
        $notification=[
            'message'=>'Data Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('user.view')->with($notification);
    }
    public function UserDelete($id){
        User::find($id)->delete();
        $notification=[
            'message'=>'Data Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('user.view')->with($notification);
    }
}