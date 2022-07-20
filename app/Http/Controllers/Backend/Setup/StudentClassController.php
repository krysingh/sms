<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function StudentClassView(){
        $data['studentView']=StudentClass::all();
        return view('backend.setup.studentclass.student_class_view',$data);
    }
    public function StudentClassAdd(){
        return view('backend.setup.studentclass.student_class_add');
    }
    public function StudentClassStore(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:student_classes,name'
        ]);
        $data=new StudentClass();
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Class Submitted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassEdit($id){
       $editClass = StudentClass::find($id);
       return view('backend.setup.studentclass.student_class_edit',compact('editClass'));
    }
    public function StudentClassUpdate(Request $request,$id){
        $validateData=$request->validate([
            'name'=>'required|unique:student_classes,name,'.$id
        ]);
        $data=StudentClass::find($id);
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Class Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassdelete($id){
        StudentClass::find($id)->delete();
        $notification=[
            'message'=>'Class Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.class.view')->with($notification);
    }
}