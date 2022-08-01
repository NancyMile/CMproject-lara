@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

               <div class="py-12"> 
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex">
                        <p class="opacity-60">
                            <strong>Created: </strong>{{$company->created_at->diffForHumans()}}
                        </p>
                        <a href="{{route('companies.edit', $company)}}" class="btn btn-success ml-auto">Edit</a>
                        <form action="{{route('companies.destroy',$company)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure?')">Delete<button>
                        </form>
                    </div>    
                
                    <div class="my-6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                        <h2 class="font-bold text-2x">
                        </h2>
                        <p class="mt-2">
                         <h2>{{$company->name}}</h2>  email: {{$company->email}}  
                        </p>
                    </div>
                </div>

            </div>


            </div>
        </div>
    </div>
</div>
@endsection