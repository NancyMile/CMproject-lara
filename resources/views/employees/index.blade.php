@extends('layouts.admin')
@section('title','Employees List')
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
            List of Employees
        </h3>
        <div class="card-tools">
            <ul class="pagination pagination-sm">
            {{ $employees->links() }}
            </ul>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <ul class="todo-list" data-widget="todo-list">

        {{-- dd($employees) --}}

        @forelse($employees as $employee)
            <li>
            <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
            </span>
            <span class="text"><a href="{{ route('employees.show',$employee)}}"> {{$employee->first_name}} {{$employee->last_name}}</span>
            <small class="badge"><i class="far fa-clock"></i> {{$employee->company->name}}</small>
            <div class="tools">
                <a href="{{route('employees.edit', $employee)}}"><i class="fas fa-edit"></i></a>
                <form action="{{route('employees.destroy',$employee)}}" method="POST">
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
        <button type="button" class="btn btn-primary float-right"><a href="{{ route('employees.create')}}" style="color: white;">
        <i class="fas fa-plus">Add Employee</i></a>
        </button>
        </div>
    </div>
    <!-- /.card -->
    </section>
@endsection