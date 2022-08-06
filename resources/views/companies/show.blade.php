@extends('layouts.admin')
@section('title','Company Description')
@section('content')
 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Company Details  <strong>{{$company->name}}</strong></h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <img src="{{asset('storage')}}/{{$company->logo}}" width="100px" height="100px" alt="" title=""/>
              </div>
            </div>
          </div>      
        </div>
        <div class="row">
          <div class="col-12">
            <h4>Recent Activity</h4>
              <div class="post">
                <div class="user-block">
                  <img class="img-square img-bordered-sm" src="../../dist/img/AdminLTELogo.png" alt="user image">
                  <span class="username">
                    <a href="{{$company->website}}">{{$company->name}}</a>
                  </span>
                  <span class="description">Edited  - {{$company->updated_at->diffForHumans()}}</span>
                </div>
                <!-- /.user-block -->
                <p>
                  <strong>Email</strong> {{$company->email}}</br>
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