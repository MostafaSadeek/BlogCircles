@extends('layouts.app')

@section('content')


<div class="card card-default">
<div class="card-header">  {{isset($post) ? "Update Post" : "Add Post"}} </div>
   <div class="card-body">

    <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
     @if(isset($post))
     @method('PUT')
     @endif

  
<div class="form-group">
     <label for="category">Post Title:</label>
     <input type="text" class="form-control" name="title" placeholder="Post Title" 
     value="{{isset($post) ? $post->title : ''}}">
</div>

<div class="form-group">
     <label for="category">Post Description:</label>
     <textarea class="form-control" rows="2" name="description" placeholder="Add Description">
     
     </textarea>
</div>

<div class="form-group">
     <label for="category">Post Content:</label>
     <input id="x" type="hidden" name="content"  value="{{isset($post) ? $post->content : ''}}">
  <trix-editor input="x"></trix-editor>
     <!-- <textarea class="form-control" rows="3" name="content" placeholder="Add Content"></textarea> -->
</div>
@if(isset($post))
<div class="form-group">
<img src="{{asset('storage/'. $post->image)}}" alt="" height="50px" width="100px">
</div>
@endif

<div class="form-group">
     <label for="category">Post Image:</label>
     <input type="file" class="form-control" name="image" placeholder="Post Image"
     value="{{isset($post) ? $post->image : ''}}">
</div>


   <div class="form-group">
     <button type="submit" class="btn btn-success"> {{isset($post) ? "Update Post" : "Add Post"}}
</button>

   </div>



</div>
@section('scripts')
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix-core.min.js"></script>
 
@endsection


@endsection