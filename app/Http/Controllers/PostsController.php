<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }


    public function create()
    {
        $categories=Category::all();

        if($categories->count()==0){
          Session::flash('info','Create Category before creating Posts!');
          return redirect()->back();
        }

        return view('admin.posts.create')->with('categories',$categories);
    }


    public function store(Request $request)
    {

      $this->validate($request,[
        'title'=>'required|max:255',
        'featured'=>'required|image',
        'content'=>'required',
        'category_id'=>'required'

      ]);

      $featured=$request->featured;
      $featured_new_name=time().$featured->getClientOriginalName();
      $featured->move('uploads/posts',$featured_new_name);

      $post= Post:: create([
        'title'=>$request->title,
        'content'=>$request->content,
        'category_id'=>$request->category_id,
        'featured'=>'uploads/posts/'.$featured_new_name,
        'slug' => str_slug($request->title)
      ]);

      Session::flash('success','Post Created Successfully.');
      return redirect()->back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post=Post::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
    }

    public function update(Request $request, $id)
    {


        $this->validate($request,[
          'title'=>'required|max:255',
          'content'=>'required',
          'category_id'=>'required'

        ]);

        $post=Post::find($id);

        if($request->hasfile('featured'))
        {
          $featured=$request->featured;
          $featured_new_name=time().$featured->getClientOriginalName();
          $featured->move('uploads/posts/',$featured_new_name);
          $post->featured='uploads/posts/'.$featured_new_name;
        }

        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->slug=str_slug($request->title);

        $post->save();
        Session::flash('success','Post updated Successfully.');
        return view('admin.posts.index')->with('posts', Post::all());


    }

    public function trashed()
    {
      $posts=Post::onlyTrashed()->get();

      return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        Session::flash('success','Post deleted Successfully.');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post=Post::withTrashed($id)->where('id',$id)->first();
        $post->restore();

        Session::flash('success','Post Restored Successfully.');
        return redirect()->back();
    }

    public function kill($id)
    {
        $post=Post::withTrashed($id)->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success','Post Permanently Successfully.');
        return redirect()->back();
    }


}
