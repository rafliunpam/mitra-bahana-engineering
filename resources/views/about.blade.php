@extends('layouts.main')

@section('container')
<section id="tracks" class="contact">
<!-- <header class="section-header">
    <p>Lacak Tiket</p>
  </header> -->

  <div class="container" data-aos="fade-up">

  <div class="row gy-12 justify-content-center ">

<h1 class="mb-3 text-center mt-5" >{{ $title }}</h1>

<div class="content mt-3">
            <div class="col-sm-12">
            @if(session()->has('success'))
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{ session ('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            @elseif(session()->has('danger'))
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{ session ('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            @endif
                </div>
            </div>
@endsection