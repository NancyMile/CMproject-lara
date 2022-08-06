@extends('layouts.admin')
@section('title','Create Employee')
@section('content')

<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Create Employee</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('employees.store')}}" method="POST">
    @csrf
    <div class="card-body">
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text"  name="first_name" class="form-control" id="firstName" placeholder="Enter first name"
            value="{{old('first_name')}}">
        @error('first_name')
            <div class="text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="firstName">Last Name</label>
        <input type="text"  name="last_name" class="form-control" id="lasttName" placeholder="Enter last name"
            value="{{old('last_name')}}">
        @error('last_name')
            <div class="text-sm">{{$message}}</div>
        @enderror
    </div>

    <div class="col-sm-6">
        <!-- select -->
        <div class="form-group">
            <label>Select Company</label>
            <select name="company_id"class="form-control">
                <option value=""> Select Company</option>
                @forelse($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @empty
                    <option>No records yet.</option>
                @endforelse
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="employeeEmail">Email address</label>
        <input type="email" name="email" class="form-control" id="employeeEmail" placeholder="Enter email" value="{{old('email')}}">
            @error('email')
            <div class="text-red-680 text-sm">{{$message}}</div>
            @enderror
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{old('phone')}}">
        @error('phone')
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