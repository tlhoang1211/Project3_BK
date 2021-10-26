<?php

namespace App\Http\Controllers;

use App\Origin;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class OriginController extends Controller
{
    public function index(Request $request){
        $numberItem = 5;
        $orderBy = "ASC";
        if ($request->has('numberItem')){
            $numberItem = $request->numberItem;
        }
        if ($request->has('orderBy')){
            $numberItem = $request->orderBy;
        }

        if ($request->has('keyword')){
//            dd(Origin::where('status','=','1')->where('name','like','%'.$request->keyword.'%')->orderBy('id',$orderBy)->paginate($numberItem)->appends($request->only('keyword')));
            $origins = Origin::where('status','=','1')->where('name','like','%'.$request->keyword.'%')->orderBy('id',$orderBy)->paginate($numberItem)->appends($request->only('keyword'));

            return view('admin.origins.origin_list',compact('origins'));
        }
        $origins = Origin::where('status','=','1')->orderBy('id',$orderBy)->paginate($numberItem);
//        dd($brands);

        return view('admin.origins.origin_list',compact('origins'));
    }
    public function search(Request $request){
        dd($request);
    }
    public function edit($slug){
        $origin = Origin::where('slug','=',$slug)->where('status','=','1')->first();
        return view('admin.origins.edit',compact('origin'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Tên hãng là cần thiết',
        ]);

        $brand = Origin::find($id);
        $brand->name = $request->name;
        $brand->save();
        return redirect(route('admin_origin'));
    }
    public function create(){
        return view('admin.origins.create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Tên hãng là cần thiết',
        ]);

        $origin = new Origin();
//        dd($request);
        $origin->name = $request->name;
        $origin->status = 1;
        $origin->slug = sanitize($request->name);
        $origin->save();
        return redirect(route('admin_origin'));
    }
    public function delete($id){
        $brand = Origin::find($id);
        $brand->status = 0;
        $brand->save();
        return redirect(route('admin_origin'));
    }
    public function delete_multi(Request $request){
        $ids_array = new Array_();
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
//        return response()->json(['success'=>$ids_array]);
        Origin::whereIn('id', $ids_array)->update(['status' => 0]);

        return response()->json(['success'=>"Products Deleted successfully."]);
//        $products_array = $request->brands;
        //dd($products_array);
        //check product con ton` tai hay khong
//
    }
}
