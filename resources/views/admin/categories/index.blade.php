@extends('layouts.app')
@section('content')
<div class="card ">
  <div class="card-header">
    Category Lists
  </div>
  <div class="card-body">
    <table class="table table-hover">
    <thead>
      <tr>

        <th scope="col">Category Name</th>
        <th scope="col">Editing</th>
        <th scope="col">Deleting</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>

        <td>
          {{ $category->name }}
        </td>

        <td>
          <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-xs btn-info">
             <i class="fas fa-edit"></i>
          </a>
        </td>

        <td>
          <form action="{{ route('category.destroy',['id'=>$category->id]) }}" method="post" class="pull-right">
              {{ csrf_field() }}
              {{ method_field('DELETE')}}
              <button type="submit" class="btn btn-xs btn-info"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>

      </tr>
      @endforeach


    </tbody>
    </table>
  </div>
</div>
@endsection
