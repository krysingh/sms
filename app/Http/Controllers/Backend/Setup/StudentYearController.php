<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYearView(){
        $data['studentView']=StudentYear::all();
        return view('backend.setup.studentyear.student_year_view',$data);
    }
    public function StudentYearAdd(){
        return view('backend.setup.studentyear.student_year_add');
    }
    public function StudentYearStore(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:student_years,name'
        ]);
        $data=new StudentYear();
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Data Submitted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearEdit($id){
       $editYear = StudentYear::find($id);
       return view('backend.setup.studentyear.student_year_edit',compact('editYear'));
    }
    public function StudentYearUpdate(Request $request,$id){
        $validateData=$request->validate([
            'name'=>'required|unique:student_years,name,'.$id
        ]);
        $data=StudentYear::find($id);
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Data Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYeardelete($id){
        StudentYear::find($id)->delete();
        $notification=[
            'message'=>'Data Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
}