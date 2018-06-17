@extends('layouts.app')
@section('content')

  @include('admin.includes.errors')


<div class="card ">
  <div class="card-header">
    Update Category | {{ $category->name }}
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('category.update',['id'=>$category->id]) }}" >

      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
      </div>



      <div class="form-group">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-success"> Update </button>
        </div>
      </div>

    </form>

  </div>

</div>

@endsection
