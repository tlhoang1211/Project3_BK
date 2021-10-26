<?php

namespace App\Http\Controllers;

use App\Brand;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class BrandController extends Controller
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
            $brands = Brand::where('status','=','1')->where('brand_name','like','%'.$request->keyword.'%')->orderBy('id',$orderBy)->paginate($numberItem)->appends($request->only('keyword'));
            return view('admin.brands.brand_list',compact('brands'));
        }
        $brands = Brand::where('status','=','1')->orderBy('id',$orderBy)->paginate($numberItem);
//        dd($brands);

        return view('admin.brands.brand_list',compact('brands'));
    }

    public function search(Request $request){
        dd($request);
    }
    public function edit($slug){
        $brand = Brand::where('slug','=',$slug)->where('status','=','1')->first();
        return view('admin.brands.edit',compact('brand'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required',
        ],[
            'name.required' => 'Tên hãng là cần thiết',
            'detail.required' => 'Cần thêm mô tả hãng',
            'thumbnail.required' => 'Bắt buộc phải có ảnh đại diện',
        ]);

        $brand = Brand::find($id);
        $brand->brand_name = $request->name;
        $brand->brand_description = $request->detail;
//        dd(sanitize($request->brand_name));
//        dd($request->thumbnail);
        $brand->brand_thumbnail = $request->thumbnail;
        $brand->slug = sanitize($brand->brand_name);
        if (count(Brand::where('brand_name','=',$request->brand_name)->get())){
            return back()->withErrors('The brand have already existed !','duplicated');
        }
        $brand->status = 1;
        $brand->save();
        return redirect(route('admin_brand'));
    }
    public function create(){
        return view('admin.brands.create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'thumbnail' => 'required',
        ],[
            'name.required' => 'Tên hãng là cần thiết',
            'detail.required' => 'Cần thêm mô tả hãng',
            'thumbnail.required' => 'Bắt buộc phải có ảnh đại diện',
        ]);

        $brand = new Brand();

        $brand->brand_name = $request->name;
        $brand->brand_description = $request->detail;
//        dd(sanitize($request->brand_name));
        $brand->brand_thumbnail = $request->thumbnail;
        $brand->slug = sanitize($brand->brand_name);
        if (count(Brand::where('brand_name','=',$request->brand_name)->get())){
            return back()->withErrors('The brand have already existed !','duplicated');
        }
        $brand->status = 1;
//        dd($brand);
        $brand->save();
        return redirect(route('admin_brand'));
    }
    public function delete($id){
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->save();
        return redirect(route('admin_brand'));
    }
    public function delete_multi(Request $request){
        $ids_array = new Array_();
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
//        return response()->json(['success'=>$ids_array]);
        Brand::whereIn('id', $ids_array)->update(['status' => 0]);

        return response()->json(['success'=>"Products Deleted successfully."]);
//        $products_array = $request->brands;
        //dd($products_array);
        //check product con ton` tai hay khong
//
    }


}
