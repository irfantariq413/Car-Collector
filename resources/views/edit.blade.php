@extends('layouts.front')
@section('content')

<div class="container mb-5 mt-5">
  <div class="row">
    <div class="col-md-12"> 
      <!-- /.error messages -->
      @if ($errors->any())
        <div class="alert alert-danger">                  
          @foreach ($errors->all() as $error)
            {{ $error }}<br>                   
          @endforeach
        </div>              
      @endif
      <!-- /.error messages -->

      <!-- general form elements -->
      <div class="card card-primary">

        <!-- card-header -->
        <div class="card-header">
          <h3 class="card-title">{{$title}}</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form method="POST" action="{{ route('car.update',$car->id) }}" enctype="multipart/form-data" autocomplete="off">
          @csrf
          @method('PUT')
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="<?=$car->title?>"  >
            </div>
                  
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control" rows="3" name="description" id="description"><?=$car->description?></textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="int" class="form-control" name="price" id="price" value="<?=$car->price?>"  >
            </div>

            <img src="{{ asset ('/public/assets/uploads/t/'.$car->img) }}" width="70px">

            <div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <input type="file" class="form-control" name="img" id="img">
            </div>
          </div>
          
          <!-- card-Footer -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btn">Submit</button>
          </div>
          <!-- /.card-Footer -->
        </form>
        <!-- /.form-end -->
      </div>
    </div>
  </div>
</div>    
@endsection