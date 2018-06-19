@extends('layouts.app')
@section('title','Dashboard')
@section('description','Home page')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
  <!-- <li class="active">Here</li> -->
</ol>
@endsection      
@section('content')
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Sales</span>
        <span class="info-box-number">760</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
@endsection