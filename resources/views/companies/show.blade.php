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