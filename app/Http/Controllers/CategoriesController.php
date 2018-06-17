<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }

    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'name'=>'required|max:200'
        ]);

        $category= new Category;
        $category->name=$request->name;
        $category->save();

        Session::flash('success','Successfully Created a new Category.');

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category=Category::find($id);

        return view('admin.categories.edit')->with('category',$category);
    }


    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('success','Successfully Updated a Category.');
        return redirect()->route('category.index');
    }


    public function destroy($id)
    {
      $category=Category::find($id);
      $category->delete();
      
      Session::flash('success','Successfully Deleted a Category.');
      return redirect()->route('category.index');
    }
}
