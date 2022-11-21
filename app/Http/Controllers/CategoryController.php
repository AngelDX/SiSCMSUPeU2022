<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories=Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        $category=Category::create($request->all());
        return redirect()->route('crud-categories.index')
        ->with('info','La categoria se registro con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category){
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category){
        $category=Category::find($category);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category){
        //dd($request->only(['name','slug']));
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        Category::whereId($category)->update($request->only(['name','slug']));
        //$category->update($request->all());
        return redirect()->route('crud-categories.index')
        ->with('info','La categoria se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //dd($id);
        Category::find($id)->delete();
        return redirect()->route('crud-categories.index')
        ->with('info','La categoria se eliminó con exito');
    }
}
