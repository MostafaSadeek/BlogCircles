@extends('layouts.app')

@section('content')

<div class="clearfix">
<a href="{{route('categories.create')}}" class="btn float-right btn-success" style="margin-bottom:10px" > Add Category</a>
</div>
<div class="card card-default">
<div class="card-header"> All Categories</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col"> Category ID </th>
      <th scope="col"> Category Name </th>
      <th scope="col"> Action </th>

    </tr>
  </thead>

  <tbody>
  @foreach($cats as $cat)

    <tr>
    <td>
    {{$cat->id}}
    </td>
    <td>
    {{$cat->name}}
    </td>

    <td>
<a href="{{route('categories.edit',$cat->id)}}" class="btn btn-primary">Edit</a>

    </td>
    <td>
    <form action="{{route('categories.destroy',$cat->id)}}" method="POST">
     @csrf
     @method('DELETE')
     <button class="btn btn-danger btn-sm">Delete</button>
    
    </form>

<!-- <a href="{{route('categories.destroy',$cat->id)}}" class="btn btn-danger">Delete</a> -->

    </td>
    </tr>
    
    @endforeach

   
  </tbody>
</table>

</div>


@endsection