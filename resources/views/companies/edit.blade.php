@extends('layouts.admin')

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit Company</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('companies.update',$company->uuid)}}" method="POST">
    @method('put')
    @csrf
    <div class="card-body">
    <div class="form-group">
        <label for="companyName">Name</label>
        <input type="text"  name="name" class="form-control" id="companyName" placeholder="Enter Company name" value="{{old('name',$company->name)}}">
        @error('name')
            <div class="text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="companEmail">Email address</label>
        <input type="email" name="email" class="form-control" id="companyEmail" placeholder="Enter email" value="{{old('email',$company->email)}}">
            @error('email')
            <div class="text-red-680 text-sm">{{$message}}</div>
            @enderror
    </div>
    <div class="form-group">
        <label for="companyName">Website</label>
        <input type="text" name="website" class="form-control" id="companyWebsite" placeholder="Enter Website" value="{{old('website',$company->website)}}">
        @error('website')
            <div class="text-red-680 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="companyName">Logo</label>
        <input type="text" name="logo" class="form-control" id="companyLogo" placeholder="Enter Website" value="{{old('logo',$company->logo)}}">
        @error('logo')
            <div class="text-red-680 text-sm">{{$message}}</div>
        @enderror
    </div>
        <!-- <div class="form-group">
        <label for="exampleInputFile">Logo</label>
        <div class="input-group">
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
            <span class="input-group-text">Upload</span>
            </div>
        </div>
        </div> -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
<!-- /.card -->
@endsection