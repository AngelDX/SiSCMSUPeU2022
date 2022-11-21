<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPostRequest;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryRestController extends Controller{
    
    public function index(){
        $categories=Category::all();
        return response()->json($categories,Response::HTTP_OK);
    }

    public function store(CategoryPostRequest $request){
        $category=Category::create($request->all());
        return response()->json([
            'message'=>"Registro creado satisfactoriamente",
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function update(CategoryPostRequest $request,$category){
        $category=Category::find($category);
        $category->update($request->only('name','slug'));
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'category'=>$category
        ],Response::HTTP_CREATED);
    }

    public function destroy($category){
        $category=Category::find($category);
        $category->delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente"
        ],Response::HTTP_OK);
    }
}
