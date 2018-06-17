@extends('layouts.app')
@section('content')
<div class="card ">
  <div class="card-header">
    Posts Lists
  </div>
  <div class="card-body">
    <table class="table table-hover">
    <thead>
      <tr>

        <th scope="col">Imaged</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @if($posts->count()>0)
      @foreach($posts as $post)
      <tr>

        <td>
          <img src='{{ $post->featured }}' alt ='{{ $post->title }}'  width="90px" height="50px"/>
        </td>
        <td>
          {{ $post->title }}
        </td>
        <td>
          <a href="{{ route('posts.edit',['id'=>$post->id]) }}" class="btn btn-xs btn-info">
             <i class="fas fa-edit"></i>
          </a>
        </td>

        <td>
          <form action="{{ route('posts.destroy',['id'=>$post->id]) }}" method="post" class="pull-right">
              {{ csrf_field() }}
              {{ method_field('DELETE')}}
              <button type="submit" class="btn btn-xs btn-info"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>

      </tr>
      @endforeach
      @else
       <tr>
         <th>No Posts.</th>
       </tr>
      @endif


    </tbody>
    </table>
  </div>
</div>
@endsection
