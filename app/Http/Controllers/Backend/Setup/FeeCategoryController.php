<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function FeeCatView(){
        $data['feeCat']=FeeCategory::all();
        return view('backend.setup.fee_category.fee_cat_view',$data);
    }
    public function FeeCatAdd(){
        return view('backend.setup.fee_category.fee_cat_add');
    }
    public function FeeCatStore(Request $request){
        $validateData=$request->validate([
            'name'=>'required|unique:fee_categories,name'
        ]);
        $data=new FeeCategory();
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Fee Category Submitted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('fee.cat.view')->with($notification);
    }
    public function FeeCatEdit($id){
       $feeCat = FeeCategory::find($id);
       return view('backend.setup.fee_category.fee_cat_edit',compact('feeCat'));
    }
    public function FeeCatUpdate(Request $request,$id){
        $validateData=$request->validate([
            'name'=>'required|unique:fee_categories,name,'.$id
        ]);
        $data=FeeCategory::find($id);
        $data->name=$request->name;
        $data->save();
        $notification=[
            'message'=>'Fee Category Updated Successfully',
            'type'=>'success'
        ];
        return redirect()->route('fee.cat.view')->with($notification);
    }
    public function FeeCatdelete($id){
        FeeCategory::find($id)->delete();
        $notification=[
            'message'=>'Fee Category Deleted Successfully',
            'type'=>'success'
        ];
        return redirect()->route('fee.cat.view')->with($notification);
    }
}