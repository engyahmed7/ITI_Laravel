@extends('layouts.app2')
@section('title', 'Posts')

@section('content')
<a href="{{route('post.Deleted_Posts')}}" style="text-decoration:none" >
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Deleted Posts</button>
</a>
<table class="table" style="width: 100%;">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">body</th>
        <th scope="col">User ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
      <tr>
        <th scope="row">{{$post['id']}}</th>

        <td><a href="{{ route('posts.show',$post['id']) }}"style="text-decoration:none" >{{$post['title']}}</td>
        <td>{{$post['body']}}</td>
        <td>{{$post['user_id']}}</td>
        <td>{{$post['user']['name']}}</td>

        <td>
            <form action="{{ route('posts.destroy',$post['id']) }}" method="Post">
            <a class="btn btn-primary" href="{{ route('posts.edit',$post['id']) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="alert('Are You Sure You Want To Delete?')" >Delete</button>
            </form>
          </td>
      </tr>
     @endforeach
      </tr>
    </tbody>
  </table>

 {{ $posts->links() }}

@endsection
