@extends('layouts.admin')
@section('title','Companies List')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- TO DO List -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            List of Companies
        </h3>
        <div class="card-tools">
            <ul class="pagination pagination-sm">
            {{$companies->links()}}
            </ul>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <ul class="todo-list" data-widget="todo-list">
        @forelse($companies as $company)
            <li>
            <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
            </span>
            <span class="text"><a href="{{ route('companies.show',$company)}}"> {{$company->name}}</span>
            <small class="badge badge-secondary"><i class="far fa-clock"></i> {{$company->website}}</small>
            <div class="tools">
                <a href="{{route('companies.edit', $company)}}"><i class="fas fa-edit"></i></a>
                <form action="{{route('companies.destroy',$company)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash fa-fw"></i></button>
                </form>
            </div>
            </li>
            @empty
            <p>No records yet.</p>
        @endforelse

        </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <button type="button" class="btn btn-primary float-right"><a href="{{ route('companies.create')}}" style="color: white;">
        <i class="fas fa-plus">Add Company</i></a>
        </button>
        </div>
    </div>
    <!-- /.card -->
    </section>
@endsection