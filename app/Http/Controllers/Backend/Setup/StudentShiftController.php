<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;
class StudentShiftController extends Controller
{
    public function StudentShiftView(){
        $data['studentShift']=StudentShift::all();
        return view('backend.setup.studentshift.student_shift_view',$data);
    }
    public function StudentShiftAdd(){
        return view('backend.setup.studentshift.student_shift_add');
    }
    public function StudentShiftStore(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:student_shifts,name'
        ]);
        $data=new StudentShift();
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Shift Submitted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftEdit($id){
       $editShift = StudentShift::find($id);
       return view('backend.setup.studentgroup.student_group_edit',compact('editShift'));
    }
    public function StudentShiftUpdate(Request $request,$id){
        $validateData=$request->validate([
            'name'=>'required|unique:student_shifts,name,'.$id
        ]);
        $data=StudentShift::find($id);
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Shift Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftdelete($id){
        StudentGroup::find($id)->delete();
        $notification=[
            'message'=>'Shift Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.shift.view')->with($notification);
    }
}