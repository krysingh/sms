<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroupView(){
        $data['studentGroup']=StudentGroup::all();
        return view('backend.setup.studentgroup.student_group_view',$data);
    }
    public function StudentGroupAdd(){
        return view('backend.setup.studentgroup.student_group_add');
    }
    public function StudentGroupStore(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:student_groups,name'
        ]);
        $data=new StudentGroup();
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Group Submitted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupEdit($id){
       $editGroup = StudentGroup::find($id);
       return view('backend.setup.studentgroup.student_group_edit',compact('editGroup'));
    }
    public function StudentGroupUpdate(Request $request,$id){
        $validateData=$request->validate([
            'name'=>'required|unique:student_groups,name,'.$id
        ]);
        $data=StudentGroup::find($id);
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Group Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupdelete($id){
        StudentGroup::find($id)->delete();
        $notification=[
            'message'=>'Group Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('student.group.view')->with($notification);
    }
}