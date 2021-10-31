@extends('layouts.front')
@section('content')

<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      @if ($errors->any())
        <div class="alert alert-danger">                  
          @foreach ($errors->all() as $error)
            {{ $error }}<br>                   
           @endforeach
        </div>              
      @endif

    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
      </div>

      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('car.store') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{old('title')}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description">{{old('description')}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="int" class="form-control" name="price" id="price" placeholder="Price" value="{{old('price')}}">
          </div>
                  
          <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" class="form-control" name="img" id="img">
          </div>
                  
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" name="btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>        
@endsection