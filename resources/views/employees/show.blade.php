@extends('layouts.admin')

@section('content')
 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Employee Details</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12">
            <h4>Recent Activity</h4>
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/avatar2.png" alt="user image">
                  <span class="username">
                    {{$employee->first_name}} {{$employee->last_name}}
                  </span>
                  <span class="description">Edited  - {{$employee->created_at->diffForHumans()}}</span>
                </div>
                <!-- /.user-block -->
                <p>
                  <strong>Email</strong> {{$employee->email}}</br>
                  <strong>Pone</strong> {{$employee->phone}}</br>
                  <strong>Company</strong> {{$employee->name}}</br>
                  
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore.
</p>
              </div>
          </div>
        </div>
      </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</section>
@endsection