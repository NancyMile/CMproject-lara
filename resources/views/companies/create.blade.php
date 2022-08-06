@extends('layouts.admin')
@section('title','Create Company')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Company</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="companyName">Name</label>
                <input type="text" name="name" class="form-control" id="companyName" placeholder="Enter Company name" value="{{old('name')}}">
                @error('name')
                <div class="text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="companEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="companyEmail" placeholder="Enter email" value="{{old('email')}}">
                @error('email')
                <div class="text-red-680 text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="companyName">Website</label>
                <input type="text" name="website" class="form-control" id="companyWebsite" placeholder="Enter Website" value="{{old('website')}}">
                @error('website')
                <div class="text-red-680 text-sm">{{$message}}</div>
                @enderror
            </div>
            <div class="container">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-group">
                    <label for="logo" class="form-label">Logo</label>
                    <input class="form-control" name="logo" type="file" id="logo" />
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
<!-- /.card -->
@endsection