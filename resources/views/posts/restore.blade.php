@extends('layouts.app')
@section('title', 'Restore Page')
@section('content')
<div >
 <a href="{{route('post.restoreAll')}}" style="text-decoration:none">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Restore All</button>
</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col"> ID </th>
            <th scope="col"> Title </th>
            <th scope="col"> Body </th>
            <th scope="col">Restore</th>
            </tr>
    </thead>
    <tbody>
     @foreach ($posts as $post)
       <tr>
        <td scope="row">{{$post->id}}</td>
        <td scope="row">{{$post->title}}</td>
        <td scope="row">{{$post->body}}</td>
         <td> 
         <a  href="{{route('post.restore',['id' =>$post->id ])}}" style="text-decoration:none">  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Restore</button>
         </a>  
         <a  href="{{route('post.delete_final',['id' =>$post->id ])}}" style="text-decoration:none">  
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"> Delete for ever</button>
         </a>  
         </td>
       </tr>
 @endforeach
</tbody>
</table>
</div>  
      </div>
     </div>
   </div>
</div>
@endsection