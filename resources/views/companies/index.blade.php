@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

               <div class="py-12"> 
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                 <a href="{{ route('companies.create')}}" class="btn-link btn-lg mb-2">New Company</a>   

                    @forelse($companies as $company)
                    <div class="my-6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                        <h2 class="font-bold text-2x">
                            {{$company->name}}
                        </h2>
                        <p class="mt-2">
                            {{$company->email}}     
                        </p>
                        <span class="block mt-4 text-sm opacity-80">{{$company->updated_at->diffForHumans()}}</span>    
                    </div>
                    @empty
                    <p>No records yet.</p>
                    @endforelse
                    {{$companies->links()}}
                </div>

            </div>


            </div>
        </div>
    </div>
</div>
@endsection