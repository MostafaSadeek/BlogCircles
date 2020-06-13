@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{route('posts.create')}}" class="btn float-right btn-success" style="margin-bottom:10px" > Add Post</a>
</div>
<div class="card card-default">
<div class="card-header"> All Posts</div>
@if($posts->count()>0)

<table class="table">
  <thead>
    <tr>
      <th scope="col"> Post ID </th>
      <th scope="col"> Post Title </th>
      <th scope="col"> Post Description </th>
      <th scope="col"> Post Content </th>
      <th scope="col"> Post Image </th>


      <th scope="col"> Action </th>

    </tr>
  </thead>

  <tbody>
  @foreach($posts as $post)

    <tr>
    <td>
    {{$post->id}}
    </td>
    <td>
    {{$post->title}}
    </td>
    <td>
    {{$post->description}}
    </td><td>
    {!!$post->content!!}
    </td><td>
    <img src="{{asset('storage/'.$post->image)}}" alt="" height="50px" width="100px" >
    <!-- {{$post->image}} -->
    </td>

    <td>
    @if(!($post->trashed()))

       <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>

    @endif
    </td>
    <td>
    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
     @csrf
     @method('DELETE')
     <button class="btn btn-danger btn-sm">
     {{$post->trashed() ? 'delere' : 'trash'}}
     
     
     </button>
    
    </form>


    </td>
    </tr>
    
    @endforeach

   
  </tbody>
</table>

@else
<div class="card-body">
<h1>No Posts Yet</h1>
</div>


@endif

</div>


@endsection