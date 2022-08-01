@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="my-6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                    <form action="{{route('companies.store')}}" method="POST">
                        @csrf
                        <input  type="text" name="name" placeholder="Company name" value="{{old('name')}}">
                        @error('name')
                            <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="email" placeholder="email" value="{{old('email')}}">
                        @error('email')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="logo" value="{{old('logo')}}" >
                        @error('logo')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="website" placeholder="website" value="{{old('website')}}">
                        @error('website')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-success ml-4" >Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection