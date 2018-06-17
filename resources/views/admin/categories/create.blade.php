@extends('layouts.app')
@section('content')

  @include('admin.includes.errors')


<div class="card ">
  <div class="card-header">
    Create a Category
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('category.store') }}" >

      {{ csrf_field() }}

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control">
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
