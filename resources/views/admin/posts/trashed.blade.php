@extends('layouts.app')
@section('content')
<div class="card ">
  <div class="card-header">
    Trashed Posts Lists
  </div>
  <div class="card-body">
    <table class="table table-hover">
    <thead>
      <tr>

        <th scope="col">Imaged</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Restore </th>
        <th scope="col">Destroy </th>
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
          <a href="{{ route('posts.restore',['id'=>$post->id]) }}" class="btn btn-xs btn-success">
             <i class="fas fa-redo"></i>
          </a
        </td>
        <td>
          <a href="{{ route('posts.kill',['id'=>$post->id]) }}" class="btn btn-xs btn-danger">
             <i class="fas fa-minus-circle"></i>
          </a>
        </td>


      </tr>
      @endforeach
      @else
      <tr>
        <th>No Trashed posts.</th>
      </tr>
      @endif
    </tbody>
    </table>
  </div>
</div>
@endsection
