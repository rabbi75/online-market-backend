<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        return Product::orderBy('id','desc')->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $document = $request->file('file');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/images/',$document_name);
        Product::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'description'=>$request->description,
            'price'=>$request->price,
            'file_path'=>$document_name,
        ]);
        return $request->input();

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        // inser images also
        if ($request -> hasFile('file')) {
            // delete the old image from folder
            if(!empty($data->file_path)){
                unlink('assets/images/'.$data->file_path);
            }
            $document = $request->file('file');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/',$document_name);
            $data->file_path=$document_name;
        }
        $data->save();
        return $data;
    }


    public function destroy($id)
    {
        $delete = Product::find($id);
        if(!empty($delete->file_path)){
            unlink('assets/images/'.$delete->file_path);
        }
        $delete->delete();
        return ["Product has been deleted"];

    }
    public function getProduct($id){
        return Product::find($id);
    }
    public function search($key){
        return Product::where('name','LIKE',"%$key%")->get();

    }
}
