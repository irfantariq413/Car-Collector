@extends('layouts.front')
@section('content')

<div class="container mt-5 mb-5">
  <!-- Success Messages -->
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ $message }}
    </div>
  @endif
  <!-- /.Success Messages -->

  <h2 class="text-center">List of Cars</h2>  
  <h3><a class="btn btn-success" href="{{ route('car.add') }}"><i class="fa fa-plus"></i> Add New </a></h3>  

  <!-- List of Cars -->
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
		    <th>Description</th>
		    <th>Price</th>
		    <th>Image</th>
		    <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($car as $cars): ?>
        <tr>
          <td><?php echo $cars->id; ?></td>
          <td><?php echo $cars->title; ?></td>
          <td><?php echo $cars->description; ?></td>
          <td>$<?php echo $cars->price; ?></td>
          <td><img src="{{ asset ('/public/assets/uploads/t/'.$cars->img) }}" width="70px"></td>
          <td><a data-toggle="tooltip" data-placement="bottom"   class="btn btn-sm  btn-primary" href="{{ route('car.edit',$cars->id) }}" title="Edit Category">&nbsp;<i class="fa fa-edit"></i></a> <a data-toggle="tooltip" data-placement="bottom" class="btn btn-sm  btn-danger" href="{{ route('car.delete',$cars->id) }}" onclick="return confirm('Are you sure you want to delete? ');">&nbsp;<i class="fa fa-trash fa-1x"></i></a> 
          </td>
        </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
  </div>
  <!-- /List of Cars -->

  <!-- Pagination -->
  <div class="d-flex justify-content-center">
    {!! $car->links() !!} 
  </div>
  <!-- /Pagination -->
@endsection