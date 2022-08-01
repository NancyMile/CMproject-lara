@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h2>Edit Company</h2>
    </header>
    <div class="row justify-content-center">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="my-6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                    <form action="{{route('companies.update',$company->uuid)}}" method="POST">
                        @method('put')
                        @csrf
                        <input  type="text" name="name" placeholder="Company name" value="{{old('name',$company->name)}}">
                        @error('name')
                            <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="email" placeholder="email" value="{{old('email',$company->email)}}">
                        @error('email')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="logo" value="{{old('logo',$company->logo)}}" >
                        @error('logo')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <input  type="text" name="website" placeholder="website" value="{{old('website',$company->website)}}">
                        @error('website')
                        <div class="text-red-680 text-sm">{{$message}}</div>
                        @enderror
                        <button name="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection