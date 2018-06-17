@extends('layouts.app')
@section('content')

  @include('admin.includes.errors')


<div class="card ">
  <div class="card-header">
    Create a New Post
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
      </div>

      <div class="form-group">
        <label for="featured">Featured Image</label>
        <input type="file" name="featured" class="form-control">
      </div>

      <div class="form-group">
        <label for="category_id">Select a Category</label>
        <select id="category" name="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea  name="content" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-success"> Save </button>
        </div>
      </div>

    </form>

  </div>

</div>

@endsection
